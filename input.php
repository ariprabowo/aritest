<?php include 'layouts/header.php'?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="card col-md-5 mt-4">
        <div class="card-header">
            Transaksi Produksi
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group row mb-1">
                    <div class="col-3">
                        <label for="inputPassword6" class="col-form-label">Tanggal</label>
                    </div>
                    <div class="col-9">
                        <input type="text" id="inputPassword6" class="form-control" value="<?php echo date('d M Y'); ?>" />
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <div class="col-3">
                        <label for="inputPassword6" class="col-form-label">Lokasi</label>
                    </div>
                    <div class="col-9">
                        <select name="kode_lokasi" class="form-select">
                            <option>--Pilih Lokasi--</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <div class="col-3">
                        <label for="inputPassword6" class="col-form-label">Item</label>
                    </div>
                    <div class="col-9">
                        <select name="kode_item" id="kode_item" class="form-select">
                            <option>--Pilih Item--</option>
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
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-success"><span data-feather="save"></span> Simpan</button> 
            <button class="btn btn-danger"><span data-feather="x"></span> Clear</button>
        </div>
    </div>
</main>

<?php include 'layouts/footer.php'?>

