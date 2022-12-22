<?php
include 'koneksi.php';
?>
<?php
if (isset($_POST['insert'])) {
    $nama_kontak=$_POST['nama_kontak'];
    $email=$_POST['email'];
    $kendala=$_POST['kendala_kontak'];
    $sql="INSERT INTO kontak (nama_kontak,email,kendala_kontak) 
    VALUES ('$nama_kontak','$email','$kendala')";
    echo $sql;
}
?>