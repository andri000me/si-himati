<div class="card">
    <div class="card-header">
        <h3 class="card-text">Tambah uang keluar</h3>
        <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
    </div>
    <div class="card-body">
        <form action="<?= base_url('uang_keluar/tambah'); ?>" method="post">
            <div class="form-group">
                <input type="text" name="total" id="total" class="form-control" placeholder="Total uang keluar" value="<?= set_value('total'); ?>">
            </div>
            <div class="form-group">
                <input type="text" name="kebutuhan" id="kebutuhan" class="form-control" placeholder="Kebutuhan" value="<?= set_value('kebutuhan'); ?>">
            </div>
            <div class="form-group">
                <input type="file" name="arsip" id="arsip" class="form-control-file" placeholder="arsip" value="<?= set_value('arsip'); ?>">
            </div>
            <div class="form-group">
                <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control" placeholder="Tanggal keluar" value="<?= set_value('tanggal_keluar'); ?>">
            </div>
            <div class="form-group">
                <textarea name="keterangan" id="keterangan" class="form-control" value="<?= set_value('keterangan'); ?>"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>