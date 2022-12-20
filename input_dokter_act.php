<?php
include 'koneksi.php';
?>

<?php
if (isset($_POST['insert'])) {
    $gelardepan = $_POST['gelar_depan'];
    $namadokter = $_POST['nama_dokter'];
    $gelarbelakang = $_POST['gelar_belakang'];
    $sql = "INSERT INTO dokter (gelar_depan,nama_dokter,gelar_belakang) VALUES ('$gelardepan','$namadokter','$gelarbelakang')";
    $conn->query($sql);

    header("location: input_dokter.php");
    exit();
} elseif (isset($_POST['mapping'])) {
    $arr_spesialis_id = $_POST['spesialis_id'];
    $dokter_id = $_POST['dokter_id'];
    foreach ($arr_spesialis_id as $spesialis) {
        $sql = "INSERT INTO dokter_spesialis (spesialis_id,dokter_id) VALUES ('$spesialis','$dokter_id')";
        $conn->query($sql);
    }

    header("location: input_dokter.php");
    exit();
} elseif (isset($_POST['jadwal'])) {
    $dokter_id = $_POST['dokter_id'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $kuota = $_POST['kuota'];
    $sql = "INSERT INTO jadwal_dokter (dokter_id,hari,jam_mulai,jam_selesai,kuota) VALUES ('$dokter_id','$hari','$jam_mulai','$jam_selesai','$kuota')";
    $conn->query($sql);

    header("location: input_jadwal_dokter.php?id=$dokter_id");
    exit();
} else {
    $delete = mysqli_query($conn, "DELETE FROM jadwal_dokter WHERE jadwal_dokter_id = '" . $_GET['id'] . "'");
    if ($delete) {
        header("location: input_jadwal_dokter.php?id=$dokter_id");
    } else {
        echo 'gagal bos';
    }
}
?>
