<!-- for authentication -->
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('V_Login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $masyarakat = $this->db->get_where('masyarakat', ['username' => $username])->row_array();


        if ($masyarakat) {

            if (password_verify($password, $masyarakat['password'])) {

                $data = array(
                    'username' => $masyarakat['username'],
                    'password' => $masyarakat['password'],
                );

                $this->session->set_userdata($data);
                if ($this->form_validation->run() == true) {
                    if ($masyarakat['user_status'] == 'dormant') {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" roel="alert"> Akun anda telah di suspended! </div>');
                        redirect('C_View/login');
                    } else {
                        redirect('C_View/dashboard');
                    }   
                } else {
                    redirect('C_View/login');
                }

            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" roel="alert"> Wrong password! </div>');
                redirect('C_Auth/login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" roel="alert"> Username is yet to be registered! </div>');
            redirect('C_Auth/login');
        }
    }

    public function SAlogin()
    {
        $check_setup = $this->db->get('petugas')->row_array();
        if ($check_setup == null) {
            redirect('C_Auth/Asetup');
        }

        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('Staff-behalf/V_SALogin');
        } else {
            $this->_SAindex();
        }
    }

    private function _SAindex()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $petugas = $this->db->get_where('petugas', ['username' => $username])->row_array();


        if ($petugas) {

            if (password_verify($password, $petugas['password'])) {
                $data = array(
                    'username' => $petugas['username'],
                    'password' => $petugas['password'],
                    // 'level' => $petugas['level'],
                );

                $this->session->set_userdata($data);
                if ($this->form_validation->run() == true) {
                    redirect('C_View/Adashboard');
                } else {
                    redirect('C_Auth/SAlogin');
                }
            } else {
                $this->session->set_flashdata('message2', '<div class="alert alert-danger" roel="alert"> Wrong password! </div>');
                redirect('C_Auth/SAlogin');
            }
        } else {
            $this->session->set_flashdata('message2', '<div class="alert alert-danger" roel="alert"> Username is yet registered! </div>');
            redirect('C_Auth/SAlogin');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('nik', 'nik', 'required|trim');
        $this->form_validation->set_rules('telepon', 'telepon', 'required|trim');
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sesuai!',
            'min_length' => 'password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1] ,', ['matches' => 'Password tidak sesuai!']);

        if ($this->form_validation->run() == false) {

            $this->load->view('V_Register');
        } else {

            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'telepon' => htmlspecialchars($this->input->post('telepon', true)),
            ];

            $this->db->insert('masyarakat', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Congratulation your account has been created !
		  	</div>');
            redirect('C_View/login');
        }
    }

    public function SAregister()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('nama_petugas', 'nama_petugas', 'required');
        $this->form_validation->set_rules('telepon', 'telepon', 'required');
        $this->form_validation->set_rules('password1', 'password', 'required|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sesuai!',
            'min_length' => 'password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|matches[password1] ,', ['matches' => 'Password tidak sesuai!']);
        $this->form_validation->set_rules('level', 'level', 'required|matches[password1] ,', ['matches' => 'Password tidak sesuai!']);

        

            $data = array(
                'username' => htmlspecialchars($this->input->post('username',true)),
                'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'telepon' => htmlspecialchars($this->input->post('telepon', TRUE)),
                'level' => htmlspecialchars($this->input->post('level', TRUE)),
            );

            $this->db->insert('petugas', $data);
            $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">
			Congratulation your account has been created !
		  	</div>');
            // redirect('C_View/SAlogin');
        
    }

    public function Asetup()
    {
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('nama_petugas', 'nama_petugas', 'required|trim');
        $this->form_validation->set_rules('telepon', 'telepon', 'required|trim');
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sesuai!',
            'min_length' => 'password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1] ,', ['matches' => 'Password tidak sesuai!']);

        if ($this->form_validation->run() == false) {

            $this->load->view('Staff-behalf/V_Setup');
        } else {

            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'telepon' => htmlspecialchars($this->input->post('telepon', true)),
                'level' => 'admin',
            ];

            $this->db->insert('petugas', $data);
            $this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">
			Congratulation your account has been created !
		  	</div>');
            redirect('C_View/SAlogin');
        }
    }

    public function logout()
	{
        $this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			You have been logout !
		  	</div>');
		redirect('C_Auth/login');
	}

    public function Alogout()
	{
        $this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">
			You have been logout !
		  	</div>');
		redirect('C_Auth/SAlogin');
	}

    public function suspend($id)
	{
		$this->load->model('M_basicModel');
        $respon = $this->M_basicModel->suspend($id);

        if ($respon)
        {
            $this->session->set_flashdata('submit_success','The user was successfully suspended.');
        }
        else
        {
            $this->session->set_flashdata('submit_error','An error occured while suspending the user.');
        }
        redirect('C_View/userlist');
	}

    public function resetPassword()
	{
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'password dont match !',
			'min_length' => 'password too short !'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			// gagal reset password
			$data['user'] = $this->M_basicModel->username($this->session->userdata('username'))->row_array();

			$data['riwayat'] = $this->M_basicModel->riwayat_pengaduan()->result_array();

			$this->load->view('Umisc/header',$data);
            $this->load->view('Umisc/navbar',$data);
            $this->load->view('Umisc/sidebar',$data);
            $this->load->view('V_Reset',$data);
            $this->load->view('Umisc/footer',$data);
		} else {
			$user = $this->M_basicModel->username($this->session->userdata('username'))->row_array();

			$data = [
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			];

			$this->db->where('id', $user['id']);
			$this->db->update('masyarakat', $data);
			$this->session->set_flashdata('message5', '<div class="alert alert-success" role="alert">
				Password anda berhasil di reset !
				  </div>');
			redirect('C_View/reset');
		}
	}
}
