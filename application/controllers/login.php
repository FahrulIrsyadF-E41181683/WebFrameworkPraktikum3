<?php 

class Login extends CI_Controller{

	/// function construct adalah function yang berfungsi untuk menjalankan fungsi yang diinginkan ketika controller diakses
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');

	}

	function index(){
		$this->load->view('v_login'); // Syntax yang berfungsi untuk menampilkan view v_login
	}

	// method yang dijalankan ketika kita melakukan login
	function aksi_login(){
		//menangkap data yang di inputkan pada form login di v_login dan menyimpanya ke variabel sementara
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		//menyimpan data ke array pada variabel $where
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);

		// menjalankan method cek_login pada model m_login
		$cek = $this->m_login->cek_login("admin",$where)->num_rows();
		if($cek > 0){
			
			// membuat session dengan index 'nama' dan 'status'
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);
			
			//menuju ke controller admin
			redirect(base_url("admin"));

		}else{

			//jika data tidak ada
			echo "Username dan password salah !";
		}
	}
	
	// method yang dijalankan ketika tombol link logout diklik
	function logout(){
		$this->session->sess_destroy(); // Syntax untuk menghapus session
		redirect(base_url('login')); //  Kembali ke controller login
    }
    
    
}