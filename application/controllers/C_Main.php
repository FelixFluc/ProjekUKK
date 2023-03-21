<!-- this section is responsible for the main system -->
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_Main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function add_category()
	{
		$data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('kategori', 'kategori', 'required|trim');
		if ($this->form_validation->run() == false) {
			redirect('C_View/Alist');
		} else {
			$kategori = $this->input->post('kategori');

			$add = array(
				'kategori' => $kategori,
			);
			$this->load->model('M_basicModel');
			$this->M_basicModel->add_category($add);
			redirect('C_View/Alist');
		}
	}

	public function edit_category($id)
	{
		$data['user'] = $this->M_basicModel->Susername($this->session->userdata('username'))->row_array();

		$kategori = $this->input->post('kategori');

		$updateData = array(
			'kategori' => $kategori,
		);

		$this->db->where('id', $id);
		$this->M_basicModel->edit_category($updateData);

		redirect('C_View/Alist');
	}

	public function delete_category($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kategori');
		redirect('C_View/Alist');
	}

	public function report()
	{
		$data['user'] = $this->db->get_where('masyarakat', ['id' => $this->session->userdata('id')])->row_array();
		$user = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

		$tanggal = $this->input->post('tanggal');
		$waktu = $this->input->post('waktu');
		$isi_laporan = $this->input->post('isi_laporan');
		$kategori = $this->input->post('kategori');
		$sub_kategori = $this->input->post('subkategori');
		$foto = $this->input->post('foto');

		$config['upload_path']          = './asset/img/uploads';
		$config['allowed_types']        = 'gif|jpg|png';

		$this->load->library('upload', $config);

		$this->upload->do_upload('gambar');
		$foto = $this->upload->data('file_name');

		$add = array(
			'tanggal' => date('y-m-d'),
			'waktu' => $waktu,
			'nik' => $user['nik'],
			'isi_laporan' => $isi_laporan,
			'kategori' => $kategori,
			'sub_kategori' => $sub_kategori,
			'foto' => $foto,
		);
		$this->load->model('M_basicModel');
		$this->M_basicModel->laporan($add);
		$this->M_basicModel->pengaduan()->result_array();
		redirect('C_View/respon');
	}

	// public function get_sub_kategori()
    // {
    //     $id_kategori = $this->input->post('id');
    //     $sub_kategori = $this->db->get_where('subkategori', ['id_kategori' => $id_kategori])->result();
    //     echo json_encode($sub_kategori);
    // }

	public function get_sub_kategori($id_kategori)
    {
        $sub_kategori = $this->db->get_where('subkategori', ['id_kategori' => $id_kategori])->result();
		$data = "<option value=''>Pilih salah satu</option>";
		foreach ($sub_kategori as $value) {
			$data .="<option value='".$value->id_subkategori."'>".$value->sub_kategori."</option>";
		}
		echo $data;
    }

	public function add_subcategory()
	{
		$data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('subkategori', 'subkategori', 'required|trim');
		if ($this->form_validation->run() == false) {
			redirect('C_View/Alist');
		} else {
			$subkategori = $this->input->post('subkategori');
			$id_kategori = $this->input->post('kategori');

			$add = array(
				'id_kategori' => $id_kategori,
				'sub_kategori' => $subkategori,
			);
			$this->load->model('M_basicModel');
			$this->M_basicModel->add_subcategory($add);
			redirect('C_View/Alist');
		}
	}

	public function edit_subcategory($id)
	{
		$data['user'] = $this->M_basicModel->Susername($this->session->userdata('username'))->row_array();

		$subkategori = $this->input->post('subkategori');

		$updateData = array(
			'sub_kategori' => $subkategori,
		);

		$this->db->where('id_subkategori', $id);
		$this->load->model('M_basicModel');
		$this->M_basicModel->edit_subcategory($updateData);

		redirect('C_View/Alist');
	}

	public function delete_subcategory($id)
	{
		$this->db->where('id_subkategori', $id);
		$this->db->delete('subkategori');
		redirect('C_View/Alist');
	}

	public function edit_admin($id)
	{
		$data['user'] = $this->M_basicModel->Susername($this->session->userdata('username'))->row_array();

		$nama = $this->input->post('nama_petugas');
		$role = $this->input->post('petugas');
		$username = $this->input->post('username');
		$level = $this->input->post('level');

		$updateData = array(
			'nama_petugas' => $nama,
			'level' => $role,
			'username' => $username,
			'level' => $level,
		);

		$this->db->where('id_petugas', $id);
		$this->M_basicModel->edit_admin($updateData);

		redirect('C_View/userlist');
	}

	public function delete_admin($id)
	{
		$this->db->where('id_petugas', $id);
		$this->db->delete('petugas');
		redirect('C_View/userlist');
	}

	public function ban_user($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('masyarakat');
		redirect('C_View/userlist');
	}

	public function user_suspend($id)
	{
		$suspend= [
			'user_status'=>'dormant',
		];

		$this->db->where('id', $id);
		$this->M_basicModel->suspend($suspend);
		$this->session->set_flashdata('message4', '<div class="alert alert-warning" role="alert">
		Account successfully suspended! 
		</div>');
		redirect('C_View/userlist');
	}

	public function user_unsuspend($id)
	{
		$unsuspend= [
			'user_status'=>'active',
		];

		$this->db->where('id', $id);
		$this->M_basicModel->unsuspend($unsuspend);
		$this->session->set_flashdata('message4', '<div class="alert alert-warning" role="alert">
		Account successfully activated! 
		</div>');
		redirect('C_View/userlist');
	}

	public function laporan_up($id)
	{
		$data = $this->M_basicModel->username($this->session->userdata('username'))->row_array();
		$data = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		$tanggapan = $this->input->post('tanggapan');
		$status = $this->input->post('status');
		

		$add = [
			'id_pengaduan' => $id,
			'tanggapan' => $tanggapan,
			'tgl_tanggapan' =>  date('Y-m-d'),
			'id_petugas' => $data['id_petugas'],
		];

		$update = [
			'status' => $status
		];
		
		$this->db->where('id_pengaduan', $id);
		$this->db->update('pengaduan', $update);

		$this->M_basicModel->add_tanggapan($add);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil mengirim tanggapan !
			  </div>');
		redirect('C_View/listlapor');
	}

	public function tambahpetugas()
    {
        $data['petugas'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $hasil = $this->db->get_where('petugas')->row_array();
        $insert = array(
            'nama_petugas' => $this->input->post('nama_petugas'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'telepon' => $this->input->post('telepon'),
            'level' => $this->input->post('level'),
        );
        $this->db->insert('petugas', $insert);
        $this->session->set_flashdata('massage', '<div class="alert alert-success mt-3" role="alert"> Berhasil di tambahkan! </div>');
        redirect('C_View/userlist',$data);
    }
	public function laporan_pdf()
	{
		$data['user'] = $this->M_basicModel->username($this->session->userdata('username'))->row_array();
		$data['masyarakat'] = $this->M_basicModel->masyarakat_nama()->result_array();
		$data['petugas'] = $this->M_basicModel->petugas_nama()->result_array();
		$pengaduan = $this->M_basicModel->pengaduan()->result_array();

		$data = array(
			"dataku" => array(
				"nama" => "Petani Kode",
				"url" => "http://petanikode.com"
			),
			'pengaduan'=>$pengaduan,
		);

		$this->load->library('Pdf');
		$data['title'] = 'Laporan Pengaduan';
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan-pengaduan.pdf";
		$this->pdf->load_view('Admin/V_PDF', $data);
	}

	public function laporan_done($id_pengaduan)
	{
		$update=[
			'status'=>'selesai'
		];
		$this->db->where('id_pengaduan',$id_pengaduan);
		$this->db->update('pengaduan',$update);
		$this->session->set_flashdata('message7', '<div class="alert alert-warning" role="alert">
		Laporan Telah Dinyatakan Selesai! ');
		redirect('C_View/listlapor/'.$id_pengaduan);
	}
}
