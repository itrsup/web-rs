<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>RS Umum Pekerja</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <img src="assets/img/icon.png"> RS Umum Pekerja
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="index.php">Branda</a></li>
          <li class="dropdown"><a href="#"><span>Tentang</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="tentang_kami.php">Tentang Kami</a></li>
              <li><a href="sambutan_kepala_rumahsakit.php">Sambutan Kepala Rumah Sakit</a></li>
              <li><a href="pasien_dan_pengunjung.php">Tata Tertib & Waktu Berkunjung</a></li>
              <li><a href="hak _pasien_dan_keluarga.php">Hak & Kewajiban Pasien Dan Keluarga Pasien</a></li>
              <li><a href="karir.php">Karir</a></li>
            </ul>
          <li class="dropdown"><a href="#"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="rawat_jalan.php">Rawat Jalan</a></li>
              <li><a href="rawat_inap.php">Rawat Inap</a></li>
              <li><a href="medical_checkup.php">Medical Check Up</a></li>
            </ul>
          </li>
          <li><a href="medical_checkup.php">Medical Check Up</a></li>
          <li><a href="jadwal_dokter.php">Jadwal Dokter</a></li>
          <!-- <li><a href="brita.php">Berita</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>

  <main id="main">
    <br>
    <section id="portfolio" class="portfolio">
      <div class="container">
        <div class="row portfolio-container" data-aos="fade-up">
          <?php
          $query = mysqli_query($conn, "SELECT * FROM mcu");
          $i = 0;
          while ($row = mysqli_fetch_array($query)) {
            $i++;
          ?>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <img src="mcu/<?php echo $row['file'] ?>" class="img-fluid portfolio-lightbox preview-link" alt="">
            </div>
          <?php } ?>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3 style="color:black;">RS UMUM PEKERJA</h3>
            <p style="color:black;">
              Jl. Tipar Cakung No.46, RT.2/RW.1, Sukapura, Kec. Cilincing, Kota Jkt Utara. <br>
              <strong>Call Center :</strong> 021-29484848<br>
            </p>
          </div>

          <div class="col-lg-1 col-md-5 footer-links">
            <ul>
              <h4 style="color:black;">TENTANG</h4>
              <a href="#" style="color:black;">KORPORASI</a><br>
              <a href="#" style="color:black;">KARIR</a><br>
            </ul>
          </div>
          <div class="col-lg-2 col-md-6 footer-links">
            <h4 style="color:black;">SOSIAL MEDIA</h4>
            <ul>
              <a href="#" class="twitter" style="color:black;"><i class="bx bxl-twitter"></i> Twitter</a><br>
              <a href="#" class="facebook" style="color:black;"><i class="bx bxl-facebook"></i>Facebook</a><br>
              <a href="#" class="instagram" style="color:black;"><i class="bx bxl-instagram"></i>Instagram</a>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter text-center">
            <h4 style="color:black;">PENGHARGAAN</h4>
            <img src="assets/img/kars.png" width="100" height="80"><br>
            <h8 style="color:black;">Akreditasi KARS</h8><br>
            <h8 style="color:black;">Paripurna</h8>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>RS Umum Pekerja 2021</span></strong>.
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>