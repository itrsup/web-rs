<?php
include 'koneksi.php';
?>

<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_spesialis'];
    $sql = "INSERT INTO spesialis (nama_spesialis)
    VALUES ('$nama')";
    $conn->query($sql);
    header("location: input_spesialis.php");
    exit();
} else {
    $delete = mysqli_query($conn, "DELETE FROM spesialis WHERE spesialis_id = '" . $_GET['id'] . "'");
    if ($delete) {
        header("location: input_spesialis.php");
    } else {
        echo 'gagal bos';
    }
}


?>
