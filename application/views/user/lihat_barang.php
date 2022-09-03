<!-- DataTales Example -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <!-- notifikasi data berhasil ditambahkan -->
            <?php if ($this->session->flashdata('flash') ) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Obat <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php endif; ?>
            <a href="<?php echo base_url('user/form_barang'); ?>"><button class="btn btn-success mb-3">
                    <i class="fas fa-plus"> Tambah Barang</i></button></a>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Obat</th>
                            <th>Brand</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Harga Jual</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1; 
                        foreach ($barang as $data) : 
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $data->nama_barang; ?></td>
                            <td><?= $data->nama_brand; ?></td>
                            <td><?= $data->nama_kat; ?></td>
                            <td><?= $data->stok; ?></td>
                            <td>Rp<?= number_format($data->h_jual); ?></td>
                            <td>
                                <a href="<?= base_url('user/edit_barang/'). $data->id_barang?>"><button type="edit"
                                        class="sbtn btn-success"><i class="fas fa-edit"></i></button></a>

                                <a href="<?= base_url('user/hapus_barang/'). $data->id_barang?>"><button type="delete"
                                        class="sbtn btn-danger" onclick="return confirm('Yakin?')"><i
                                            class="fas fa-trash"></i></button></a>
                            </td>
                        </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="<?= base_url('assets/');?>vendor/moment/min/moment.min.js">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf',
        ]
    });
});
</script>