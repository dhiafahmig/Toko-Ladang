<?php

use LDAP\Result;

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'noRef.php';

class User extends CI_Controller
{
    // menarik data db models
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Data_apotek');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('table');

        $data['habis'] = $this->Data_apotek->countstock();
        $data['expired'] = $this->Data_apotek->countexp();
        $data['hampir_habis'] = $this->Data_apotek->hampir_habis();
        $data['hampir_exp'] = $this->Data_apotek->hampir_kadal();
        $this->load->view('templates/topbar', $data, true);

    }


    public function index ()
    {
        // menu awal setelah login
        $data['title'] = 'Halaman Utama';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['sumBarang'] = $this->Data_apotek->total_barang();
        $data['sumSales'] = $this->Data_apotek->total_sales();
        $data['sumSekolah'] = $this->Data_apotek->total_sekolah();
        $data['sumJual'] = $this->Data_apotek->count_totaljual();
        $data['sumBeli'] = $this->Data_apotek->count_totalbeli();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }



    // Tabel kedaluwarsa
    public function tabel_kedaluwarsa()
    {
        $data['title'] = 'Tabel Kedaluwarsa';
        $data['title1'] = 'Tabel Obat Akan Kedaluwarsa';
        $data['title2'] = 'Tabel Obat Sudah Kedaluwarsa';

        $data['table_almostexp'] = $this->Data_apotek->almostexp()->result();
        $data['table_exp'] = $this->Data_apotek->expired()->result();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        $data['obat'] = $this->Data_apotek->getDataApotek('tb_obat');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/tabel_kedaluwarsa', $data);
        $this->load->view('templates/footer');
    }

        // Tabel stok
    public function tabel_stok()
    {
        $data['title'] = 'Tabel Stok Obat';
        $data['title1'] = 'Tabel Stok Obat Akan Habis';
        $data['title2'] = 'Tabel Stok Obat Sudah Habis';


        $data['habis_stok'] = $this->Data_apotek->habis_stok()->result();
        $data['almstok'] = $this->Data_apotek->almoststok()->result();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        $data['obat'] = $this->Data_apotek->getDataApotek('tb_obat');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/tabel_stok', $data);
        $this->load->view('templates/footer');
    }

            // Tabel kedaluwarsa
    //coba laporan baru
    // public function lihat_laporan_penjualan()
    // {
    //     $data['title'] = 'Laporan Penjualan Bulanan';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //     $bulan=$this->input->post('bulan');
    //     $tahun=$this->input->post('tahun');
    //     $bulantahun=$bulan.$tahun;
    //     $data['lap_jual'] = $this->db->query("SELECT * form tb_penjualan where tgl_beli='$bulantahun' ORDER BY id_jual ASC")->result();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('user/laporan_penjualan', $data);
    //     $this->load->view('templates/footer');
    // }
    
    public function tabel_laporan()
    {
        $data['title'] = 'Rekapitulasi Bulanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        $data['sumJual'] = $this->Data_apotek->count_totaljual();
        $data['sumBeli'] = $this->Data_apotek->count_totalbeli();
		$data['report'] = $this->Data_apotek->get_laporan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/tabel_laporan', $data);
        $this->load->view('templates/footer');
    }

    // method lihat barang
    public function lihat_barang()
    {
        $data['title'] = 'Lihat Barang';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        $data['barang'] = $this->Data_apotek->getDataApotek('tb_barang');
        $data['kategori'] = $this->Data_apotek->getDataApotek('tb_kategori');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lihat_barang', $data);
        $this->load->view('templates/footer');
    }

        // method lihat sekolah
    public function lihat_sekolah()
    {
        $data['title'] = 'Lihat Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        $data['sekolah'] = $this->Data_apotek->getDataApotek('tb_sekolah');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lihat_sekolah', $data);
        $this->load->view('templates/footer');
    }

    // method lihat sales
    public function lihat_sales()
    {
        $data['title'] = 'Lihat Sales';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        $data['sales'] = $this->Data_apotek->getDataApotek('tb_sales');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lihat_sales', $data);
        $this->load->view('templates/footer');
    }
 
            // method lihat kategori
    public function lihat_kategori()
    {
        $data['title'] = 'Lihat Kategori';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        $data['kategori'] = $this->Data_apotek->getDataApotek('tb_kategori');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lihat_kategori', $data);
        $this->load->view('templates/footer');
    }

         // method lihat penjualan
    public function lihat_penjualan()
    {
        $data['title'] = 'Tabel Penjualan Barang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        $data['penjualan'] = $this->Data_apotek->getDataApotek('tb_penjualan');
        $data['tb_jual'] = $this->Data_apotek->penjualan()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lihat_penjualan', $data);
        $this->load->view('templates/footer');
    }

    
         // method lihat pembelian
    public function lihat_pembelian()
    {
        $data['title'] = 'Tabel Pembelian Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // queri pemanggilan tabel di DB
        $data['pembelian'] = $this->Data_apotek->getDataApotek('tb_pembelian');
        $data['tb_beli'] = $this->Data_apotek->pembelian()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lihat_pembelian', $data);
        $this->load->view('templates/footer');
    }


    // WILAYAH INPUT INPUT DATA

        // method form barang
    public function form_barang()
    {
        $data['title'] = 'Tambah Barang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['get_kat'] = $this->Data_apotek->get_kategori();

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('nama_brand', 'Brand', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        $this->form_validation->set_rules('nama_kat', 'Kategori', 'required');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|numeric');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|numeric');
 
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/form_barang', $data);
            $this->load->view('templates/footer');
        }
        else {
            $this->Data_apotek->tambah_barang();
            $this->session->set_flashdata('flash','ditambahkan');
            redirect('user/lihat_barang');
        }
    }

            // method form kategori
    public function form_kategori()
    {
        $data['title'] = 'Tambah Kategori';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/form_kategori', $data);
            $this->load->view('templates/footer');
        }
        else {
            $this->Data_apotek->tambah_kategori();
            $this->session->set_flashdata('flash','ditambahkan');
            redirect('user/lihat_kategori');
        }
    }

            // method form sekolah
    public function form_sekolah()
    {
        $data['title'] = 'Tambah Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required');
        $this->form_validation->set_rules('wilayah', 'Wilayah', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telepon', 'Telepon', 'required|numeric');
        $this->form_validation->set_rules('npsn', 'NPSN', 'required|numeric');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/form_sekolah', $data);
            $this->load->view('templates/footer');
        }
        else {
            $this->Data_apotek->tambah_sekolah();
            $this->session->set_flashdata('flash','ditambahkan');
            redirect('user/lihat_sekolah');
        }
    }

    // method form sales
    public function form_sales()
    {
        $data['title'] = 'Tambah Sales';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_sales', 'Nama Sales', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telepon', 'Telepon', 'required|numeric');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/form_sales', $data);
            $this->load->view('templates/footer');
        }
        else {
            $this->Data_apotek->tambah_sales();
            $this->session->set_flashdata('flash','ditambahkan');
            redirect('user/lihat_sales');
        }
    }


    // form pembelian
        public function form_pembelian()
    {
        $data['title'] = 'Tambah Pembelian dari Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['get_sekolah'] = $this->Data_apotek->get_sekolah();
        $data['get_med'] = $this->Data_apotek->get_medicine();

        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required');
        $this->form_validation->set_rules('tgl_beli', 'Tanggal Beli', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/form_pembelian', $data);
            $this->load->view('templates/footer');
        }
        else {
            $this->Data_apotek->tambah_pembelian();
            $this->session->set_flashdata('flash','ditambahkan');
            redirect('user/lihat_pembelian');
        }
    }

        // form penjualan
    public function form_penjualan()
    {
        $data['title'] = 'Tambah Penjualan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['get_bar'] = $this->Data_apotek->get_barang();
        $data['get_sal'] = $this->Data_apotek->get_sales();
        $data['get_sek'] = $this->Data_apotek->get_sekolah();
        $data['get_kat'] = $this->Data_apotek->get_kategori();

        $this->form_validation->set_rules('nama_pembeli', 'Nama Pembeli', 'required');
        $this->form_validation->set_rules('tgl_beli', 'Tanggal Beli', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/form_penjualan', $data);
            $this->load->view('templates/footer');
        }
        else {
            $this->Data_apotek->tambah_penjualan();
            $this->session->set_flashdata('flash','ditambahkan');
            redirect('user/lihat_penjualan');
        }
    }


    // WILAYAH EDIT EDIT DATA //

        // edit barang 
    public function edit_barang($id_barang)
    {
        
        $data['title'] = 'Ubah Data Barang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->Data_apotek->getBarang($id_barang);

        $data['get_kat'] = $this->Data_apotek->get_kategori();

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('nama_brand', 'Brand', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        $this->form_validation->set_rules('nama_kat', 'Kategori', 'required');
        $this->form_validation->set_rules('h_jual', 'Harga Jual', 'required|numeric');
        $this->form_validation->set_rules('h_beli', 'Harga Beli', 'required|numeric');
 

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit_barang', $data);
            $this->load->view('templates/footer');
        }
        else {
            // var_dump($this->input->post("h_jual"));die;
            $this->Data_apotek->edit_barang();
            $this->session->set_flashdata('flash','diubah');
            redirect('user/lihat_barang');
        }
    }
    
    // method ubah kategori
    public function edit_kategori($id_kat)
    {
        $data['title'] = 'Ubah Kategori';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->Data_apotek->getKategori($id_kat);


        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit_kategori', $data);
            $this->load->view('templates/footer');
        }
        else {
            $this->Data_apotek->edit_kat();
            $this->session->set_flashdata('flash','diubah');
            redirect('user/lihat_kategori');
        }
    }

    // method ubah sekolah
    public function edit_sekolah($id_sekolah)
    {
        $data['title'] = 'Ubah Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->Data_apotek->getSekolah($id_sekolah);


        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required');
        $this->form_validation->set_rules('wilayah', 'Wilayah', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('npsn', 'NPSN', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit_sekolah', $data);
            $this->load->view('templates/footer');
        }
        else {
            $this->Data_apotek->edit_sekolah();
            $this->session->set_flashdata('flash','diubah');
            redirect('user/lihat_sekolah');
        }
    }

        // method ubah sales
        public function edit_sales($id_sales)
        {
            $data['title'] = 'Ubah Sales';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['sales'] = $this->Data_apotek->getSales($id_sales);
    
    
            $this->form_validation->set_rules('nama_sales', 'Nama Sales', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('no_telepon', 'Telepon', 'required');
    
            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('user/edit_sales', $data);
                $this->load->view('templates/footer');
            }
            else {
                $this->Data_apotek->edit_sales();
                $this->session->set_flashdata('flash','diubah');
                redirect('user/lihat_sales');
            }
        }

    // LAPORAN
    function gabung()
	{
       $tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->Data_apotek->get_gabung($tahun_beli);
		echo json_encode($data);
	}

    

    // WILAYAH HAPUS HAPUS DATA

        // method hapus data barang
    public function hapus_barang($id_barang)
    {
        $this->Data_apotek->hapus_barang($id_barang);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('user/lihat_barang');
    }

    // method hapus data kategori
    public function hapus_kategori($id_kat)
    {
        $this->Data_apotek->hapus_kat($id_kat);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('user/lihat_kategori');
    }
    
    // method hapus data kategori
    public function hapus_sekolah($id_sekolah)
    {
        $this->Data_apotek->hapus_pmasok($id_sekolah);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('user/lihat_sekolah');
    }

    // method hapus data sales
    public function hapus_sales($id_sales)
    {
        $this->Data_apotek->hapus_sales($id_sales);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('user/lihat_sales');
    }

    // method hapus penjualan
       public function hapus_penjualan($id_jual)
       {
           $this->Data_apotek->hapus_penjualan($id_jual);
           $this->session->set_flashdata('flash', 'dihapus');
           redirect('user/lihat_penjualan');
       }

    // TRANSAKSI
    function getmedbysupplier(){
        $nama_sekolah=$this->input->post('nama_sekolah');
        $data=$this->Data_apotek->getmedbysupplier($nama_sekolah);
        echo json_encode($data);
    }

    function product()
	{
	    $nama_barang=$this->input->post('nama_barang');
        $data=$this->Data_apotek->get_product($nama_barang);
        echo json_encode($data);
	}

    // LAPORAN
    function totale()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->Data_apotek->get_total($tahun_beli);
		echo json_encode($data);
	}

    // NOTA INI
    public function lihat_nota_penjualan($ref)
    {
        $data['title'] = 'Tanda Bukti';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('ref' => $ref);
        $data['table_invoice'] = $this->Data_apotek->show_data($where, 'tb_penjualan')->result();
		$data['show_invoice'] = $this->Data_apotek->show_invoice($where, 'tb_penjualan')->result();

        // queri pemanggilan tabel di DB
        $data['penjualan'] = $this->Data_apotek->getDataApotek('tb_penjualan');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lihat_nota_penjualan', $data);
        $this->load->view('templates/footer');
    }

    public function lihat_nota_pembelian($ref)
    {
        $data['title'] = 'Tanda Bukti';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('ref' => $ref);
        $data['table_invoice'] = $this->Data_apotek->show_data($where, 'tb_pembelian')->result();
		$data['show_invoice'] = $this->Data_apotek->show_invoice($where, 'tb_pembelian')->result();

        // queri pemanggilan tabel di DB
        $data['penjualan'] = $this->Data_apotek->getDataApotek('tb_penjualan');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lihat_nota_pembelian', $data);
        $this->load->view('templates/footer');
    }
    
}