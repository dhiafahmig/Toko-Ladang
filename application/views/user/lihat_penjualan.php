<!-- DataTales Example -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url('user/form_penjualan'); ?>"><button class="btn btn-success mb-3">
                    <i class="fas fa-plus"> Tambah Penjualan</i></button></a>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Referensi</th>
                            <th>Nama Sales</th>
                            <th>Nama Pembeli</th>
                            <th>Nama Sekolah</th>
                            <th>Wilayah</th>
                            <th>Tanggal Jual</th>
                            <th>Nama Barang</th>
                            <th>Harga Jual</th>
                            <th>Banyak</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($tb_jual as $data) : 
                    ?>
                        <tr>
                            <td><?= $data->ref; ?></td>
                            <td><?= $data->nama_sales; ?></td>
                            <td><?= $data->nama_pembeli; ?></td>
                            <td><?= $data->nama_sekolah; ?></td>
                            <td><?= $data->wilayah; ?></td>
                            <td><?= date('j F Y',strtotime($data->tgl_beli)); ?></td>
                            <td><?= $data->nama_barang; ?></td>
                            <td>Rp <?= number_format($data->h_jual); ?></td>
                            <td><?= $data->banyak; ?></td>
                            <td>Rp <?php echo number_format($data->grandtotal) ?></td>
                            <td style=" text-align: center;">
                                <a href="<?= base_url('user/lihat_nota_penjualan/'). $data->ref?>"><button type="button"
                                        class="sbtn btn-success"><i class="fas fa-file-invoice"></i></button></a>
                                 <a href="<?= base_url('user/hapus_penjualan/'). $data->id_jual?>"><button type="delete"
                                        class="sbtn btn-danger" onclick="return confirm ('yakin?')"><i 
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