<?php
include 'koneksi.php';
?>

<?php
if (isset($_POST['insert'])) {
    $nama = $_POST['nama_dashboard'];
    $sql = "INSERT INTO dashboard (nama_dashboard)
    VALUES ('$nama')";
    $conn->query($sql);
    
    $target_dir = "dashboard/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $type_file = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $nama_file = $conn->insert_id . '.' . $type_file;
    $file_lama = $target_dir . $_FILES["file"]["name"];
    $file_baru = $target_dir . $nama_file;

    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    rename("$file_lama", "$file_baru");
    $sql = "UPDATE dashboard SET file = '$nama_file' WHERE dashboard_id = $conn->insert_id";
    $conn->query($sql);


}elseif (isset($_POST['update'])) {
    $nama = $_POST['nama_dashboard'];
    $dashboard_id = $_POST['dashboard_id'];
    $sql = "UPDATE dashboard SET nama_dashboard = '$nama' WHERE dashboard_id = $dashboard_id";
    $conn->query($sql);

    $file_edit = mysqli_query($conn, "SELECT file FROM dashboard WHERE dashboard_id = $dashboard_id");
    $target_dir = "dashboard/";
    while ($row = mysqli_fetch_array($file_edit)) {
        $file_hapus = $target_dir . $row['file'];
        unlink("$file_hapus");
    }
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $type_file = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $nama_file = $dashboard_id . '.' . $type_file;
    $file_lama = $target_dir . $_FILES["file"]["name"];
    $file_baru = $target_dir . $nama_file;

    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    rename("$file_lama", "$file_baru");
    $sql = "UPDATE dashboard SET file = '$nama_file' WHERE dashboard_id = $dashboard_id";
    $conn->query($sql);
} else {
    $file_delete = mysqli_query($conn, "SELECT file FROM dashboard WHERE dashboard_id ='" . $_GET['id'] . "'");
    $target_dir = "dashboard/";
    while ($row = mysqli_fetch_array($file_delete)) {
        $file_hapus = $target_dir . $row['file'];
        echo $file_hapus;
        unlink("$file_hapus");
    }
    $delete = mysqli_query($conn, "DELETE FROM dashboard WHERE dashboard_id = '" . $_GET['id'] . "'");
    if ($delete) {
        header("location: input_dashboard.php");
    } else {
        echo 'gagal bos';
    }
    exit();
}

header("location: input_dashboard.php");
?>
