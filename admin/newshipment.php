<?php
require_once('../includes/header.php');
?>
<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">

		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">New Shipment</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Add New Shipment</li>
					</ol>
				</nav>
			</div>

		</div>
		<!--end breadcrumb-->

		<div class="card">
			<div class="card-body p-4">
				<h5 class="card-title">Add New Shippment</h5>
				<hr />
				<form class="form-body mt-4" method="POST" action="../includes/generate.php">
					<div class="row">

						<div class="col-lg-6 mt-4 mb-3">
							<div class="border border-3 p-4 rounded">
								<div>
									<h5 class="card-title mb-4">Sender's Details</h5>
									<div class="row g-3">

										<div class="col-12">
											<label for="sendname" class="form-label">Sender's Name: </label>
											<input type="text" class="form-control" required name="sname" placeholder="Sender's Name">
										</div>
										<div class="col-12">
											<label for="raddress" class="form-label">Sender's Address: </label>
											<input type="text" class="form-control" required name="saddress" placeholder="Sender's Address">
										</div>
										<div class="col-12">
											<label for="remail" class="form-label">Sender's Email: </label>
											<input type="email" class="form-control" required name="semail" placeholder="Sender's Email">
										</div>
										<div class="col-12">
											<label for="rnumber" class="form-label">Sender' Phone: </label>
											<input type="text" class="form-control" required name="sphone" placeholder="Sender' Phone">
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
											<input type="text" class="form-control" required name="rname" placeholder="Reciever's Address">
										</div>
										<div class="col-12">
											<label for="raddress" class="form-label">Reciever's Address: </label>
											<input type="text" class="form-control" required name="raddress" placeholder="Reciever's Address">
										</div>
										<div class="col-12">
											<label for="remail" class="form-label">Reciever's Email: </label>
											<input type="email" class="form-control" required name="remail" placeholder="Reciever's Email">
										</div>
										<div class="col-12">
											<label for="rnumber" class="form-label">Reciever' Phone: </label>
											<input type="text" class="form-control" required name="rphone" placeholder="Reciever' Phone">
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
											<textarea class="form-control" required name="description" id="description" rows="3"></textarea>
										</div>
										<div class="col-12">
											<label for="remail" class="form-label">Tax: </label>
											<select class="form-select mb-3" aria-label="" name="tax">
												<option selected>Tax Percentage</option>
												<option value="1%">1%</option>
												<option value="3%">3%</option>
												<option value="5%">5%</option>
												<option value="10%">10%</option>
											</select>
										</div>
										<div class="col-12">
											<label for="remail" class="form-label">Currency: </label>
											<select class="form-select mb-3" aria-label="" name="currency">
												<option selected>Currency</option>
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
											<input type="text" class="form-control" required name="cod" placeholder="City Of Depature">
										</div>
										<div class="col-12">
											<label for="rnumber" class="form-label">Date Of Depature: </label>
											<input type="date" class="form-control" required name="dod" placeholder="Date Of Depature">
										</div>
										<div class="col-12">
											<label for="rnumber" class="form-label">Estimate Date Of Arrival: </label>
											<input type="date" class="form-control" required name="edoa" placeholder="Estimate Date Of Arrival">
										</div>
										<div class="col-12">
											<label for="remail" class="form-label">Current Location: </label>
											<input type="text" class="form-control" required name="cl" placeholder="Current Location">
										</div>
										<div class="col-12">
											<label for="remail" class="form-label">Delivery Status: </label>
											<input type="text" class="form-control" required name="ds" placeholder="Delivery Status">
										</div>
										<div class="col-12">
											<label for="remail" class="form-label">Amount Paid: </label>
											<input type="text" class="form-control" required name="amt" placeholder="Amount Paid">
										</div>
										<div class="col-12">
											<label for="destination" class="form-label">Destination:</label>
											<textarea class="form-control" required name="destination" rows="3"></textarea>
										</div>
										<div class="col-12">
											<div class="d-grid">
												<button  name="cshipment" class="btn btn-light">Create Shipment</button>
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


<!--app JS-->
<script src="assets/js/app.js"></script>
</body>


<!-- Mirrored from codervent.com/dashtreme/demo/vertical/ecommerce-add-new-products.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Apr 2023 20:34:22 GMT -->

</html>