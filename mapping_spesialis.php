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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
            </ul>
          <li class="dropdown"><a href="#"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="rawat_jalan.php">Rawat Jalan</a></li>
              <li><a href="rawat_inap.php">Rawat Inap</a></li>
              <li><a href="medical_checkup.php">Medical Check Up</a></li>
              <li><a href="#">IGD</a></li>
              <li><a href="#">ICU</a></li>
              <li><a href="#">Hemodialisa</a></li>
              <li><a href="#">Radiologi</a></li>
              <li><a href="#">Laboratorium</a></li>
              <li><a href="#">Kamar Bedah</a></li>
              <li><a href="#">Kamar Operasi</a></li>
            </ul>
          </li>
          <li><a href="medical_checkup.php">Medical Check Up</a></li>
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
            <H4>Mapping spesialis</H4>

            <form action="input_dokter_act.php" method="post" class="php-email-form" enctype="multipart/form-data">
              <p>Spesialis</p>
              <div class="mb-2">
                <input type="hidden" name="dokter_id" value="<?php echo $_GET['id'] ?>">
                <select class="form-control js-example-basic-multiple" name="spesialis_id[]" multiple="multiple">
                  <?php
                  $query = mysqli_query($conn, "SELECT * FROM spesialis");
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
                    <option value="<?php echo $row['spesialis_id'] ?>"><?php echo $row['nama_spesialis'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="text-center"><button type="submit" name="mapping">simpan</button></div>
            </form>
            <br>
            <div class="mt-5">
              <table id="example" class="display cell-border" style="width:100%">
                <thead>
                  <th>id_Dokter</th>
                  <th>nama spesialist</th>
                  <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = mysqli_query($conn, "SELECT * FROM dokter_spesialis 
                                                join dokter on dokter_spesialis.dokter_id=dokter.dokter_id
                                                join spesialis on dokter_spesialis.spesialis_id=spesialis.spesialis_id");
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
                    <tr>
                    <tr>
                      <td><?php echo $row['nama_dokter'] ?></td>
                      <td><?php echo $row['nama_spesialis'] ?></td>
                      <td>EDIT</td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

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
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });

    $(document).ready(function() {
      $('.js-example-basic-multiple').select2();
    });
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