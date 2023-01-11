<?php
include "koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM layanan_rawat_inap WHERE layanan_id = '" . $_GET['id'] . "'");
$kodok = mysqli_fetch_array($data);

$nama = $kodok['nama_layanan'];
$file = $kodok['file'];

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
                <img src="assets/img/icon.png">
                <img src="assets/img/KBNGRAHAMEDICA.png">
                <img src="assets/img/pelni.png">
                <img src="assets/img/bumn.png">
                <img src="assets/img/ihc.png">
                <strong>RS UMUM PEKERJA</strong>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="active" href="index.php">Beranda</a></li>
                    <li class="dropdown"><a href="#"><span>Tentang</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="tentang_kami.php">Tentang Kami</a></li>
                            <li><a href="sambutan_kepala_rumahsakit.php">Sambutan Kepala Rumah Sakit</a></li>
                            <li><a href="pasien_dan_pengunjung.php">Tata Tertib & Waktu Berkunjung</a></li>
                            <li><a href="hak _pasien_dan_keluarga.php">Hak & Kewajiban Pasien Dan Keluarga Pasien</a></li>
                        </ul>
                    <li class="dropdown"><a href="#"><span>Layanan Unggulan</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="rawat_jalan.php">Rawat Jalan</a></li>
                            <li><a href="rawat_inap.php">Rawat Inap</a></li>
                            <li><a href="medical_checkup.php">Medical Check Up</a></li>
                            <li><a href="igd.php">IGD</a></li>
                            <li><a href="icu.php">ICU</a></li>
                            <li><a href="hemodialisa.php">Hemodialisa</a></li>
                            <li><a href="radiologi.php">Radiologi</a></li>
                            <li><a href="laboratorium.php">Laboratorium</a></li>
                            <li><a href="kamarbedah.php">Kamar Bedah</a></li>
                            <li><a href="perina.php">perinatologi</a></li>
                        </ul>
                    </li>
                    <li><a href="medical_checkup.php">Medical Check Up</a></li>
                    <li><a href="promo.php">layanan</a></li>
                    <li><a href="jadwal_dokter.php">Jadwal Dokter</a></li>
                    <li><a href="karir.php">Karir</a></li>
                    <li><a href="contact.php">Kontak</a></li>
                    <!-- <li><a href="brita.php">Berita</a></li> -->
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>

  <main id="main">

    <section id="contact" class="contact">
      <div class="container">
        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
            <H4>Layanan</H4>
            <form action="layanan_rawat_inap_act.php" method="post" class="php-email-form" enctype="multipart/form-data">
              <input type="hidden" name="layanan_id" value="<?php echo $_GET['id'] ?>">
              <p>Nama layanan</p>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="nama_layanan" value="<?php echo $nama ?>">
              </div>
              <p>Upload File</p>
              <div class="form-group mt-3">
                <input type="file" class="form-control" name="file" onchange="loadingsih()">
              </div>
              <div class="form-group mt-3">
                <img src="foto/<?php echo $file ?>" width="150px" height="100px">
              </div>
              <div class="text-center"><button type="submit" name="update">upload</button></div>
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-body text-center">
        <div class="spinner-grow text-primary" role="status">
          <span class="sr-only"></span>
        </div>
        <div class="spinner-grow text-secondary" role="status">
          <span class="sr-only"></span>
        </div>
        <div class="spinner-grow text-success" role="status">
          <span class="sr-only"></span>
        </div>
        <div class="spinner-grow text-danger" role="status">
          <span class="sr-only"></span>
        </div>
        <div class="spinner-grow text-warning" role="status">
          <span class="sr-only"></span>
        </div>
        <div class="spinner-grow text-info" role="status">
          <span class="sr-only"></span>
        </div>
        <div class="spinner-grow text-light" role="status">
          <span class="sr-only"></span>
        </div>
        <div class="spinner-grow text-dark" role="status">
          <span class="sr-only"></span>
        </div>
      </div>
    </div>
  </div>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });

    var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
      keyboard: false
    });

    function loadingsih() {
      myModal.show();
      setTimeout(function(){
        myModal.hide();
      }, 5000);
    }
  </script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <?php
  if (isset($_POST['upload'])) {
    echo "UHUY";
  }
  ?>
</body>

</html>