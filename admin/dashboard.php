<?php
require_once('../includes/header.php');

?>
<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Dashboard</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Users</li>
					</ol>
				</nav>
			</div>

		</div>
		<!--end breadcrumb-->

		<div class="card">
			<div class="card-body">
				<!-- <div class="d-lg-flex align-items-center mb-4 gap-3">
					<div class="position-relative">
						<input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
					</div>
					<div class="ms-auto"><a href="newshipment.php" class="btn btn-light radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New Order</a></div>
				</div> -->
				<div class="table-responsive">
					<table id="example" class="table mb-2  table-striped table-bordered" >
						<thead class="table-light">
							<tr>
								<!-- <th>S/N</th> -->
								<th>Track Code</th>
								<th>Email</th>
								<th>Status</th>
								<th>Depature</th>
								<th>Arrival</th>
								<th>View Invoice</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$sql = "SELECT * FROM ship WHERE addemail = '$email' AND deleted = 1";
							// $sql = "SELECT * FROM ship WHERE addemail = '$email' AND deleted = 1 order by id desc";
							$res = mysqli_query($connect, $sql);
							$num = 1;
							if(mysqli_num_rows($res)){
								// $num = 1;
								while($rows = mysqli_fetch_assoc($res)){ 
						?>
							<tr>
								<!-- <td><?=$num++?></td> -->
								<td>
									<div class="d-flex align-items-center">

										<div class="ms-2">
											<h6 class="mb-0 font-14"><?=$rows['trackcode']?></h6>
										</div>
									</div>
								</td>
								<td><?=$rows['remail']?></td>
								<td>
									<div class="badge rounded-pill bg-light p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i><?=$rows['ds']?></div>
								</td>
								<!-- <td>$485.20</td> -->
								<td><?=$rows['dod']?></td>
								<td><?=$rows['edoa']?></td>
								<td><a type="button" href="../app-invoice.php?id=<?=base64_encode($rows['id'])?>" class="btn btn-light btn-sm radius-30 px-4">View Invoice</a></td>
								<td>
									<div class="d-flex order-actions">
										<a href="editshipment.php?track=<?=base64_encode($rows['trackcode'])?>" class=""><i class='bx bxs-edit'></i></a>

										<a href="../includes/delete.php?id=<?=base64_encode($rows['id'])?>" class="ms-3"><i class='bx bxs-trash'></i></a>
									</div>
								</td>
							</tr>
						<?php } ?>
						<?php }  ?>
							
						</tbody>
					</table>
				</div>
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
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>	
	<script src="assets/plugins/notifications/js/lobibox.min.js"></script>
	<script src="assets/plugins/notifications/js/notifications.min.js"></script>
<!--app JS-->
<script>
	$(document).ready(function() {
		$('#example').DataTable()
	});
</script>

<script>
// function success_noti() {
Lobibox.notify('success', {
	pauseDelayOnHover: true,
	continueDelayOnInactiveTab: false,
	position: 'top right',
	icon: 'bx bx-check-circle',
	msg: '<?=urldecode($_GET['success'])?>'
});
// }
</script>

<script src="assets/js/app.js"></script>
</body>



</html>