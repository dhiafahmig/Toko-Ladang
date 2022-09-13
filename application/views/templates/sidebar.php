<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion font-weight-bold" style="background: #d1ad7b;"
    id="accordionSidebar">
    <!-- Sidebar - LOGO-->
    <br>
    <br>
    <br>
    <div class="d-flex justify-content-center">
        <!-- logo info -->
        <div class=" logo_pic">
            <img src="<?php echo base_url('assets/img/profile/tokoladang3.png') ?>" alt="..." class="img-circle" width="200"
                height="90"></a>
        </div>
    </div>
    <br>
    <br>
    
    <!--
    <div class="profile">
        <div class="font-weight-bold text-center" style="color: #365ea3;"><span style="font-size: 20px;"><span style="font-style: gotham;">
                Sistem Keuangan
            </span></div>
    </div>
    -->

    <!-- Divider Garis -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Nav Item - Beranda -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/index')?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider Garis -->
    <hr class="sidebar-divider">


    <!-- Menu Barang -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBarang" aria-expanded="true"
            aria-controls="collapseBarang">
            <i class="fa fa-fw fa-medkit"></i>
            <span>Barang</span>
        </a>
        <div id="collapseBarang" class="collapse" aria-labelledby="headingBarang" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('user/form_barang')?>">Tambah Barang</a>
                <a class="collapse-item" href="<?= base_url('user/lihat_barang')?>">Lihat Barang</a>
            </div>
        </div>
    </li>

    <!-- Menu Kategori -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKategori"
            aria-expanded="true" aria-controls="collapseKategori">
            <i class="fa fa-fw fa-plus-square"></i>
            <span>Kategori</span>
        </a>
        <div id="collapseKategori" class="collapse" aria-labelledby="headingKategori" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('user/form_kategori')?>">Tambah Kategori</a>
                <a class="collapse-item" href="<?= base_url('user/lihat_kategori')?>">Lihat Kategori</a>
            </div>
        </div>
    </li>

    <!-- Menu Sekolah -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSekolah"
            aria-expanded="true" aria-controls="collapseSekolah">
            <i class="fa fa-fw fa-users"></i>
            <span>Sekolah</span>
        </a>
        <div id="collapseSekolah" class="collapse" aria-labelledby="headingSekolah" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('user/form_sekolah')?>">Tambah Sekolah</a>
                <a class="collapse-item" href="<?= base_url('user/lihat_sekolah')?>">Lihat Sekolah</a>
            </div>
        </div>
    </li>

     <!-- Menu Sales -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSales"
            aria-expanded="true" aria-controls="collapseSales">
            <i class="fa fa-fw fa-users"></i>
            <span>Sales</span>
        </a>
        <div id="collapseSales" class="collapse" aria-labelledby="headingSales" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('user/form_sales')?>">Tambah Sales</a>
                <a class="collapse-item" href="<?= base_url('user/lihat_sales')?>">Lihat Sales</a>
            </div>
        </div>
    </li>

    <!-- Menu Transaksi -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaksi"
            aria-expanded="true" aria-controls="collapseTransaksi">
            <i class="fa fa-fw fa-shopping-cart"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapseTransaksi" class="collapse" aria-labelledby="headingTransaksi" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('user/lihat_penjualan')?>">Penjualan</a>
            </div>
        </div>
    </li>


    <!-- Menu LAPORAN -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
            aria-expanded="true" aria-controls="collapseLaporan">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('laporan_controller/laporan_penjualan')?>">Laporan
                    Penjualan</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->