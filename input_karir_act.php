<?php
include 'koneksi.php';
?>

<?php
if (isset($_POST['insert'])) {
    $nama = $_POST['nama_karir'];
    $sql = "INSERT INTO karir (nama_loker)
    VALUES ('$nama')";
    $conn->query($sql);

    $target_dir = "karir/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $type_file = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $nama_file = $conn->insert_id . '.' . $type_file;
    $file_lama = $target_dir . $_FILES["file"]["name"];
    $file_baru = $target_dir . $nama_file;

    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    rename("$file_lama", "$file_baru");
    $sql = "UPDATE karir SET file = '$nama_file' WHERE karir_id = $conn->insert_id";
    $conn->query($sql);
    header("location: input_medical_checkup.php");
    exit();
} else {
    $file_delete = mysqli_query($conn, "SELECT file FROM mcu WHERE karir_id ='" . $_GET['id'] . "'");
    $target_dir = "karir/";
    while ($row = mysqli_fetch_array($file_delete)) {
        $file_hapus = $target_dir . $row['file'];
        echo $file_hapus;
        unlink("$file_hapus");
    }
    $delete = mysqli_query($conn, "DELETE FROM karir WHERE karir_id = '" . $_GET['id'] . "'");
    if ($delete) {
        header("location: input_karir.php");
    } else {
        echo 'gagal bos';
    }
} header("location: input_karir.php");
?>
