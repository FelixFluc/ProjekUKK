<!-- for view and whatnot -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_View extends CI_Controller 
{
	public function index()
	{
		$this->load->view('V_landing');
	}

    public function login()
	{
		$this->load->view('V_Login');
	}

    public function SAlogin()
	{
		$this->load->view('Staff-behalf/V_SALogin');
	}

    public function register()
	{
		$this->load->view('V_Register');
	}

    public function SAregister()
	{
		$this->load->view('Staff-behalf/V_SARegister');
	}

	public function setup()
	{
		$this->load->view('Staff-behalf/V_Setup');
	}

    public function dashboard()
	{
		$this->load->model('M_basicModel');
		$data['user'] = $this->M_basicModel->username($this->session->userdata('username'))->row_array();

		$this->load->view('Umisc/header',$data);
		$this->load->view('Umisc/navbar',$data);
		$this->load->view('Umisc/sidebar',$data);
		$this->load->view('V_Dashboard',$data);
		$this->load->view('Umisc/footer',$data);
	}

	public function report()
	{
		$this->load->model('M_basicModel');
		$data['user'] = $this->M_basicModel->username($this->session->userdata('username'))->row_array();

		$data['kategori'] = $this->M_basicModel->category()->result_array();
		$data['subkategori'] = $this->M_basicModel->subcategory()->result_array();

		$this->load->view('Umisc/header',$data);
		$this->load->view('Umisc/navbar',$data);
		$this->load->view('Umisc/sidebar',$data);
		$this->load->view('V_Aduan',$data);
		$this->load->view('Umisc/footer',$data);
	}
    
    public function Adashboard()
	{
		$this->load->model('M_basicModel');
		$data['petugas'] = $this->M_basicModel->Susername($this->session->userdata('username'))->row_array();

		$pengaduan = array(
			'status' => '0',

		);

		$this->db->where($pengaduan);
		$pengaduan = $this->db->get('pengaduan')->num_rows();

		$proses = array(
			'status' => 'proses',

		);

		$this->db->where($proses);
		$proses = $this->db->get('pengaduan')->num_rows();

		$selesai = array(
			'status' => 'selesai',

		);


		$this->db->where($selesai);
		$selesai = $this->db->get('pengaduan')->num_rows();

		$data['jumlah'] = array(
			'pengaduan' => $pengaduan,
			'proses' => $proses,
			'selesai' => $selesai,
		);

		$this->load->view('Amisc/header',$data);
		$this->load->view('Amisc/navbar',$data);
		$this->load->view('Amisc/sidebar',$data);
		$this->load->view('Admin/V_Dashboard',$data);
		$this->load->view('Amisc/footer',$data);
	}

	public function userlist()
	{
		$this->load->model('M_basicModel');
		$data['petugas'] = $this->M_basicModel->Susername($this->session->userdata('username'))->row_array();
		$data['userlist'] = $this->M_basicModel->petugas_nama()->result_array();
		$data['user'] = $this->M_basicModel->masyarakat_nama()->result_array();
		// $data['petugass'] = $this->M_basicModel->Susername()->result_array();

		$this->load->view('Amisc/header',$data);
		$this->load->view('Amisc/navbar',$data);
		$this->load->view('Amisc/sidebar',$data);
		$this->load->view('Admin/V_Userlist',$data);
		$this->load->view('Amisc/footer',$data);
	}

	public function Alist()
	{
		$this->load->model('M_basicModel');
		$data['petugas'] = $this->M_basicModel->Susername($this->session->userdata('username'))->result_array();
		$data['kategori'] = $this->M_basicModel->category()->result_array();
		$data['subkategori'] = $this->M_basicModel->subcategory_join()->result_array();

		$this->load->view('Amisc/header',$data);
		$this->load->view('Amisc/navbar',$data);
		$this->load->view('Amisc/sidebar',$data);
		$this->load->view('Admin/V_Category',$data);
		$this->load->view('Amisc/footer',$data);
	}

	public function listlapor()
	{
		$this->load->model('M_basicModel');
		$data['petugas'] = $this->M_basicModel->Susername($this->session->userdata('username'))->result_array();
		$data['user'] = $this->M_basicModel->username($this->session->userdata('username'))->result_array();
		$data['laporan'] = $this->M_basicModel->listpengaduan()->result_array();
		$data['masyarakat'] = $this->M_basicModel->masyarakat_nama()->result_array();

		$this->load->view('Amisc/header',$data);
		$this->load->view('Amisc/navbar',$data);
		$this->load->view('Amisc/sidebar',$data);
		$this->load->view('Staff-behalf/V_listLaporan',$data);
		$this->load->view('Amisc/footer',$data);
	}

    public function Sdashboard()
	{
		$this->load->model('M_basicModel');
		$data['petugas'] = $this->M_basicModel->Susername($this->session->userdata('username'))->row_array();

		$pengaduan = array(
			'status' => '0',

		);

		$this->db->where($pengaduan);
		$pengaduan = $this->db->get('pengaduan')->num_rows();

		$proses = array(
			'status' => 'proses',

		);

		$this->db->where($proses);
		$proses = $this->db->get('pengaduan')->num_rows();

		$selesai = array(
			'status' => 'selesai',

		);


		$this->db->where($selesai);
		$selesai = $this->db->get('pengaduan')->num_rows();

		$data['jumlah'] = array(
			'pengaduan' => $pengaduan,
			'proses' => $proses,
			'selesai' => $selesai,
		);

		$this->load->view('Amisc/header',$data);
		$this->load->view('Amisc/navbar',$data);
		$this->load->view('Amisc/sidebar',$data);
		$this->load->view('Staff/V_Dashboard',$data);
		$this->load->view('Amisc/footer',$data);
	}

	public function Slistlapor()
	{
		$this->load->model('M_basicModel');
		$data['petugas'] = $this->M_basicModel->Susername($this->session->userdata('username'))->result_array();
		$data['user'] = $this->M_basicModel->username($this->session->userdata('username'))->result_array();
		$data['laporan'] = $this->M_basicModel->listpengaduan()->result_array();

		$this->load->view('Smisc/header',$data);
		$this->load->view('Smisc/navbar',$data);
		$this->load->view('Smisc/sidebar',$data);
		$this->load->view('Staff-behalf/V_listLaporan',$data);
		$this->load->view('Smisc/footer',$data);
	}

	public function respon()
	{
		$this->load->model('M_basicModel');
		$data['user'] = $this->M_basicModel->username($this->session->userdata('username'))->result_array();
		$data['listlaporan'] = $this->M_basicModel->listpengaduan()->result_array();
		$data['masyarakat'] = $this->M_basicModel->masyarakat_nama()->result_array();
		$data['listlaporan'] = $this->M_basicModel->riwayat_laporan()->result_array();
		$data['listlaporan'] = $this->M_basicModel->status_pengaduan()->result_array();

		$this->load->view('Umisc/header',$data);
		$this->load->view('Umisc/navbar',$data);
		$this->load->view('Umisc/sidebar',$data);
		$this->load->view('V_listBalasan',$data);
		$this->load->view('Umisc/footer',$data);
	}

	public function Aproses($id)
	{
		$this->load->model('M_basicModel');
		$data['petugas'] = $this->M_basicModel->Susername($this->session->userdata('username'))->result_array();
		$data['aduan'] = $this->M_basicModel->listpengaduan2($id)->row_array();
		$data['tanggapan'] = $this->M_basicModel->tanggapan($id)->row_array();

		$this->load->view('Amisc/header',$data);
		$this->load->view('Amisc/navbar',$data);
		$this->load->view('Amisc/sidebar',$data);
		$this->load->view('Staff-behalf/V_Proses',$data);
		$this->load->view('Amisc/footer',$data);
	}

	public function reset()
	{
		$this->load->model('M_basicModel');
		$data['user'] = $this->M_basicModel->username($this->session->userdata('username'))->row_array();

		$this->load->view('Umisc/header',$data);
		$this->load->view('Umisc/navbar',$data);
		$this->load->view('Umisc/sidebar',$data);
		$this->load->view('V_Reset',$data);
		$this->load->view('Umisc/footer',$data);
	}
}
