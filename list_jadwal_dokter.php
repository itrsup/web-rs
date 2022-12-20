<?php
include "koneksi.php";

if ($_GET['param'] != '') {
    $param = $_GET['param'];
    $tambahan = "and lower(dokter.nama_dokter) like '%$param%' OR lower(nama_spesialis) like '%$param%' ORDER BY nama_spesialis";
} else {
    $tambahan = "";
}
?>

<head>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<br>
<?php
$query1  = "SELECT
                DISTINCT spesialis.spesialis_id,
                nama_spesialis
            FROM
                spesialis
            JOIN dokter_spesialis ON
                spesialis.spesialis_id = dokter_spesialis.spesialis_id
            JOIN dokter ON
                dokter_spesialis.dokter_id = dokter.dokter_id
            WHERE 1 = 1
            $tambahan";
$resquery1 = mysqli_query($conn, $query1);
while ($row1 = mysqli_fetch_array($resquery1)) {
?>
    <table class="table table-bordered text-center tablenih">
        <thead class="table-success">
            <tr>
                <td width="20%"><?php echo $row1['nama_spesialis'] ?></td>
                <td width="11%">senin</td>
                <td width="11%">selasa</td>
                <td width="11%">rabu</td>
                <td width="11%">kamis</td>
                <td width="11%">jum'at</td>
                <td width="11%">sabtu</td>
            </tr>
        </thead>
        <tbody class="bodynih">
            <?php
            $spesialis_id = $row1['spesialis_id'];
            $query2  = "SELECT
                            DISTINCT dokter.dokter_id,
                            nama_spesialis,
                            dokter.gelar_depan,
                            dokter.nama_dokter,
                            dokter.gelar_belakang
                        FROM
                            dokter_spesialis
                        JOIN dokter ON
                            dokter_spesialis.dokter_id = dokter.dokter_id
                        JOIN spesialis ON
                            dokter_spesialis.spesialis_id = spesialis.spesialis_id
                        JOIN jadwal_dokter ON
                            dokter_spesialis.dokter_id = jadwal_dokter.dokter_id
                        WHERE
                            spesialis.spesialis_id = $spesialis_id
                            $tambahan";
            $resquery2 = mysqli_query($conn, $query2);
            while ($row2 = mysqli_fetch_array($resquery2)) {
                $dokter_id = $row2['dokter_id'];
            ?>
                <tr>
                    <td width="20%"><?php echo $row2['gelar_depan']." ".$row2['nama_dokter']." ".$row2['gelar_belakang']; ?></td>
                    <?php
                    $query3  = "SELECT
                                    DISTINCT dokter.dokter_id,
                                    hari,
                                    jam_mulai,
                                    jam_selesai,
                                    kuota
                                FROM
                                    dokter_spesialis
                                JOIN dokter ON
                                    dokter_spesialis.dokter_id = dokter.dokter_id
                                JOIN spesialis ON
                                    dokter_spesialis.spesialis_id = spesialis.spesialis_id
                                JOIN jadwal_dokter ON
                                    dokter_spesialis.dokter_id = jadwal_dokter.dokter_id
                                WHERE
                                    dokter.dokter_id = $dokter_id";
                    $resquery3 = mysqli_query($conn, $query3);
                    while ($row3 = mysqli_fetch_array($resquery3)) {
                        $dokter_id = $row3['dokter_id'];
                        $hari = $row3['hari'];
                        $jam_mulai = $row3['jam_mulai'];
                        $jam_selesai = $row3['jam_selesai'];
                        $arr_jadwal[$hari] = $jam_mulai . '-' . $jam_selesai;
                    }
                    ?>
                    <td width="10"><?php echo $arr_jadwal['Senin'] ?? '-' ?></td>
                    <td width="10"><?php echo $arr_jadwal['Selasa'] ?? '-' ?></td>
                    <td width="10"><?php echo $arr_jadwal['Rabu'] ?? '-' ?></td>
                    <td width="10"><?php echo $arr_jadwal['Kamis'] ?? '-' ?></td>
                    <td width="10"><?php echo $arr_jadwal['Jumat'] ?? '-' ?></td>
                    <td width="10"><?php echo $arr_jadwal['Sabtu'] ?? '-' ?></td>
                </tr>
            <?php
                unset($arr_jadwal);
            } ?>
        </tbody>
    </table>
<?php } ?>