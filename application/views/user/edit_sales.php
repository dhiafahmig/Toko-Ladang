<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title; ?></h6>
        </div>
        <div class="x_content">
            <form action="" method="post" class="form-horizontal form-label-left" novalidate>
                <input type="hidden" name="id_sales" value="<?= $sales['id_sales']; ?>">
                <div class="row justify-content-center pt-4" post>
                    <div class="col-2">
                        <label for="nama_sales" class="col-form-label">Nama sales</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="nama_sales" name="nama_sales" class="form-control"
                            value="<?= $sales['nama_sales']; ?>">
                        <?= form_error('nama_sales', '<small class="text-danger pl-3">' ,'</small>'); ?>
                    </div>

                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="alamat" class="col-form-label">Alamat</label>
                    </div>
                    <div class="col-3">
                        <input id="alamat" name="alamat" class="form-control"
                            value="<?= $sales['alamat']; ?>">
                        <?= form_error('alamat', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="no_telepon" class="col-form-label">Telepon</label>
                    </div>
                    <div class="col-3">
                        <input id="no_telepon" name="no_telepon" class="form-control"
                            value="<?= $sales['no_telepon']; ?>">
                        <?= form_error('alamat', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                </div>

                <div class=" row justify-content-center pt-4 pb-4">
                    <div class="col-1">
                        <a href="<?php echo base_url('user/lihat_sales'); ?>"><button class="btn btn-danger"
                                type="button" name="batal" id="batal">Batal</button></a>
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn btn-success" name="submit" id="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>