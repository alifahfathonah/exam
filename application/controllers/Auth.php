<?php

class Auth extends CI_Controller
{
    // Login BAAK & Dosen
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Login';
            $this->load->view('form_login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tbl_user', ['username' => $username])->row_array();

        // jika usernya ada
        if ($user) {
            // cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                // Cek Role
                if ($user['role_id'] == 1) {
                    redirect('baak/index');
                } else if ($user['role_id'] == 2) {
                    redirect('dosen/index');
                } else {
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong password! </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Username is not registered! </div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'password dont match!',
            'min_lenght' => 'password too short'

        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Registration';
            $this->load->view('form_registration', $data);
        } else {
            $data = [
                'nama_user' => htmlspecialchars($this->input->post('nama_user', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'date_created' => time()
            ];
            $this->db->insert('tbl_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Congratulation! Your account has been created. Please Login! </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username', 'role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                You have been logged out! </div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('blocked');
    }
    // ------------------------------------------ Login BAAK & Dosen ---------------------------------------------

    // Login Mahasiswa
    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Login';
            $this->load->view('mahasiswa/form_login', $data);
        } else {
            $this->_proseslogin();
        }
    }

    private function _proseslogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tbl_user', ['username' => $username])->row_array();
        $pass = $this->db->get_where('tbl_user', ['password' => $password])->row_array();

        // jika usernya ada
        if ($user) {
            // cek password
            if ($user == $pass) {
                $data = [
                    'username' => $user['username'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                // Cek Role
                if ($user['role_id'] == 3) {
                    redirect('mahasiswa/index');
                } else {
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong password! </div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Username is not registered! </div>');
            redirect('auth/login');
        }
    }

    public function logout_mhs()
    {
        $this->session->unset_userdata('username', 'role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                You have been logged out! </div>');
        redirect('auth/login');
    }
}
