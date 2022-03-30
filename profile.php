<?php
	include 'koneksi.php';
	
	$user_id = $_SESSION['user_id'];
	$user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE id = '$user_id'"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Website Kesehatan</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="assets/img/logo-sehat.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link
		href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
		rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
	<link href="assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">


	<link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<!-- =======================================================
  * Template Name: Medicio - v4.6.0
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

	<style>
		.nav-tabs .nav-item .nav-link.active {
			border: none;
			color: #3fbbc0
		}

		.nav-tabs .nav-item .nav-link {
			border: none;
			color: #000000
		}

		label {
			margin-bottom: 5px
		}
	</style>
</head>

<body style="background-color: #F7F7F7;">

	<!-- ======= Top Bar ======= -->
	<div id="topbar" class="d-flex align-items-center fixed-top">
		<div class="container d-flex align-items-center justify-content-center justify-content-md-between">
			<div class="align-items-center d-none d-md-flex">
				<i class="bi bi-clock"></i> Setiap Hari, 8AM to 10PM
			</div>
			<div class="d-flex align-items-center">
				<i class="bi bi-phone"></i> No Telepon +62848619198
			</div>
		</div>
	</div>

	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top">
		<div class="container d-flex align-items-center">
			<a href="index.php" class="logo me-auto"><img src="assets/img/logo-sehat.png" alt="" /></a>

			<!-- Uncomment below if you prefer to use an image logo -->
			<!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

			<nav id="navbar" class="navbar order-last order-lg-0">
				<ul>
					<li><a class="nav-link scrollto " href="home.php">Home</a></li>
					<li><a class="nav-link scrollto" href="tampilartikel.php">Artikel</a></li>
					<li><a class="nav-link scrollto" href="info-covid.php">Informasi Covid</a></li>
					<li><a class="nav-link scrollto" href="info-obat.php">Obat</a></li>
					<li><a class="nav-link scrollto" href="rumahsakit.php">Kunjungi RS</a></li>
					<li><a class="nav-link scrollto" href="hubdokter.php">Hubungi Dokter</a></li>
					<li><a class="nav-link scrollto" href="riwayat.php">Riwayat</a></li>
					<li><a class="nav-link scrollto active" href="profile.php">Profile</a></li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->
			<a href="logout.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Logout</span></a>
		</div>
	</header><!-- End Header -->

	<?php
        error_reporting(0);
        session_start();
        if(isset($_SESSION['info-pesan'])) {
      ?>
	<div class="alert alert-<?= $_SESSION['info-status'] ?> alert-dismissible fade show" role="alert">
		<?= $_SESSION['info-icon'] ?>
		<?= $_SESSION['info-pesan'] ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	<?php
        }
        unset($_SESSION['info-pesan']);
        unset($_SESSION['info-status']);
        unset($_SESSION['info-icon']);
      ?>

	<div id="main" style="margin: 200px 0 100px">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="card text-center p-4 bg-white border-0">
						<div class="card-body">
							<img src="assets/img/users/<?= $user['img'] ?>" class="rounded-circle" style="width: 50%"
								alt="">
							<h5 class="card-title mt-3" style="font-size: 20px;">
								<?= $user['name'] ?>
							</h5>
							<p style="color: #3fbbc0">Users</p>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="card p-2 bg-white border-0">
						<div class="card-body">
							<div class="row justify-content-between align-items-center">
								<div class="col-md-4">
									<h4 class="card-title" style="color: #3fbbc0">PROFILE ACCOUNT</h4>
								</div>
								<div class="col-md-8">
									<ul class="nav nav-tabs border-0" id="myTab" role="tablist" style="float: right">
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="home-tab" data-bs-toggle="tab"
												data-bs-target="#home" type="button" role="tab" aria-controls="home"
												aria-selected="true">
												Personal Info
											</button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="profile-tab" data-bs-toggle="tab"
												data-bs-target="#profile" type="button" role="tab"
												aria-controls="profile" aria-selected="false">
												User Avatar
											</button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="contact-tab" data-bs-toggle="tab"
												data-bs-target="#contact" type="button" role="tab"
												aria-controls="contact" aria-selected="false">
												Change Password
											</button>
										</li>
									</ul>
								</div>
							</div>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="home" role="tabpanel"
									aria-labelledby="home-tab">

									<form action="forms/user_profile.php" method="post" class="mt-4">
										<input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
										<input type="hidden" name="action" value="personal">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group mb-2">
													<label for="name" class="label">Nama User</label>
													<input type="text" class="form-control" name="name"
														value="<?= $user['name'] ?>" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group mb-2">
													<label for="name" class="label">Username</label>
													<input type="text" class="form-control" name="username"
														value="<?= $user['username'] ?>" required>
												</div>
											</div>
										</div>

										<div class="form-group mb-2">
											<label for="jenis_kelamin" class="label">Jenis Kelamin</label>
											<select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
												<option value="laki-laki"
													<?= ($user['jenis_kelamin'] == 'laki-laki') ? 'selected' : '' ?>>
													Laki-laki</option>
												<option value="Perempuan"
													<?= ($user['jenis_kelamin'] == 'perempuan') ? 'selected' : '' ?>>
													Perempuan</option>
											</select>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group mb-2">
													<label for="no_hp" class="label">Nomor Telepon</label>
													<input type="text" class="form-control" name="no_hp"
														value="<?= $user['no_hp'] ?>" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group mb-2">
													<label for="email" class="label">Email</label>
													<input type="email" class="form-control" name="email"
														value="<?= $user['email'] ?>" required>
												</div>
											</div>
										</div>
										<div class="form-group mb-2">
											<label for="alamat" class="label">Alamat</label>
											<textarea name="alamat" id="alamat" class="form-control" cols="30"
												rows="3"><?= $user['alamat'] ?></textarea>
										</div>
										<button type="submit" class="appointment-btn border-0 m-0 mt-3">
											Simpan Perubahan
										</button>
									</form>

								</div>
								<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

									<form action="forms/user_profile.php" method="post" class="mt-4"
										enctype="multipart/form-data">
										<input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
										<input type="hidden" name="action" value="avatar">
										<input type="hidden" name="name" value="<?= $user['name'] ?>">

										<div class="form-group">
											<label for="img" class="label">Ganti Gambar</label>
											<input type="file" name="img" id="img" class="form-control">
										</div>
										<button type="submit" class="appointment-btn border-0 m-0 mt-3">Simpan
											Perubahan</button>
									</form>

								</div>
								<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

									<form action="forms/user_profile.php" method="post" class="mt-4">
										<input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
										<input type="hidden" name="action" value="password">

										<div class="form-group">
											<label for="changepassword" class="label">Ubah Password</label>
											<input type="password" name="password" id="password" class="form-control">
										</div>
										<button type="submit" class="appointment-btn border-0 m-0 mt-3">
											Simpan Perubahan
										</button>
									</form>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ======= Footer ======= -->
	<footer id="footer">
		<div class="container">
			<div class="copyright">
				&copy; Copyright <strong><span>Website Kesehatan</span></strong>. All Rights Reserved
			</div>
			<div class="credits">
			</div>
		</div>
	</footer>

	<div id="preloader"></div>
	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
			class="bi bi-arrow-up-short"></i></a>

	<!-- Vendor JS Files -->
	<script src="assets/vendor/aos/aos.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="assets/vendor/php-email-form/validate.js"></script>
	<script src="assets/vendor/purecounter/purecounter.js"></script>
	<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

	<script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<!-- Template Main JS File -->
	<script src="assets/js/main.js"></script>
	<script src="assets/js/datatables-demo.js"></script>
</body>

</html>