<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title; ?></h6>
        </div>
        <div class="x_content">
            <form action="" method="post" class="form-horizontal form-label-left" novalidate>
                <input type="hidden" name="id_sekolah" value="<?= $sekolah['id_sekolah']; ?>">
                <div class="row justify-content-center pt-4" post>
                    <div class="col-2">
                        <label for="nama_sekolah" class="col-form-label">Nama sekolah</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="nama_sekolah" name="nama_sekolah" class="form-control"
                            value="<?= $sekolah['nama_sekolah']; ?>">
                        <?= form_error('nama_sekolah', '<small class="text-danger pl-3">' ,'</small>'); ?>
                    </div>

                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="wilayah" class="col-form-label">Wilayah</label>
                    </div>
                    <div class="col-3">
                        <input id="wilayah" name="wilayah" class="form-control"
                            value="<?= $sekolah['wilayah']; ?>">
                        <?= form_error('wilayah', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="alamat" class="col-form-label">Alamat</label>
                    </div>
                    <div class="col-3">
                        <input id="alamat" name="alamat" class="form-control"
                            value="<?= $sekolah['alamat']; ?>">
                        <?= form_error('alamat', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="no_telepon" class="col-form-label">Telepon</label>
                    </div>
                    <div class="col-3">
                        <input id="no_telepon" name="no_telepon" class="form-control"
                            value="<?= $sekolah['no_telepon']; ?>">
                        <?= form_error('no_telepon', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="npsn" class="col-form-label">NPSN</label>
                    </div>
                    <div class="col-3">
                        <input id="npsn" name="npsn" class="form-control"
                            value="<?= $sekolah['npsn']; ?>">
                        <?= form_error('npsn', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                </div>

                <div class=" row justify-content-center pt-4 pb-4">
                    <div class="col-1">
                        <a href="<?php echo base_url('user/lihat_sekolah'); ?>"><button class="btn btn-danger"
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