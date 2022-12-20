<?php
include 'koneksi.php';
?>

<?php
if (isset($_POST['insert'])) {
    $nama_brita = $_POST['nama_brita'];
    $dskripsi = $_POST['deskripsi'];
    $sql = "INSERT INTO brita (nama_brita,deskripsi)
    VALUES ('$nama_brita','$dskripsi')";
    $conn->query($sql);

    $target_dir = "brita/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $type_file = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $nama_file = $conn->insert_id . '.' . $type_file;
    $file_lama = $target_dir . $_FILES["file"]["name"];
    $file_baru = $target_dir . $nama_file;

    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    rename("$file_lama", "$file_baru");
    $sql = "UPDATE brita SET file = '$nama_file' WHERE brita_id = $conn->insert_id";
    $conn->query($sql);

}
header("location: input _brita_dan_kegiatan.php");
?>