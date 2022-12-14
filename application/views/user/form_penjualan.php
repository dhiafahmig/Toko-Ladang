<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title; ?></h6>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <form action="<?php echo base_url() . 'user/form_penjualan'; ?>" method="post"
                        class="form-horizontal form-label-left" novalidate>

                        <div class="row justify-content-center pt-4" post>
                            <div class="col-2">
                                <label for="nama_pembeli" class="col-form-label">Nama Pembeli</label>
                            </div>
                            <div class="col-3">
                                <input type="text" id="nama_pembeli" name="nama_pembeli" class="form-control">
                                <?= form_error('nama_pembeli', '<small class="text-danger pl-3">' ,'</small>'); ?>
                            </div>
                        </div>

                        <div class="row justify-content-center pt-2">
                            <div class="col-2">
                                <label for="nama_sekolah" class="col-form-label">Nama Sekolah</label>
                            </div>
                            <div class="col-3">
                                <select name="nama_sekolah" id="nama_sekolah"
                                    class="select2_single form-control nama_sekolah" tabindex="-1" required="required">
                                    <option selected="true" value="" disabled></option>
                                    <?php foreach($get_sek as $gs){ ?>
                                    <option value="<?php echo $gs; ?>"><?php echo $gs; ?></option>
                                    <?php  }?>
                                </select>
                                <?= form_error('nama_sekolah', '<small class="text-danger pl-3">' ,'</small>'); ?>
                            </div>
                        </div>

                        <div class="row justify-content-center pt-2">
                            <div class="col-2">
                                <label for="wilayah" class="col-form-label">Wilayah</label>
                            </div>
                            <div class="col-3">
                                <input type="text" name="wilayah" id="wilayah" class="form-control" readonly required>
                            </div>
                        </div>

                        <div class="row justify-content-center pt-2 mb-4">
                            <div class="col-2">
                                <label for="tgl_beli" class="col-form-label">Tanggal Penjualan</label>
                            </div>
                            <div class="col-3">
                                <input type="date" id="tgl_beli" name="tgl_beli" class="form-control">
                                <span class=" input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                <?= form_error('tgl_beli', '<small class="text-danger pl-3">' ,'</small>'); ?>
                            </div>
                        </div>

                        <table id="penjualan" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Nama Sales</th>
                                    <th style="text-align: center">Barang yang dijual</th>
                                    <th style="text-align: center">Sisa Stok</th>
                                    <th style="text-align: center">Kategori</th>
                                    <th style="text-align: center">Harga</th>
                                    <th style="text-align: center">Banyak</th>
                                    <th style="text-align: center">Subtotal</th>

                                    <th style="text-align: center">Diskon</th>
                                    <th style="text-align: center">Aksi</th>

                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <td style="text-align:right; vertical-align: middle" colspan="5">
                                        <b>Grandtotal</b>
                                    </td>
                                    <td>
                                        <input id="grandtotal" name="grandtotal" type="text"
                                            class="form-control grandtotal" readonly>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>


                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo base_url('user/lihat_penjualan') ?>"><button type="button"
                                        class="btn btn-danger">Batal</button></a>
                                <button id='addpenjualan' class="btn btn-info" type="button"><span
                                        class="fa fa-plus"></span>
                                    Tambah Produk</button>
                                <button id="send" type="submit" class="btn btn-success">Simpan</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>

<script type="text/javascript">
const addpenjualan = document.querySelector("#addpenjualan");
var penjualan = $('#penjualan').DataTable({
    "paging": false,
    "ordering": false,
    "info": false,
    "searching": false,
});


var counter = 1;

addpenjualan.onclick = function(event) {
    penjualan.row.add([
        '<select required="required" style="width:100%" class="form-control nama_sales" id="nama_sales' +
        counter +
        '" name="nama_sales[]"><option selected="true" value="" disabled ></option><?php foreach ($get_sal as $gm) { ?><option value="<?php echo $gm; ?>"><?php echo $gm; ?></option><?php  } ?></select>',
        '<select required="required" style="width:100%" class="form-control nama_barang" id="nama_barang' +
        counter + '" name="nama_barang[]" data-stok="#stok' + counter + '" data-nama_kat="#nama_kat' +
        counter + '" data-h_jual="#h_jual' + counter +
        '"><option selected="true" value="" disabled ></option><?php foreach ($get_bar as $gm) { ?><option value="<?php echo $gm; ?>"><?php echo $gm; ?></option><?php  } ?></select>',
        '<input id="stok' + counter + '" name="stok[]" class="form-control stok" readonly >',
        '<input id="nama_kat' + counter + '" name="nama_kat[]" class="form-control" readonly>',
        '<input id="h_jual' + counter +
        '" name="h_jual[]" class="form-control h_jual" readonly>',
        '<input type="number" id="banyak' + counter +
        '" name="banyak[]" class="form-control banyak" required="required">',
        '<input id="subtotal' + counter +
        '" name="subtotal[]" class="form-control subtotal" readonly>',
        '<input type="number" id="diskon' + counter +
        '" name="diskon[]" class="form-control diskon" required="required">',
        '<button id="removeproduk" class="btn btn-danger btn-sm" type="button"><span class="fa fa-trash"></span> Hapus</button>',
    ]).draw(false);

    var myOpt = [];
    $("select").each(function() {
        myOpt.push($(this).val());
    });
    $("select").each(function() {
        $(this).find("option").prop('hidden', false);
        var sel = $(this);
        $.each(myOpt, function(key, value) {
            if ((value != "") && (value != sel.val())) {
                sel.find("option").filter('[value="' + value + '"]').prop('hidden', true);
            }
        });
    });

    counter++;
}

$('#penjualan').on("click", "#removeproduk", function() {
    console.log($(this).parent());
    penjualan.row($(this).parents('tr')).remove().draw(false);
    updateTotal();
});



$('#penjualan').on('change', '.nama_barang', function() {
    var $select = $(this);
    var nama_barang = $select.val();

    $.ajax({
        type: "POST",
        url: "<?php echo base_url('user/product') ?>",
        dataType: "JSON",
        data: {
            nama_barang: nama_barang
        },
        cache: false,
        success: function(data) {
            $.each(data, function(nama_barang, stok, nama_kat, h_jual) {
                $($select.data('stok')).val(data.stok);
                $($select.data('nama_kat')).val(data.nama_kat);
                $($select.data('h_jual')).val(data.h_jual);
            });
        }
    });

});

$('#penjualan').on('change', '.banyak', function() {
    updateSubtotalp();
});

$('#penjualan').on('change', '.diskon', function() {
    updateSubtotalp();
});

function updateSubtotalp() {

    $(".banyak, .diskon").each(function() {
        var $row = $(this).closest('tr');
        var unitStock = parseInt($row.find('.stok').val());
        var unitCount = parseInt($row.find('.banyak').val());
        var unitDiscount = parseInt($row.find('.diskon').val());


        if (unitCount > unitStock) {
            $row.find('.banyak').val(unitStock);
            alert("PERINGATAN ! PENJUALAN MELEBIHI SISA STOK");
            updateSubtotalp();
        } else if (unitCount < 0) {
            $row.find('.banyak').val(0);
            updateSubtotalp();
        } else if (unitDiscount < 0) {
            $row.find('.diskon').val(0);
            updateSubtotalp();
        } else {
            var Sub = parseInt(($row.find('.h_jual').val()) * unitCount);
            var TotDiskon = parseInt(Sub * (unitDiscount / 100));
            var Result = parseInt(Sub - TotDiskon);
            $row.find('.subtotal').val(Result);
            updateTotal();
        }
    });
}

function updateTotal() {
    var grandtotal = 0;
    $('.subtotal').each(function() {
        grandtotal += parseInt($(this).val());
    });
    $('#grandtotal').val(grandtotal);
}
</script>

<script type="text/javascript">
$(document).ready(function() {

    $(document).ready(function() {
        // $('#id_prodi').hide();
        tampil_wil();
    })

    function tampil_wil() {
        $('#nama_sekolah').change(function() {
            let get_data_wil = $('#nama_sekolah').val();

            $.ajax({
                type: "POST",
                dataType: "JSON",
                data: {
                    nama_sekolah: get_data_wil
                },
                url: "<?= base_url("user/get_data_wil") ?>",
                success: function(data) {
                    // console.log(data);

                    let html = "";
                    let i;

                    for (i = 0; i < data.length; i++) {
                        $("#wilayah").val(data[i].wilayah);
                    }
                }
            });
        })
    }
});
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#harga_jual').keyup(function() {
        var jual = parseInt($('#harga_jual').val());

        var a = beli * diskon;
        var subtotal = a;
        $('#harga_jual').val(h_jual);
    });
});
</script>