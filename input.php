<?php
include 'layouts/header.php';

$message = null;

if ($_POST['tgl_transaksi'] && $_POST['kode_lokasi'] && $_POST['kode_item'] && $_POST['qty']) {
    $data = [
        'tgl_transaksi' => $_POST['tgl_transaksi'],
        'kode_lokasi' => $_POST['kode_lokasi'],
        'kode_item' => $_POST['kode_item'],
        'qty_actual' => $_POST['qty'],
        'npk' => $_SESSION['username'],
    ];
    $sql = "INSERT INTO t_produksi (tgl_transaksi, kode_lokasi, kode_item, qty_actual, npk) VALUES (:tgl_transaksi, :kode_lokasi, :kode_item, :qty_actual, :npk)";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute($data)) {
        $message = 'Data berhasil ditambahkan';
    }
}
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="card col-md-5 mt-4">
        <div class="card-header">
            Transaksi Produksi
        </div>

        <form action="" method="POST">
            <div class="card-body">
                <div class="form-group row mb-1">
                    <div class="col-3">
                        <label for="inputPassword6" class="col-form-label">Tanggal</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="tgl_transaksi" id="tgl_transaksi" class="form-control" />
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <div class="col-3">
                        <label for="inputPassword6" class="col-form-label">Lokasi</label>
                    </div>
                    <div class="col-9">
                        <select name="kode_lokasi" class="form-select">
                            <?php
                            $stmt = $conn->query("SELECT * FROM m_lokasi");
                            while ($row = $stmt->fetch()) {
                                echo '<option value="' . $row['kode_lokasi'] . '">' . $row['name_lokasi'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <div class="col-3">
                        <label for="inputPassword6" class="col-form-label">Item</label>
                    </div>
                    <div class="col-9">
                        <select name="kode_item" id="kode_item" class="form-select">
                            <?php
                            $stmt = $conn->query("SELECT * FROM m_item");
                            while ($row = $stmt->fetch()) {
                                echo '<option value="' . $row['kode_item'] . '">' . $row['name_item'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <div class="col-3">
                        <label for="inputPassword6" class="col-form-label">Qty</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="qty" id="qty" class="form-control" />
                    </div>
                </div>
            </div>
            <?php
            echo '<p>' . $message . '</p>';
            ?>
            <div class="card-footer">
                <button type="submit" class="btn btn-success"><span data-feather="save"></span> Simpan</button>
                <button class="btn btn-danger"><span data-feather="x"></span> Clear</button>
            </div>

        </form>
    </div>
</main>

<?php include 'layouts/footer.php' ?>