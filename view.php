<?php

include 'layouts/header.php';

$stmt = $conn->query("SELECT * FROM m_lokasi");
$kode_lokasi = null;
$location_options = null;
$n = 0;
while ($row = $stmt->fetch()) {
    $selected = null;
    if ($_POST && $_POST['kode_lokasi'] == $row['kode_lokasi']) {
        $selected = 'selected';
    }

    $location_options .= '<option '.$selected.' value="' . $row['kode_lokasi'] . '">' . $row['name_lokasi'] . '</option>';
    if ($n++ === 0) {
        $kode_lokasi = $row['kode_lokasi'];
    }
}
$tgl_transaksi = date('Y-m-d');

if ($_POST && $_POST['tgl_transaksi']) {
    $tgl_transaksi = $_POST['tgl_transaksi'];
}

if ($_POST && $_POST['kode_lokasi']) {
    $kode_lokasi = $_POST['kode_lokasi'];
}

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>Data Produksi</h4>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
            </div>
        </div>
    </div>
    <div class="row">
        <form action="" method="POST">
            <div class="form-group row border-bottom pb-3">
                <div class="col-1">
                    <label>Tanggal</label>
                </div>
                <div class="col-4 border-end">
                    <input type="text" name="tgl_transaksi" id="tgl_transaksi2" class="form-control" value="<?php echo $tgl_transaksi ?>" />
                </div>
                <div class="col-1">
                    <label>Lokasi</label>
                </div>
                <div class="col-4 border-end">
                    <select name="kode_lokasi" class="form-select">
                        <?php echo $location_options ?>
                    </select>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-info"><span data-feather="search"></span> Cari</button>
                    <button class="btn btn-danger"><span data-feather="x"></span> Clear</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row mt-3">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-success text-white">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kode Item</th>
                        <th>Nama Item</th>
                        <th>Kode Lokasi</th>
                        <th>Nama Lokasi</th>
                        <th>Qty Actual</th>
                        <th>Created By</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $conn->prepare("SELECT t_produksi.tgl_transaksi, m_item.kode_item, m_item.name_item, m_lokasi.kode_lokasi, m_lokasi.name_lokasi, t_produksi.qty_actual, m_karyawan.name FROM t_produksi LEFT JOIN m_item ON m_item.kode_item = t_produksi.kode_item LEFT JOIN m_lokasi ON m_lokasi.kode_lokasi = t_produksi.kode_lokasi LEFT JOIN m_karyawan ON m_karyawan.npk = t_produksi.npk WHERE t_produksi.tgl_transaksi = :tgl_transaksi AND t_produksi.kode_lokasi = :kode_lokasi");
                    $stmt->execute(['tgl_transaksi' => $tgl_transaksi, 'kode_lokasi' => $kode_lokasi]);
                    $no = 1;
                    while ($row = $stmt->fetch()) {
                        echo '<tr>';
                        echo '<td>' . $no++ . '</td>';
                        echo '<td>' . date('d F Y', strtotime($row['tgl_transaksi'])) . '</td>';
                        echo '<td>' . $row['kode_item'] . '</td>';
                        echo '<td>' . $row['name_item'] . '</td>';
                        echo '<td>' . $row['kode_lokasi'] . '</td>';
                        echo '<td>' . $row['name_lokasi'] . '</td>';
                        echo '<td>' . $row['qty_actual'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include 'layouts/footer.php' ?>