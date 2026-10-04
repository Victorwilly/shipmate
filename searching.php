<?php
    require_once('includes/connection.php');
    require_once('includes/functions.php');
    $a = 0;
    $tracker = '';
	if (isset($_POST['check'])) {
		$tracking_code = isset($_POST['tracking_code'])?trim($_POST['tracking_code']): '';

	
		$tracking_code = mysqli_real_escape_string($connect, $tracking_code);

		$sql = "SELECT * FROM ship WHERE trackcode = '$tracking_code'";
		$result5 = mysqli_query($connect, $sql);

		if (mysqli_num_rows($result5) > 0) {
			$rows = mysqli_fetch_assoc($result5);
			$a = 1;
			$tracker = base64_encode($rows['id']);

		}else{
			$a = 0;
		}
	}else{
		header('location: index.php');
        return false;
	}
?>
<!DOCTYPE html>
<html lang="en">


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
	<link href="admin/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="admin/assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="admin/assets/css/app.css" rel="stylesheet">
	<link href="admin/assets/css/icons.css" rel="stylesheet">

	<title>DigitXpresso Delivery Company | Searching</title>
</head>

<body class="bg-theme bg-theme1">
	<!-- wrapper -->
	<div class="wrapper">
		<nav class="navbar navbar-expand-lg navbar-light bg-light rounded fixed-top rounded-0 shadow-sm">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">
					<!--<img src="img/logo" width="140" alt="" />-->
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
						<div class="col-md-6 ">
							<div class="card-body p-4 text-center">
								<div class="spinner-grow" style="width: 7rem; height: 7rem;" role="status"> <span class="visually-hidden">
									Loading...
								</span>
								</div>	
							</div>
						</div>
						<div class="col-md-3"></div>

					</div>
					<div class="text-center"><h3>Searching....</h3></div>
					
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
				<p class="mb-0">Copyright © 2025. All right reserved.</p>
			</div>
		</div>
	</div>
	<!-- end wrapper -->


	<!-- Bootstrap JS -->
	<script src="admin/assets/js/bootstrap.bundle.min.js"></script>

	<!--plugins-->
	<script src="admin/assets/js/jquery.min.js"></script>
	<Script>
    $(document).ready(function(){
        let a = '<?=$a?>'
        setTimeout(() => {
            if(a == 1){ 
                window.location.href = "app-invoice.php?id=<?=$tracker?>"
            }else{
                window.location.href = "notfound.php?error=Track Code Not Found"
            }
        }, 3000);
    })
</Script>


</body>

</html>