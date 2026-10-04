<?php
require_once('../includes/header.php');
if (isset($_GET['track'])) {
	$track = base64_decode($_GET['track']);
	$sql = "SELECT * FROM ship WHERE trackcode = '$track' AND deleted = 1";
	$res = mysqli_query($connect, $sql);
	$rows = mysqli_fetch_assoc($res);

	$id = $rows['id'];
	$trackcode = $rows['trackcode'];
	$sname = $rows['sname'];
	$saddress = $rows['saddress'];
	$semail = $rows['semail'];
	$sphone = $rows['sphone'];
	$rname = $rows['rname'];
	$raddress = $rows['raddress'];
	$remail = $rows['remail'];
	$rphone = $rows['rphone'];
	$descriptions = $rows['descriptions'];
	$tax = $rows['tax'];
	$currency = $rows['currency'];
	$cod = $rows['cod'];
	$dod = $rows['dod'];
	$edoa = $rows['edoa'];
	$cl = $rows['cl'];
	$ds = $rows['ds'];
	$amt = $rows['amt'];
	$destination = $rows['destination'];
}

?>
<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">

		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Shipment</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Update Shipment <?= $trackcode ?></li>
					</ol>
				</nav>
			</div>

		</div>
		<!--end breadcrumb-->

		<div class="card">
			<div class="card-body p-4">
				<h5 class="card-title">Update Shippment For <?= $rname ?></h5>
				<hr />
				<div class="ps-3">
    				<a href="history.php?track=<?=$trackcode?>" class="btn btn-primary">See History</a>
    			</div>
				<form class="form-body mt-4" method="POST" action="../includes/generate.php">
					<div class="row">

						<div class="col-lg-6 mt-4 mb-3">
							<div class="border border-3 p-4 rounded">
								<div>
									<h5 class="card-title mb-4">Sender's Details</h5>
									<div class="row g-3">

										<div class="col-12">
											<label for="sendname" class="form-label">Sender's Name: </label>
											<input type="text" class="form-control" name="sname" value="<?= $sname ?>">
											<input type="hidden" class="form-control" name="id" value="<?= $id ?>">
											<input type="hidden" name="track" value="<?= $trackcode ?>">
										</div>
										<div class="col-12">
											<label for="raddress" class="form-label">Sender's Address: </label>
											<input type="text" class="form-control" name="saddress" value="<?= $saddress ?>">
										</div>
										<div class="col-12">
											<label for="remail" class="form-label">Sender's Email: </label>
											<input type="email" class="form-control" name="semail" value="<?= $semail ?>">
										</div>
										<div class="col-12">
											<label for="rnumber" class="form-label">Sender' Phone: </label>
											<input type="number" class="form-control" name="sphone" value="<?= $sphone ?>">
										</div>

									</div>
								</div>

							</div>
						</div>
						<div class="col-lg-6 mt-4 mb-3">
							<div class="border border-3 p-4 rounded">
								<div>
									<h5 class="card-title mb-4">Reciever's Details</h5>
									<div class="row g-3">

										<div class="col-12">
											<label for="inputProductTags" class="form-label">Reciever's Name: </label>
											<input type="text" class="form-control" name="rname" value="<?= $rname ?>">
										</div>
										<div class="col-12">
											<label for="raddress" class="form-label">Reciever's Address: </label>
											<input type="text" class="form-control" name="raddress" value="<?= $raddress ?>">
										</div>
										<div class="col-12">
											<label for="remail" class="form-label">Reciever's Email: </label>
											<input type="email" class="form-control" name="remail" value="<?= $remail ?>">
										</div>
										<div class="col-12">
											<label for="rnumber" class="form-label">Reciever' Phone: </label>
											<input type="number" class="form-control" name="rphone" value="<?= $rphone ?>">
										</div>

									</div>
								</div>

							</div>
						</div>

						<div class="col-lg-6 mt-4 mb-3">
							<div class="border border-3 p-4 rounded">
								<div>
									<h5 class="card-title mb-4">Parcel Description</h5>
									<div class="row g-3">
										<div class="mb-3">
											<label for="inputProductDescription" class="form-label">Description:</label>
											<textarea class="form-control" name="description" id="description" rows="3"><?= $descriptions ?></textarea>
										</div>
										<div class="col-12">
											<label for="remail" class="form-label">Tax: </label>
											<select class="form-select  mb-3" name="tax" value="<?= $tax ?>" aria-label="">
												<option value="<?= $tax ?>"><?= $tax ?></option>
												<option value="1%">1%</option>
												<option value="3%">3%</option>
												<option value="5%">5%</option>
												<option value="10%">10%</option>
											</select>
										</div>
										<div class="col-12">
											<label for="remail" class="form-label">Currency: </label>
											<select class="form-select mb-3" name="currency" aria-label="">
												<option value="<?= $currency ?>"><?= $currency ?></option>
												<option value="$">$</option>
												<option value="€">€</option>
												<option value="£">£</option>
											</select>
										</div>
									</div>
								</div>

							</div>
						</div>

						<div class="col-lg-6 mt-4 mb-3">
							<div class="border border-3 p-4 rounded">
								<div>
									<h5 class="card-title mb-4">Shipment History</h5>
									<div class="row g-3">
										<div class="col-12">
											<label for="remail" class="form-label">City Of Depature: </label>
											<input type="text" class="form-control" name="cod" value="<?= $cod ?>">
										</div>
										<div class="col-12">
											<label for="rnumber" class="form-label">Date Of Depature: </label>
											<input type="datetime-local" class="form-control" name="dod" value="<?= $dod ?>">
										</div>
										<div class="col-12">
											<label for="rnumber" class="form-label">Estimate Date Of Arrival: </label>
											<input type="datetime-local" class="form-control" name="edoa" value="<?= $edoa ?>">
										</div>
										<div class="col-12">
											<label for="remail" class="form-label">Current Location: </label>
											<input type="text" class="form-control" name="cl" value="<?= $cl ?>">
										</div>
										<div class="col-12">
											<label for="remail" class="form-label">Delivery Status: </label>
											<input type="text" class="form-control" name="ds" value="<?= $ds ?>">
										</div>
										<div class="col-12">
											<label for="remail" class="form-label">Amount Paid: </label>
											<input type="text" class="form-control" name="amt" value="<?= $amt ?>">
										</div>
										<div class="col-12">
											<label for="destination" class="form-label">Destination:</label>
											<textarea class="form-control" name="destination" rows="3"><?= $destination ?></textarea>
										</div>
										<div class="col-12">
											<div class="d-grid">
												<button name="shipupdate" class="btn btn-light">Edit and add Shipment History</button>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div><!--end row-->
				</form>
			</div>
		</div>

	</div>
</div>
<!--end page wrapper -->
<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->
<footer class="page-footer">
	<p class="mb-0">Copyright © 2021. All right reserved.</p>
</footer>
</div>
<!--end wrapper-->
<!--start switcher-->
<div class="switcher-wrapper">
	<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
	</div>
	<div class="switcher-body">
		<div class="d-flex align-items-center">
			<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
			<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
		</div>
		<hr />
		<p class="mb-0">Gaussian Texture</p>
		<hr>

		<ul class="switcher">
			<li id="theme1"></li>
			<li id="theme2"></li>
			<li id="theme3"></li>
			<li id="theme4"></li>
			<li id="theme5"></li>
			<li id="theme6"></li>
		</ul>
		<hr>
		<p class="mb-0">Gradient Background</p>
		<hr>

		<ul class="switcher">
			<li id="theme7"></li>
			<li id="theme8"></li>
			<li id="theme9"></li>
			<li id="theme10"></li>
			<li id="theme11"></li>
			<li id="theme12"></li>
			<li id="theme13"></li>
			<li id="theme14"></li>
			<li id="theme15"></li>
		</ul>
	</div>
</div>
<!--end switcher-->
<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>
<script src="assets/plugins/notifications/js/lobibox.min.js"></script>
<script src="assets/plugins/notifications/js/notifications.min.js"></script>
<script>
	$(document).ready(function() {
		$('#image-uploadify').imageuploadify();
	})
</script>
<script>
	<?php
	if (isset($_GET['success'])) { ?>
		Lobibox.notify('success', {
			pauseDelayOnHover: true,
			continueDelayOnInactiveTab: false,
			position: 'top right',
			icon: 'bx bx-check-circle',
			msg: '<?= urldecode($_GET['success']) ?>'
		});
	<?php } elseif (isset($_GET['error'])) { ?>
		Lobibox.notify('error', {
			pauseDelayOnHover: true,
			continueDelayOnInactiveTab: false,
			position: 'top right',
			icon: 'bx bx-x-circle',
			msg: '<?= urldecode($_GET['error']) ?>'
		});
	<?php } ?>
</script>
<script src="assets/js/app.js"></script>
</body>


<!-- Mirrored from codervent.com/dashtreme/demo/vertical/ecommerce-add-new-products.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Apr 2023 20:34:22 GMT -->

</html>