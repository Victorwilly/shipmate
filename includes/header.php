<?php
require_once('../includes/connection.php'); 
session_start();
if (isset($_SESSION['email'])) {
	$email = $_SESSION['email'];

	$sql1 = "SELECT * FROM users WHERE email = '$email'"; 
    $res1 = mysqli_query($connect, $sql1);
    if(mysqli_num_rows($res1)){
        $rows = mysqli_fetch_assoc($res1);
        $username = $rows['username'];
    } 
}else{
	header('location: ../adminlogin.php');
}
?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="../img/favicon.ico" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets/plugins/notifications/css/lobibox.min.css" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">

	<title>DigitXpresso Delivery Company | Admin</title>
</head>

<body class="bg-theme bg-theme1">
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="" class="logo-icon" alt="">
				</div>
				<div>
					<h4 class="logo-text">DigitXpresso</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">


				<li>
					<a href="dashboard.php">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>

				</li>
				<li>
					<a href="newshipment.php">
						<div class="parent-icon"><i class='bx bx-user-circle'></i>
						</div>
						<div class="menu-title">New Shipment</div>
					</a>

				</li>
				<li>
					<a href="https://transsx.com/webmail">
						<div class="parent-icon"><i class='bx bx-mail-send'></i>
						</div>
						<div class="menu-title">WebMail</div>
					</a>

				</li>

				<li>
					<a href="../includes/logout.php">
						<div class="parent-icon"><i class="bx bx-lock"></i>
						</div>
						<div class="menu-title">Log Out</div>
					</a>
				</li>

			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search...">
							<span class="position-absolute top-50 search-show translate-middle-y"><i
									class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i
									class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center header-notifications-list header-message-list">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#"> <i class='bx bx-search'></i>
								</a>
							</li>			
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
							role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="assets/images/avatars/avatar-1.png" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0"><?=$username?></p>
								<p class="designattion mb-0">Admin</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="dashboard.php"><i
										class='bx bx-home-circle'></i><span>Dashboard</span></a>
							</li>
							
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<!-- <li><a class="dropdown-item" href="authentication-lock-screen.php"><i
										class='bx bx-lock'></i><span>Lock Screen</span></a>
							</li> -->
							<li><a class="dropdown-item" href="../includes/logout.php"><i
								class='bx bx-log-out-circle'></i><span>Logout</span></a>
				        	</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->