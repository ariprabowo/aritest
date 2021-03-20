<?php include 'layouts/header.php'?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>Data Produksi</h4>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">                   
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group row border-bottom pb-3">
            <div class="col-1">
                <label>Tanggal</label>
            </div>
            <div class="col-4 border-end">
                <input type="text" name="tgl_transaksi" id="tgl_transaksi" class="form-control"/>
            </div>
            <div class="col-1">
                <label>Lokasi</label>
            </div>
            <div class="col-4 border-end">
                <select class="form-select">
                    <option>--Pilih Lokasi--</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>
            <div class="col-2">
                <button class="btn btn-info"><span data-feather="search"></span> Cari</button>
                <button class="btn btn-danger"><span data-feather="x"></span> Clear</button>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-success text-white">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Transaksi</th>
                        <th>Kode Item</th>
                        <th>Nama Item</th>
                        <th>Kode Lokasi</th>
                        <th>Nama Lokasi</th>
                        <th>Qty Actual</th>
                        <th>Create By</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</main>

<?php include 'layouts/footer.php'?>

