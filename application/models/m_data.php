<?php 

class M_data extends CI_Model{

    // Method ini digunakan untuk menampilkan semua data pada tabel user
    function tampil_data(){
		return $this->db->get('user');
    }
    
    // Method ini untuk melakukan insert data ke dalam tabel
    function input_data($data,$table){
		$this->db->insert($table,$data);
    }
    
    // method ini untuk melakukan menghapus data ke dalam tabel user
    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    // method ini untuk mengambil 1 baris data dalam tabel sesuai kondisi variabel where
    function edit_data($where,$table){		
    return $this->db->get_where($table,$where);
    }

    // method ini digunakan untuk memperbarui data pada tabel user
    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
	}	

}