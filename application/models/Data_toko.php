<?php

use LDAP\Result;

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_toko extends CI_Model
{
    // model ambil semua data table dari database
    public function getDataToko($table){
        return $this->db->get($table)->result();
    }

        // method tambah barang
    public function tambah_barang(){

        $data = [
            'nama_barang' => $this->input->post('nama_barang', true),
            'stok' => $this->input->post('stok', true),
            'nama_brand' => $this->input->post('nama_brand', true),
            'nama_kat'  => $this->input->post('nama_kat', true),
            'h_jual' => $this->input->post('harga_jual', true),
            'h_beli' => $this->input->post('harga_beli', true),
           

        ];

        $this->db->insert('tb_barang', $data);
    }
    
    // method tambah kategori
    public function tambah_kategori(){

        $data = [
            'nama_kat' => $this->input->post('nama_kategori', true),
            'desk_kat' => $this->input->post('deskripsi', true),
        ];

        $this->db->insert('tb_kategori', $data);
    }

    // method tambah sekolah
    public function tambah_sekolah(){

        $data = [
            'nama_sekolah' => $this->input->post('nama_sekolah', true),
            'wilayah' => $this->input->post('wilayah', true),
            'alamat' => $this->input->post('alamat', true),
            'no_telepon' => $this->input->post('no_telepon', true),
            'npsn'=> $this->input->post('npsn',true),
        ];

        $this->db->insert('tb_sekolah', $data);
    }
 
    // method tambah sales
    public function tambah_sales(){

        $data = [
            'nama_sales' => $this->input->post('nama_sales', true),
            'alamat' => $this->input->post('alamat', true),
            'no_telepon' => $this->input->post('no_telepon', true),
        ];

        $this->db->insert('tb_sales', $data);
    }

    // GET HIDDEN ID untuk ubah data
    public function getBarang($id_barang){
        return $this->db->get_where('tb_barang', ['id_barang' => $id_barang])->row_array();
    }
    public function getKategori($id_kat){
        return $this->db->get_where('tb_kategori', ['id_kat' => $id_kat])->row_array();
    }
    public function getSekolah($id_sekolah){
        return $this->db->get_where('tb_sekolah', ['id_sekolah' => $id_sekolah])->row_array();
    }
    public function getSales($id_sales){
        return $this->db->get_where('tb_sales', ['id_sales' => $id_sales])->row_array();
    }

    // STOK
    
    // Stok obat hampir habis 
    public function almoststok()
    {
         return $this->db->query('SELECT * FROM tb_barang WHERE stok BETWEEN 1 AND 9');
    }

    // stok obat sudah habis 
    public function habis_stok()
    {
         return $this->db->query('SELECT * FROM tb_barang WHERE stok BETWEEN 0 AND 0');
    }

    // hitung total barang
    public function total_barang(){       
        $to =  $this->db->query('SELECT *, SUM(tb_barang.stok) as sumBarang FROM tb_barang'); 
            if ($to->num_rows() > 0) {
                foreach ($to->result() as $get) {
                    return $get->sumBarang;
                }
            }
            else {
                return FALSE;
            }   
    }

    // notif kadaluwarsa
    function countstock(){       
        $cs =  $this->db->query('SELECT * FROM tb_barang WHERE stok BETWEEN 0 AND 0'); 
        $habis = $cs->num_rows();
        return $habis;    
    }

    function hampir_habis(){       
        $cs =  $this->db->query('SELECT * FROM tb_barang WHERE stok BETWEEN 1 AND 9'); 
        $hampirHabis = $cs->num_rows();
        return $hampirHabis;    
    }

    function countexp(){       
        $ce = $this->db->query('SELECT * FROM tb_obat WHERE kedaluwarsa BETWEEN DATE_SUB(NOW(), INTERVAL 100 YEAR) AND NOW()');
        $expired = $ce->num_rows();
        return $expired;     
    }

    function hampir_kadal(){       
        $ce =  $this->db->query('SELECT * FROM tb_obat WHERE kedaluwarsa BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 15 DAY)'); 
        $hampirKadal = $ce->num_rows();
        return $hampirKadal;    
    }

    // total kategori
    public function total_kategori(){       
      $tk =  $this->db->query('SELECT * FROM tb_kategori'); 
        $totKat = $tk->num_rows();
        return $totKat;    
    }
 
    // total sekolah
    public function total_sekolah(){       
      $tp =  $this->db->query('SELECT * FROM tb_sekolah'); 
        $sup = $tp->num_rows();
        return $sup;    
    }

     // total sales
     public function total_sales(){       
        $tp =  $this->db->query('SELECT * FROM tb_sales'); 
          $sup = $tp->num_rows();
          return $sup;    
      }

    // total pembelian
    // function total_beli(){       
    //    $q = "SELECT *, SUM(tb_pembelian.subtotal) as 'totalAll' FROM tb_pembelian ";

    //     $run_q = $this->db->query($q);

    //     if ($run_q->num_rows() > 0) {
    //         foreach ($run_q->result() as $get) {
    //             return $get->totalAll;
    //         }
    //     }
    //     else {
    //         return FALSE;
    //     }  
    // }

    // // total penjualan 
    // function total_jual(){       
    //    $q = "SELECT *, SUM(tb_penjualan.subtotal) as 'totalAll' FROM tb_penjualan";

    //     $run_q = $this->db->query($q);

    //     if ($run_q->num_rows() > 0) {
    //         foreach ($run_q->result() as $get) {
    //             return $get->totalAll;
    //         }
    //     }
    //     else {
    //         return FALSE;
    //     }  
    // }

    // JOIN TABEL

    // ambil kategori muncul di form obat
    public function get_kategori()
    {
        $data = array();
        $query = $this->db->get('tb_kategori')->result_array();

        if( is_array($query) && count ($query) > 0 )
        {
            foreach ($query as $row ) 
        {
            $data[$row['nama_kat']] = $row['nama_kat'];
        }
        }
        asort($data);
        return $data;
    }  

    public function get_brand()
    {
        $data = array();
        $query = $this->db->get('tb_barang')->result_array();

        if( is_array($query) && count ($query) > 0 )
        {
            foreach ($query as $row ) 
        {
            $data[$row['nama_brand']] = $row['nama_brand'];
        }
        }
        asort($data);
        return $data;
    }  

    function get_sales()
    {
        $data = array();
        $query = $this->db->get('tb_sales')->result_array();

        if( is_array($query) && count ($query) > 0 )
        {
        foreach ($query as $row ) 
        {
          $data[$row['nama_sales']] = $row['nama_sales'];
        }
        }
        asort($data);
        return $data;
    }

    function get_wilayah()
    {
        $data = array();
        $query = $this->db->get('tb_sekolah')->result_array();

        if( is_array($query) && count ($query) > 0 )
        {
        foreach ($query as $row ) 
        {
          $data[$row['wilayah']] = $row['wilayah'];
        }
        }
        asort($data);
        return $data;
    }

    function get_sekolah()
    {
        $data = array();
        $query = $this->db->get('tb_sekolah')->result_array();

        if( is_array($query) && count ($query) > 0 )
        {
        foreach ($query as $row ) 
        {
          $data[$row['nama_sekolah']] = $row['nama_sekolah'];
        }
        }
        asort($data);
        return $data;
    }

    function get_data_wil($nama_sekolah)
    {  
        $query = $this->db->query("SELECT * FROM tb_sekolah WHERE nama_sekolah = '$nama_sekolah' ORDER BY nama_sekolah ASC");
                return $query->result();
    }


    // edit data obat biar bisa muncul sekolah kategori
    public function edit_data_barang($table){      
        return $this->db->get($table)->result();
    }


    // WILAYAH MODEL EDIT DATA

        // method ubah obat
    public function edit_barang(){

        $data = [
            'nama_barang' => $this->input->post('nama_barang', true),
            'nama_brand' => $this->input->post('nama_brand', true),
            'stok' => $this->input->post('stok', true),
            'nama_kat' => $this->input->post('nama_kat', true),
            'h_jual' => $this->input->post('h_jual', true),
            'h_beli' => $this->input->post('h_beli', true),
        ];

        $this->db->where('id_barang', $this->input->post('id_barang'));
        $this->db->update('tb_barang', $data);
    }

        // method ubah kategori
    public function edit_kat(){

        $data = [
            'nama_kat' => $this->input->post('nama_kategori', true),
            'desk_kat' => $this->input->post('deskripsi', true),
        ];

        $this->db->where('id_kat', $this->input->post('id_kat'));
        $this->db->update('tb_kategori', $data);
    }

        // method ubah sekolah
    public function edit_sekolah(){

        $data = [
            'nama_sekolah' => $this->input->post('nama_sekolah', true),
            'wilayah' => $this->input->post('wilayah', true),
            'alamat' => $this->input->post('alamat', true),
            'no_telepon' => $this->input->post('no_telepon', true),
            'npsn' => $this->input->post('npsn', true),
        ];

        $this->db->where('id_sekolah', $this->input->post('id_sekolah'));
        $this->db->update('tb_sekolah', $data);
    }

           // method ubah sales
           public function edit_sales(){

            $data = [
                'nama_sales' => $this->input->post('nama_sales', true),
                'alamat' => $this->input->post('alamat', true),
                'no_telepon' => $this->input->post('no_telepon', true),
            ];
    
            $this->db->where('id_sales', $this->input->post('id_sales'));
            $this->db->update('tb_sales', $data);
        }


    // WILAYAH MODEL HAPUS DATA

        // hapus barang
    public function hapus_barang($id_barang){
        $this->db->delete('tb_barang', ['id_barang' => $id_barang]);
    }

        // hapus kategori
    public function hapus_kat($id_kat){
        $this->db->delete('tb_kategori', ['id_kat' => $id_kat]);
    }

        // hapus sekolah
    public function hapus_sekolah($id_sekolah){
        $this->db->delete('tb_sekolah', ['id_sekolah' => $id_sekolah]);
    }

            // hapus sales
            public function hapus_sales($id_sales){
                $this->db->delete('tb_sales', ['id_sales' => $id_sales]);
            }

        // method hapus penjualan
    public function hapus_penjualan($id){
        $this->db->where('id_jual', $id);
        $this->db->delete('tb_penjualan');
    }

            // method hapus penjualan
    public function hapus_pembelian($id){
        $this->db->where('id_beli', $id);
        $this->db->delete('tb_penjualan');
    }

    // TRASAKSI    
    function get_product($nama_barang)
    {  
        $hasil = array();
        $hsl=$this->db->query("SELECT * FROM tb_barang WHERE nama_barang='$nama_barang'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'nama_barang' => $data->nama_barang,
                    'nama_brand' => $data->nama_brand,
                    'stok' => $data->stok,
                    'nama_kat' => $data->nama_kat,
                    'h_jual' => $data->h_jual,
                    'h_beli' => $data->h_beli,
                    
                    );
            }
        }
        return $hasil;
    }

    function get_barang()
    {
        $data = array();
        $query = $this->db->get('tb_barang')->result_array();

        if( is_array($query) && count ($query) > 0 )
        {
        foreach ($query as $row ) 
        {
          $data[$row['nama_barang']] = $row['nama_barang'];
        }
        }
        asort($data);
        return $data;
    }

    
    // TAMBAH PENJUALAN
    function tambah_penjualan(){
		 
			$nama_pembeli = $this->input->post('nama_pembeli');
			$tgl_beli = date("Y-m-d",strtotime($this->input->post('tgl_beli')));
			$grandtotal = $this->input->post('grandtotal');
			$ref = generateRandomString();
            $nama_sales = $this->input->post('nama_sales');
            $nama_sekolah = $this->input->post('nama_sekolah');
            $wilayah = $this->input->post('wilayah');
			$nama_barang = $this->input->post('nama_barang');
			$h_jual = $this->input->post('h_jual');
            $diskon = $this->input->post('diskon');
			$banyak = $this->input->post('banyak');
			$subtotal = $this->input->post('subtotal');

		foreach($nama_barang as $key=>$val){
		   
		$data[] = array(
				'nama_pembeli' => $nama_pembeli,
				'tgl_beli' => $tgl_beli,
				'grandtotal' => $grandtotal,
				'ref' => $ref,
                'nama_sales'  => $nama_sales[$key],
                'nama_sekolah' => $nama_sekolah,
                'wilayah' => $wilayah,
				'nama_barang' => $val,
                'diskon' => $diskon[$key],
				'h_jual' => $h_jual[$key],
				'banyak' => $banyak[$key],
				'subtotal' => $subtotal[$key],
				);

		$this->db->set('stok', 'stok-'.$banyak[$key], FALSE);
	    $this->db->where('nama_barang', $val);
	    $updated = $this->db->update('tb_barang');
		
		}
		
		$this->db->insert_batch('tb_penjualan', $data);
	}

    // LAPORAN
    public function get_laporan(){
        $q = "SELECT month.month_name as month, 
            SUM(tb_pembelian.subtotal) AS total1,
            SUM(tb_penjualan.subtotal) AS total2  
            FROM month 
            LEFT JOIN tb_pembelian ON month.month_num = MONTH(tb_pembelian.tgl_beli)
            AND YEAR(tb_pembelian.tgl_beli)= '2021'  
            LEFT JOIN tb_penjualan ON month.month_num = MONTH(tb_penjualan.tgl_beli)
            AND YEAR(tb_penjualan.tgl_beli)= '2021' 
            GROUP BY month.month_name ORDER BY month.month_num";
       
        $run_q = $this->db->query($q);

        if($run_q->num_rows() > 0){
            return $run_q->result();
        }

        else{
            return FALSE;
        }
    }


    function count_totalbeli(){       
       $q = "SELECT *, SUM(tb_barang.h_beli) as 'totalTrans' FROM tb_barang ";

        $run_q = $this->db->query($q);

        if ($run_q->num_rows() > 0) {
            foreach ($run_q->result() as $get) {
                return $get->totalTrans;
            }
        }
        else {
            return FALSE;
        }  
    }

    function count_totaljual(){       
       $q = "SELECT *, SUM(tb_penjualan.subtotal) as 'totalTrans' FROM tb_penjualan";

        $run_q = $this->db->query($q);

        if ($run_q->num_rows() > 0) {
            foreach ($run_q->result() as $get) {
                return $get->totalTrans;
            }
        }
        else {
            return FALSE;
        }  
    }

    function get_gabung($tahun_beli){
        $query = $this->db->query("SELECT m.month_name as month, 
                i.total_inv, 
                p.total_pur
                FROM month m
                LEFT JOIN (SELECT MONTH(tgl_beli) as month, 
                            SUM(subtotal) as total_inv  
                            FROM tb_penjualan
                            WHERE YEAR(tgl_beli)= '$tahun_beli'
                            GROUP BY month) i  ON (m.month_num = i.month)    
                LEFT JOIN (SELECT MONTH(tgl_beli) as month, 
                            SUM(subtotal) as total_pur
                            FROM  tb_pembelian 
                            WHERE YEAR(tgl_beli)= '$tahun_beli'
                            GROUP BY month) p ON (m.month_num = p.month )
                            ORDER BY m.month_num");
        
        $hasil = array();
        
            foreach($query->result_array() as $data){
                $hasil[] = array(
                    "month" => $data['month'],
                    "total_inv" => $data['total_inv'],
                    "total_pur" => $data['total_pur'],
                    
                    
                );
            }
            return $hasil;
    }

    // LAPORAN
    function get_total($tahun_beli){       
         $query = $this->db->query("SELECT *, (SELECT *, 
                            SUM(subtotal) as total_inv  
                            FROM tb_penjualan
                            WHERE YEAR(tgl_beli)= '2021'
                            )  
                LEFT JOIN (SELECT *, 
                            SUM(subtotal) as total_pur
                            FROM  tb_pembelian 
                            WHERE YEAR(tgl_beli)= '2021'
                            )  
                ");
        
        $hasil = array();
        
            foreach($query->result_array() as $data){
                $hasil[] = array(
                    "month" => $data['month'],
                    "total_inv" => $data['total_inv'],
                    "total_pur" => $data['total_pur'],
                    
                    
                );
            }
            return $hasil;
    } 

    // NOTA
    function show_data($where, $table){      
        $this->db->select('*');
            $this->db->select_sum('banyak');
            $run_q = $this->db->get_where($table,$where);
            return $run_q;
    }

    function show_invoice($where, $table){      
        $this->db->select('*');
            $run_q = $this->db->get_where($table,$where);
            return $run_q;
    }

    // FITUR PENGELOMPOKAN TRANSAKSI

    function penjualan()
    {
        $this->db->select('*');
            
            $this->db->select_sum('tb_penjualan.banyak');
        
            $this->db->group_by('ref');
            $this->db->order_by ('tgl_beli', 'DESC');

            $run_q = $this->db->get('tb_penjualan');
            return $run_q;
    }

    function pembelian()
    {
        $this->db->select('*');
            
            $this->db->select_sum('tb_pembelian.banyak');
        
            $this->db->group_by('ref');
            $this->db->order_by ('tgl_beli', 'DESC');

            $run_q = $this->db->get('tb_pembelian');
            return $run_q;
    }


    // LAPORAN MODEL BARU
    function laporan_penjualan()
    {
        $this->db->select('*');
            
            $this->db->select_sum('tb_penjualan.banyak');
        
            $this->db->group_by('ref');
            $this->db->order_by ('tgl_beli', 'DESC');

            $run_q = $this->db->get('tb_penjualan');
            return $run_q;
    }
}