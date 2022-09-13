<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title; ?></h6>
        </div>

        <section class="card shadow mb-4">
            <!-- title row -->
            <?php foreach($table_invoice as $i){ ?>
            <div class="row">
                <div class="row m-4">
                    <h1>
                        <i class="fa fa-globe"></i> Nota Penjualan.
                        <small class="pull-right"></small>
                    </h1>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row p-4">
                <div class="col-sm-4">
                    Dari
                    <address>
                        <strong>SIPlah Toko Ladang</strong>
                        <br> Jl. Ratu Dibalau No.148, Tj. Senang, Kec. Tj. Senang,
                        <br> Kota Bandar Lampung, Lampung 35135
                        <br>Telp: 0888 1111 2222 3333

                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                    Pembeli
                    <address>
                        <strong><?php echo $i->nama_pembeli ?></strong>
                        <br> <strong><?php echo $i->nama_sekolah ?></strong>

                        <br>Bandar Lampung

                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                    <b>No Referensi : #<?php echo $i->ref ?></b>
                    <br>
                    <b>Total Pembelian : <?php echo $i->banyak ?></b>
                    <br>
                    <b>Tanggal : <?php echo date('j F Y',strtotime($i->tgl_beli)) ?></b>
                    <br>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <?php } ?>

            <!-- Table row -->
            <div class="row m-3">
                <div class="col-xs-12 table">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th>Nama Barang</th>
                                <th>Harga satuan</th>
                                <th>Banyak</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($show_invoice as $si){ ?>
                            <tr>
                                <td><?php echo $si->nama_barang ?></td>
                                <td>Rp <?php echo number_format($si->h_jual) ?></td>
                                <td><?php echo $si->banyak ?></td>
                                <td>Rp <?php echo number_format($si->subtotal) ?></td>
                            </tr>

                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <?php foreach($table_invoice as $i){ ?>
                            <tr>
                                <td style="text-align:center; vertical-align: middle" colspan="2"><b>Grand
                                        Total</b></td>
                                <td><?php echo ($i->banyak) ?></td>
                                <td>
                                    <b>Rp <?php echo number_format($i->grandtotal) ?></b>
                                </td>
                            </tr>
                            <?php } ?>
                        </tfoot>

                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row m-3">
                <!-- accepted payments column -->
                <div class="col-xs-6">


                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                        Terima kasih sudah mempercayakan kami sebagai mitra pelayanan Anda.
                    </p>
                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row m-3">
                <div class="col-xs-12">
                    <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i>
                        Cetak</button>

                </div>
            </div>

        </section>
    </div>
</div>