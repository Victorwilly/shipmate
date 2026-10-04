<?php
require_once('includes/connection.php'); 
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codervent.com/dashtreme/demo/vertical/errors-404-error.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Apr 2023 20:46:56 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="img/favicon.ico" type="image/png" />
	<!--plugins-->
	<link href="admin/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="admin/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="admin/assets/css/pace.min.css" rel="stylesheet" />
	<script src="admin/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="admin/assets/plugins/notifications/css/lobibox.min.css" />
	<link href="admin/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="admin/assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="admin/assets/css/app.css" rel="stylesheet">
	<link href="admin/assets/css/icons.css" rel="stylesheet">

	<title>TransX Delivery Company | Searching</title>
</head>

<body class="bg-theme bg-theme1">
	<!-- wrapper -->
	<div class="wrapper">
		<nav class="navbar navbar-expand-lg navbar-light bg-light rounded fixed-top rounded-0 shadow-sm">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">
					<img src="img/logo_white.png" width="140" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent1">
					<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
						<li class="nav-item"> <a class="nav-link text-white" aria-current="page" href="#"><i class='bx bx-home-alt me-1'></i>Home</a>
						</li>
						
					</ul>
				</div>
			</div>
		</nav>
		<div class="error-404 d-flex align-items-center justify-content-center">
			<div class="container">
				<div class="card py-5">
					<div class="row g-0">
                        <div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="card-body p-4">
								<h1 class="display-1"><span class="text-white">4</span><span class="text-white">0</span><span class="text-white">4</span></h1>
								<h2 class="font-weight-bold display-4">Track Code Not Found</h2>
								
								<div class="mt-5"> <a href="index.php" class="btn btn-light btn-lg px-md-5 radius-30">Go Home</a>
									<a href="calculator.php" class="btn btn-light btn-lg ms-3 px-md-5 radius-30">Back</a>
								</div>
							</div>
						</div>
                        <div class="col-md-3"></div>
						
					</div>
					<!--end row-->
				</div>
			</div>
		</div>
		<div class="bg-light p-3 fixed-bottom border-top shadow">
			<div class="d-flex align-items-center justify-content-between flex-wrap">
				<ul class="list-inline mb-0">
					<li class="list-inline-item">Follow Us :</li>
					<li class="list-inline-item"><a href="javascript:;"><i class='bx bxl-facebook me-1'></i>Facebook</a>
					</li>
					<li class="list-inline-item"><a href="javascript:;"><i class='bx bxl-twitter me-1'></i>Twitter</a>
					</li>
					<li class="list-inline-item"><a href="javascript:;"><i class='bx bxl-google me-1'></i>Google</a>
					</li>
				</ul>
				<p class="mb-0">Copyright © 2023. All right reserved.</p>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
	

    <!-- Bootstrap JS -->
	<script src="admin/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="admin/assets/js/jquery.min.js"></script>
	<script src="admin/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="admin/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="admin/assets/plugins/notifications/js/lobibox.min.js"></script>
    <script src="admin/assets/plugins/notifications/js/notifications.min.js"></script>
    <!--app JS-->
<script>    
<?php
if (isset($_GET['success'])) { ?>
Lobibox.notify('success', {
	pauseDelayOnHover: true,
	continueDelayOnInactiveTab: false,
	position: 'top right',
	icon: 'bx bx-check-circle',
	msg: '<?=urldecode($_GET['success'])?>'
});
<?php } elseif (isset($_GET['error'])) { ?>
Lobibox.notify('error', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-x-circle',
		msg: '<?=urldecode($_GET['error'])?>'
});
<?php } ?>
</script>
<script src="admin/assets/js/app.js"></script>
</body>


<!-- Mirrored from codervent.com/dashtreme/demo/vertical/errors-404-error.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Apr 2023 20:46:59 GMT -->
</html>