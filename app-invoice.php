<?php
// ---------------------------------------------
// DEBUG (turn off in production)
// ---------------------------------------------
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// ---------------------------------------------
// DB connection
// ---------------------------------------------
require_once('includes/connection.php');
if (!isset($connect) && isset($conn)) {
    // support either $connect or $conn from your connection file
    $connect = $conn;
}
if (!isset($connect) || !($connect instanceof mysqli)) {
    http_response_code(500);
    die('Database connection not available.');
}

// ---------------------------------------------
// Validate & fetch shipment
// ---------------------------------------------
if (!isset($_GET['id'])) {
    http_response_code(400);
    die('No shipment ID provided.');
}

$idRaw = base64_decode($_GET['id'], true);
if ($idRaw === false) {
    http_response_code(400);
    die('Invalid shipment ID.');
}
$id = (int)$idRaw;

$stmt = $connect->prepare("
    SELECT id, trackcode, sname, saddress, semail, sphone,
           rname, raddress, remail, rphone,
           descriptions, tax, currency, cod, dod, edoa, cl, ds, amt, destination
    FROM ship
    WHERE id = ? AND deleted = 1
    LIMIT 1
");
if (!$stmt) {
    http_response_code(500);
    die('Prepare failed: ' . $connect->error);
}
$stmt->bind_param('i', $id);
if (!$stmt->execute()) {
    http_response_code(500);
    die('Execute failed: ' . $stmt->error);
}
$result = $stmt->get_result();
$rows = $result->fetch_assoc();
$stmt->close();

if (!$rows) {
    http_response_code(404);
    die('Shipment not found.');
}

// ---------------------------------------------
// Extract fields
// ---------------------------------------------
$trackcode    = $rows['trackcode'];
$sname        = $rows['sname'];
$saddress     = $rows['saddress'];
$semail       = $rows['semail'];
$sphone       = $rows['sphone'];
$rname        = $rows['rname'];
$raddress     = $rows['raddress'];
$remail       = $rows['remail'];
$rphone       = $rows['rphone'];
$descriptions = $rows['descriptions'];
$taxRaw       = $rows['tax'];        // may be like "1%", "3%" etc.
$currency     = $rows['currency'];
$cod          = $rows['cod'];
$dod          = $rows['dod'];
$edoa         = $rows['edoa'];
$cl           = $rows['cl'];
$ds           = $rows['ds'];
$amt          = (float)$rows['amt'];
$destination  = $rows['destination'];

// ---------------------------------------------
// Tax math
// ---------------------------------------------
$taxNum = rtrim((string)$taxRaw, "%");     // strip trailing '%'
if (!is_numeric($taxNum)) {
    $taxNum = 10; // default/fallback
} else {
    $taxNum = (float)$taxNum;
}
$taxtotal   = round(($taxNum * $amt) / 100, 2);
$grandtotal = round($amt + $taxtotal, 2);

// ---------------------------------------------
// Fetch shipment history
// ---------------------------------------------
$stmt2 = $connect->prepare("
    SELECT city, ddpt, darive, location, destination, status, amount
    FROM history
    WHERE trackcode = ?
    ORDER BY id DESC
");
if (!$stmt2) {
    http_response_code(500);
    die('Prepare failed (history): ' . $connect->error);
}
$stmt2->bind_param('s', $trackcode);
if (!$stmt2->execute()) {
    http_response_code(500);
    die('Execute failed (history): ' . $stmt2->error);
}
$historyResult = $stmt2->get_result();
$stmt2->close();
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="admin/assets/images/favicon-32x32.png" type="image/png" />
	<link href="admin/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="admin/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<link href="admin/assets/css/pace.min.css" rel="stylesheet" />
	<script src="admin/assets/js/pace.min.js"></script>
	<link href="admin/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="admin/assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="admin/assets/css/app.css" rel="stylesheet">
	<link href="admin/assets/css/icons.css" rel="stylesheet">

	<title>DigitXpresso Delivery Company | Invoice</title>

    <style>
        .invoice .header { align-items: center; }
        .invoice table th, .invoice table td { padding: 8px; }
        .text-center { text-align: center; }
        .text-left { text-align: left; }
        .total { font-weight: 600; }
        .bg-theme1 { background: #0b0f19; }
    </style>
</head>

<body class="bg-theme bg-theme1">
	<div class="header-notifications-list header-message-list" style="display:none;"></div>
	<div class="card">
		<div class="card-body">
			<div id="invoice">
				<div class="toolbar hidden-print">
					<!-- Optional toolbar -->
					<input type="hidden" name="track" value="<?php echo htmlspecialchars($trackcode); ?>">
					<hr />
				</div>
				<div class="invoice">
					<div>
						<header class="mb-3">
							<div class="row header">
								<div class="mb-3 mt-2 col-md-3">
									<a href="javascript:;">
										<img src="admin/assets/images/logo-icon.png" width="80" alt="Logo" />
									</a>
								</div>
								<div class="mb-3 mt-2 col-md-6"></div>
								<div class="mb-3 mt-2 col-md-3">
									<h2 class="name">
										<a target="_blank" href="javascript:;">
											<?php echo htmlspecialchars($sname); ?>
										</a>
									</h2>
									<div><?php echo htmlspecialchars($saddress); ?></div>
									<div><?php echo htmlspecialchars($sphone); ?></div>
									<div><?php echo htmlspecialchars($semail); ?></div>
								</div>
							</div>
						</header>

						<main>
							<div class="row contacts mb-3 mt-2">
								<div class="mb-3 mt-2 col-md-3 invoice-to">
									<div class="text-gray-light">INVOICE TO:</div>
									<h2 class="to"><?php echo htmlspecialchars($rname); ?></h2>
									<div class="address"><?php echo htmlspecialchars($raddress); ?></div>
									<div class="email">
                                        <a href="mailto:<?php echo htmlspecialchars($remail); ?>">
                                            <?php echo htmlspecialchars($remail); ?>
                                        </a>
									</div>
								</div>

								<div class="mb-3 mt-2 col-md-6"></div>

								<div class="mb-3 mt-2 col-md-3 invoice-details">
									<h1 class="invoice-id"><?php echo htmlspecialchars($trackcode); ?></h1>
									<div class="date">Date of Invoice: <?php echo htmlspecialchars($dod); ?></div>
									<div class="date">Due Date: <?php echo htmlspecialchars($edoa); ?></div>
								</div>
							</div>

							<div class="row mt-3">
							    <h3>Shipment Description</h3>
							</div>

							<div class="table-responsive">
								<table style="width:100%" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th class="text-center">PARCEL DESCRIPTION</th>
											<th class="text-center">CITY OF DEPARTURE</th>
											<th class="text-center">CURRENT LOCATION</th>
											<th class="text-center">PARCEL STATUS</th>
											<th class="text-center">DEPARTURE DATE</th>
											<th class="text-center">DELIVERY DATE</th>
											<th class="text-center">TOTAL</th>
										</tr>
									</thead>
									<tbody>
                                        <tr>
                                            <td class="text-left">
                                                <h3>
                                                    <a target="_blank" href="javascript:;">
                                                        <?php echo htmlspecialchars($descriptions); ?>
                                                    </a>
                                                </h3>
                                            </td>
                                            <td class="text-center"><?php echo htmlspecialchars($cod); ?></td>
                                            <td class="text-center"><?php echo htmlspecialchars($cl); ?></td>
                                            <td class="text-center"><?php echo htmlspecialchars($ds); ?></td>
                                            <td class="text-center"><?php echo htmlspecialchars($dod); ?></td>
                                            <td class="text-center"><?php echo htmlspecialchars($edoa); ?></td>
                                            <td class="total text-center">
                                                <?php echo htmlspecialchars($currency); ?><?php echo number_format($amt, 2); ?>
                                            </td>
                                        </tr>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="5"></td>
											<td class="text-right">SUBTOTAL</td>
											<td><?php echo htmlspecialchars($currency); ?><?php echo number_format($amt, 2); ?></td>
										</tr>
										<tr>
											<td colspan="5"></td>
											<td class="text-right">TAX <?php echo htmlspecialchars($taxNum); ?>%</td>
											<td><?php echo htmlspecialchars($currency); ?><?php echo number_format($taxtotal, 2); ?></td>
										</tr>
										<tr>
											<td colspan="5"></td>
											<td class="text-right">GRAND TOTAL</td>
											<td><?php echo htmlspecialchars($currency); ?><?php echo number_format($grandtotal, 2); ?></td>
										</tr>
									</tfoot>
								</table>

								<div class="">
                                    <img class="img-fluid" style="width: 150px; height: 50px;"
                                         src="admin/assets/images/signature.png" alt="Signature"> Management
                                </div>

								<div class="row contacts mb-3 mt-5">
									<div class="row">
										<h3>Shipment History</h3>
									</div>
									<div class="row">
										<div class="table-responsive">
											<table class="table table-bordered table-striped">
												<thead>
													<tr>
														<th>City Of Departure</th>
														<th>Departure Date</th>
														<th>Expected Arrival Date</th>
														<th>Location</th>
														<th>Destination</th>
														<th>Status</th>
														<th>Amount Due</th>
													</tr>
												</thead>
												<tbody>
													<?php if ($historyResult && $historyResult->num_rows > 0): ?>
														<?php while ($h = $historyResult->fetch_assoc()): ?>
															<tr>
																<td><?php echo htmlspecialchars($h['city']); ?></td>
																<td><?php echo htmlspecialchars($h['ddpt']); ?></td>
																<td><?php echo htmlspecialchars($h['darive']); ?></td>
																<td><?php echo htmlspecialchars($h['location']); ?></td>
																<td><?php echo htmlspecialchars($h['destination']); ?></td>
																<td><?php echo htmlspecialchars($h['status']); ?></td>
																<td><?php echo htmlspecialchars($h['amount']); ?></td>
															</tr>
														<?php endwhile; ?>
													<?php else: ?>
														<tr><td colspan="7">No history records found for this shipment.</td></tr>
													<?php endif; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>

							</div>
						</main>
					</div>
					<div></div>
				</div>
			</div>
		</div>
	</div>

	<!--end page wrapper -->

	<script src="admin/assets/js/bootstrap.bundle.min.js"></script>
	<script src="admin/assets/js/jquery.min.js"></script>
	<script src="admin/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="admin/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

	<script>
		// initialize DataTables safely (no Buttons extension calls to avoid JS errors)
		$(document).ready(function() {
			$('table.table').DataTable({
				pageLength: 25,
				order: []
			});
		});
	</script>
	<script src="admin/assets/js/app.js"></script>
</body>
</html>
