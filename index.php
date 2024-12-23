<?php
session_start();
include('includes/config.php');
include('includes/format_rupiah.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title><?php echo $pagedesc; ?></title>
  <!--Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
  <link href="assets/css/slick.css" rel="stylesheet">
  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="admin/img/newicon.jpeg">
</head>

<body>

  <!--Header-->
  <?php include('includes/header.php'); ?>
  <!-- /Header -->
  <main>
    <!-- Banners -->
    <section id="banner" class="banner-section">
      <div class="container">
        <div class="div_zindex">
          <div class="row">
            <div class="col-md-10 col-md-push-1">
              <div class="banner_content">
                <h1 style="font-family: Roboto, Helvetica Neue;"> Jadikanlah pasanganmu tempat untuk berlabuh dan membagi semua momen dalam hidupmu.</h3>
                  <p>Kami membantu anda dalam mengabadikan setiap momen yang tak terlupakan. </p>
                  <a href="page.php?type=aboutus" class="btn">Selengkapnya <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-padding gray-bg">
      <div class="container">
        <div class="row">

          <!-- Nav tabs -->
          <div class="recent-tab">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#" role="tab" data-toggle="tab">Gallery</a></li>
            </ul>
          </div>
          <!-- Recently Listed New Cars -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="">

              <?php
              $sql = "SELECT * FROM galery";
              $query = mysqli_query($koneksidb, $sql);
              if (mysqli_num_rows($query) > 0) {
                while ($results = mysqli_fetch_array($query)) {

              ?>

                  <div class="col-list-3">
                    <div class="paket-list"><img src="admin/gallery/<?php echo htmlentities($results['foto_galery']); ?>" class="img-responsive" alt="image"></div>
                  </div>
              <?php }
              } ?>
            </div>
          </div>
        </div>
    </section>

    <center>
      <h2>Tertarik dengan Jasa kami ? </h2> <a href="paket.php" class="btn">Pesan Sekarang<span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
    </center>
    <br>


    <!--Footer -->
    <?php include('includes/footer.php'); ?>
    <!-- /Footer-->

    <!--Back to top-->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
    <!--/Back to top-->

    <!-- Login-Form -->
    <?php include('includes/login.php'); ?>
    <!--/Login-Form -->

    <!--Register-Form -->
    <?php include('includes/registration.php'); ?>

    <!--/Register-Form  -->

    <!--Forgot-password-Form -->
    <?php include('includes/forgotpassword.php'); ?>
    <!--/Forgot-password-Form -->

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/interface.js"></script>
    <!--Switcher-->
    <script src="assets/switcher/js/switcher.js"></script>
    <!--bootstrap-slider-JS-->
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <!--Slider-JS-->
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
  </main>
</body>

</html>