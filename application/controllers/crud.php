<?php 
 
class Crud extends CI_Controller{
 
	// function construct adalah function yang berfungsi untuk menjalankan fungsi yang diinginkan ketika controller diakses
	function __construct(){
		parent::__construct();		
		$this->load->model('m_data'); // Syntax untuk memuat model bernama m_data
                $this->load->helper('url');
	}

	function index(){
		
		// Variabel $data yang memiliki index user untuk menyimpan data hasil method tampil_data() yang ada di model m_data
		// Method tampil_data() adalah menampilkan semua data yang berada di tabel user pada database
		$data['user'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_tampil',$data); // menampilkan view v_tampil beserta membawa data dari tabel user
    }
    
     // Method yang akan mengarahkan pengguna ke view v_input yang berisi form untuk menginputkan data baru
    function tambah(){
		$this->load->view('v_input');
	}
	
	// Method untuk menangkap data dari view, menyimpannya ke dalam database, dan mengembalikan pengguna ke method index()
	function tambah_aksi(){
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');

		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);
		$this->m_data->input_data($data,'user');
		redirect('crud/index');
    }
    
    // method yang berfungsi untuk melakukan hapus data dari database berdasarkan id
    function hapus($id){
		$where = array('id' => $id);
		$this->m_data->hapus_data($where,'user');
		redirect('crud/index');
    }
    
    // menampilkan form edit data user dan data user dari database berdasarkan id yang dipilih
    function edit($id){
	$where = array('id' => $id);
	$data['user'] = $this->m_data->edit_data($where,'user')->result();
	$this->load->view('v_edit',$data);
    }

	// Method ini berfungsi untuk merekam data, memperbarui data di database yang dimaksud, lalu mengarahkan pengguna ke controller crud method index
    function update(){
	$id = $this->input->post('id');
	$nama = $this->input->post('nama');
	$alamat = $this->input->post('alamat');
	$pekerjaan = $this->input->post('pekerjaan');
 
	$data = array(
		'nama' => $nama,
		'alamat' => $alamat,
		'pekerjaan' => $pekerjaan
	);
	
	// Syntax berfungsi untuk menyimpan id user ke dalam array $where pada index array bernama 'id'
	$where = array(
		'id' => $id
	);
 
	// Syntax yang berfungsi mengarahkan pengguna ke crud/index/
	$this->m_data->update_data($where,$data,'user');
	redirect('crud/index');
}

}