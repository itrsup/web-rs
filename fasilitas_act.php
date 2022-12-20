<?php
include 'koneksi.php';
?>

<?php
if (isset($_POST['simpan'])) {
    $nama_fasilitas=$_POST['nama_fasilitas'];
    $sql="INSERT INTO fasilitas (nama_fasilitas) VALUES ('$nama_fasilitas')";
    $conn->query($sql);
}
header("location: input_fasilitas.php");
?>