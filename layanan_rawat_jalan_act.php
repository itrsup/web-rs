<?php
include 'koneksi.php';
?>

<?php
if (isset($_POST['insert'])) {
    $nama_klinik = $_POST['nama_klinik'];
    $dskripsi = $_POST['deskripsi'];
    $sql = "INSERT INTO layanan_rawat_jalan (nama_klinik,deskripsi)
    VALUES ('$nama_klinik','$dskripsi')";
    $conn->query($sql);

    $target_dir = "foto2/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $type_file = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $nama_file = $conn->insert_id . '.' . $type_file;
    $file_lama = $target_dir . $_FILES["file"]["name"];
    $file_baru = $target_dir . $nama_file;

    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    rename("$file_lama", "$file_baru");
    $sql = "UPDATE layanan_rawat_jalan SET file = '$nama_file' WHERE layanan_id = $conn->insert_id";
    $conn->query($sql);

} elseif (isset($_POST['update'])) {
    $nama = $_POST['nama_klinik'];
    $dskripsi = $_POST['deskripsi'];
    $layanan_id = $_POST['layanan_id'];
    $sql = "UPDATE layanan_rawat_jalan SET nama_klinik = '$nama' WHERE layanan_id = $layanan_id";
    $conn->query($sql);

    $file_edit = mysqli_query($conn, "SELECT file FROM layanan_rawat_jalan WHERE layanan_id = $layanan_id");
    $target_dir = "foto2/";
    while ($row = mysqli_fetch_array($file_edit)) {
        $file_hapus = $target_dir . $row['file'];
        unlink("$file_hapus");
    }
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $type_file = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $nama_file = $layanan_id . '.' . $type_file;
    $file_lama = $target_dir . $_FILES["file"]["name"];
    $file_baru = $target_dir . $nama_file;

    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    rename("$file_lama", "$file_baru");
    $sql = "UPDATE layanan_rawat_jalan SET file = '$nama_file' WHERE layanan_id = $layanan_id";
    $conn->query($sql);

}else {
    $file_delete = mysqli_query($conn, "SELECT file FROM layanan_rawat_jalan WHERE layanan_id ='" . $_GET['id'] . "'");
    $target_dir = "foto2/";
    while ($row = mysqli_fetch_array($file_delete)) {
        $file_hapus = $target_dir . $row['file'];
        echo $file_hapus;
        unlink("$file_hapus");
    }
    $delete = mysqli_query($conn, "DELETE FROM layanan_rawat_jalan WHERE layanan_id = '" . $_GET['id'] . "'");
    if ($delete) {
        header("location: input_layanan_rawat_jalan.php");
    } else {
        echo 'gagal bos';
    }
    exit();
}
header("location: input_layanan_rawat_jalan.php");
?>
