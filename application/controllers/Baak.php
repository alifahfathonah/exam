<?php
class Baak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Baak_Model');
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Home - BAAK';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('layout/header_baak', $data);
        $this->load->view('baak/home');
        $this->load->view('layout/footer_baak');
    }

    public function profile()
    {
        $data['title'] = 'Profile - BAAK';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('layout/header_baak', $data);
        $this->load->view('baak/profil');
        $this->load->view('layout/footer_baak');
    }

    // Dosen
    public function form_dosen()
    {
        $this->form_validation->set_rules('nid', 'NID', 'required|min_length[10]');
        $this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required');
        $this->form_validation->set_rules('jk', 'JK', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('telp_dosen', 'No. Telepon', 'required');
        $this->form_validation->set_rules('email_dosen', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat_dosen', 'Alamat Dosen', 'required');
        if ($this->form_validation->run() == false) {
            // form validation not active
            $data['title'] = 'Form Dosen - BAAK';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
            $this->load->view('layout/header_baak', $data);
            $this->load->view('baak/form_input_dosen');
            $this->load->view('layout/footer_baak');
        } else {
            // form validation active
            $data = array(
                'nid' => $this->input->post('nid'),
                'nama_dosen' => $this->input->post('nama_dosen'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'telp_dosen' => $this->input->post('telp_dosen'),
                'email_dosen' => $this->input->post('email_dosen'),
                'alamat_dosen' => $this->input->post('alamat_dosen'),
                'foto_dosen' => 'dosen.png',
                'status_dosen' => 'Aktif'
            );

            $dataUser = array(
                'nama_user' => $this->input->post('nama_dosen'),
                'username' => $this->input->post('nid'),
                'password' => password_hash($this->input->post('nid'), PASSWORD_DEFAULT),
                'image' => 'dosen.png',
                'role_id' => 2,
                'date_created' => time()
            );
            $this->db->insert('tbl_dosen', $data);
            $this->db->insert('tbl_user', $dataUser);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
                Input data has been successfully. <strong>Check your data!</strong> </div>');
            redirect('baak/data_dosen');
        }
    }

    public function data_dosen()
    {
        $query = $this->db->get('tbl_dosen');
        $data['records'] = $query->result();
        $data['title'] = 'Data Dosen - BAAK';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('layout/header_baak', $data);
        $this->load->view('baak/data_dosen', $data);
        $this->load->view('layout/footer_baak');
    }

    public function detail_dosen()
    {
        $data['title'] = 'Data Detail Dosen - BAAK';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $nid = $this->uri->segment('3');
        $data['dosen'] = $this->Baak_Model->getDetailDosen($nid)->row_array();
        $this->load->view('layout/header_baak', $data);
        $this->load->view('baak/data_detail_dosen', $data);
        $this->load->view('layout/footer_baak');
    }

    public function edit_dosen()
    {
        $this->form_validation->set_rules('nid', 'NID', 'required|min_length[10]');
        $this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required');
        $this->form_validation->set_rules('jk', 'JK', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('telp_dosen', 'No. Telepon', 'required');
        $this->form_validation->set_rules('email_dosen', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat_dosen', 'Alamat Dosen', 'required');
        $this->form_validation->set_rules('status_dosen', 'Status Dosen', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Edit Dosen - BAAK';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
            $nid = $this->uri->segment('3');
            $data['dosen'] = $this->Baak_Model->getDosen($nid)->row_array();
            $data['old_nid'] = $nid;

            $this->load->view('layout/header_baak', $data);
            $this->load->view('baak/form_edit_dosen', $data);
            $this->load->view('layout/footer_baak');
        } else {
            $data = array(
                'nid' => $this->input->post('nid'),
                'nama_dosen' => $this->input->post('nama_dosen'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'telp_dosen' => $this->input->post('telp_dosen'),
                'email_dosen' => $this->input->post('email_dosen'),
                'alamat_dosen' => $this->input->post('alamat_dosen'),
                'status_dosen' => $this->input->post('status_dosen')
            );
            $old_nid = $this->input->post('old_nid');
            $this->Baak_Model->updateDosen($data, $old_nid);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
                    Edit data has been successfully. <strong>Check your data!</strong> </div>');
            redirect('baak/data_dosen');
        }
    }
    // ---------------------------------------------- End Dosen ----------------------------------------------------

    // Mata Kuliah
    public function form_matkul()
    {
        $this->form_validation->set_rules('kd_matkul', 'Kode Matkul', 'required|min_length[4]');
        $this->form_validation->set_rules('nama_matkul', 'Nama Matkul', 'required');
        $this->form_validation->set_rules('jumlah_sks', 'Jumlah SKS', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Mata Kuliah - BAAK';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
            $this->load->view('layout/header_baak', $data);
            $this->load->view('baak/form_input_matkul');
            $this->load->view('layout/footer_baak');
        } else {
            $data = array(
                'kd_matkul' => $this->input->post('kd_matkul'),
                'nama_matkul' => $this->input->post('nama_matkul'),
                'jumlah_sks' => $this->input->post('jumlah_sks')
            );
            $this->db->insert('tbl_matkul', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
                Input data has been successfully. <strong>Check your data!</strong> </div>');
            redirect('baak/data_matkul');
        }
    }

    public function data_matkul()
    {
        $query = $this->db->get('tbl_matkul');
        $data['records'] = $query->result();
        $data['title'] = 'Data Mata Kuliah - BAAK';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('layout/header_baak', $data);
        $this->load->view('baak/data_matkul', $data);
        $this->load->view('layout/footer_baak');
    }

    public function edit_matkul()
    {
        $data['title'] = 'Form Edit Mata Kuliah - BAAK';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $kd = $this->uri->segment('3');
        $data['matkul'] = $this->Baak_Model->getMatkul($kd)->row_array();
        $data['old_kd'] = $kd;
        $this->load->view('layout/header_baak', $data);
        $this->load->view('baak/form_edit_matkul', $data);
        $this->load->view('layout/footer_baak');
    }
    public function proses_edit_matkul()
    {
        $data = array(
            'kd_matkul' => $this->input->post('kd_matkul'),
            'nama_matkul' => $this->input->post('nama_matkul'),
            'jumlah_sks' => $this->input->post('jumlah_sks')
        );
        $old_kd = $this->input->post('old_kd');
        $this->Baak_Model->updateMatkul($data, $old_kd);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
                Edit data has been successfully. <strong>Check your data!</strong> </div>');
        redirect('baak/data_matkul');
    }

    public function delete_matkul($kd)
    {
        if ($kd == "") {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Delete data failed. </div>');
            redirect('baak/data_matkul');
        } else {
            $this->db->where('kd_matkul', $kd);
            $this->db->delete('tbl_matkul');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Data has been deleted. </div>');
            redirect('baak/data_matkul');
        }
    }
    // ------------------------------------------ End Mata Kuliah ---------------------------------------------------

    // Mahasiswa
    public function form_mhs()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required|min_length[10]');
        $this->form_validation->set_rules('nama_mhs', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('jk', 'JK', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('telp_mhs', 'No. Telepon', 'required');
        $this->form_validation->set_rules('email_mhs', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat_mhs', 'Alamat Mahasiswa', 'required');
        $this->form_validation->set_rules('id_prodi', 'Nama Prodi', 'required');
        if ($this->form_validation->run() == false) {
            // form validation not active
            $data['title'] = 'Form Mahasiswa - BAAK';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $data['prodi'] = $this->Baak_Model->getProdi();
            $this->load->view('layout/header_baak', $data);
            $this->load->view('baak/form_input_mhs');
            $this->load->view('layout/footer_baak');
        } else {
            // form validation active
            $data = array(
                'nim' => $this->input->post('nim'),
                'nama_mhs' => $this->input->post('nama_mhs'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'telp_mhs' => $this->input->post('telp_mhs'),
                'email_mhs' => $this->input->post('email_mhs'),
                'alamat_mhs' => $this->input->post('alamat_mhs'),
                'id_prodi' => $this->input->post('id_prodi'),
                'th_masuk' => $this->input->post('th_masuk'),
                'foto_mhs' => 'mahasiswa.jpg',
                'status_mhs' => 'Aktif'
            );

            $dataUser = array(
                'nama_user' => $this->input->post('nama_mhs'),
                'username' => $this->input->post('nim'),
                'password' => $this->input->post('nim'),
                'image' => 'mahasiswa.jpg',
                'role_id' => 3,
                'date_created' => time()
            );
            $this->db->insert('tbl_mahasiswa', $data);
            $this->db->insert('tbl_user', $dataUser);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
                Input data has been successfully. <strong>Check your data!</strong> </div>');
            redirect('baak/data_mhs');
        }
    }

    public function data_mhs()
    {
        $query = $this->Baak_Model->getMahasiswa();
        $data['records'] = $query->result();
        $data['title'] = 'Data Mahasiswa - BAAK';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('layout/header_baak', $data);
        $this->load->view('baak/data_mahasiswa', $data);
        $this->load->view('layout/footer_baak');
    }

    public function detail_mhs()
    {
        $data['title'] = 'Data Mahasiswa - BAAK';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $nim = $this->uri->segment('3');
        $data['mhs'] = $this->Baak_Model->getDetailMahasiswa($nim)->row_array();

        $this->load->view('layout/header_baak', $data);
        $this->load->view('baak/data_detail_mahasiswa', $data);
        $this->load->view('layout/footer_baak');
    }

    public function edit_mhs()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required|min_length[10]');
        $this->form_validation->set_rules('nama_mhs', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('jk', 'JK', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('telp_mhs', 'No. Telepon', 'required');
        $this->form_validation->set_rules('email_mhs', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat_mhs', 'Alamat', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Mahasiswa - BAAK';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $nim = $this->uri->segment('3');
            $data['mhs'] = $this->Baak_Model->getEditMhs($nim)->row_array();
            $data['prodi'] = $this->Baak_Model->getProdi();
            $this->load->view('layout/header_baak', $data);
            $this->load->view('baak/form_edit_mhs', $data);
            $this->load->view('layout/footer_baak');
        } else {
            $data = array(
                'nim' => $this->input->post('nim'),
                'nama_mhs' => $this->input->post('nama_mhs'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'telp_mhs' => $this->input->post('telp_mhs'),
                'email_mhs' => $this->input->post('email_mhs'),
                'alamat_mhs' => $this->input->post('alamat_mhs'),
                'status_mhs' => $this->input->post('status_mhs'),
                'id_prodi' => $this->input->post('id_prodi')
            );
            $nim = $this->input->post('nim');
            $this->Baak_Model->updateMhs($data, $nim);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
                    Edit data has been successfully. <strong>Check your data!</strong> </div>');
            redirect('baak/data_mhs');
        }
    }
    // ------------------------------------------ End Mahasiswa ------------------------------------------------------

    // Jurusan
    public function data_jurusan()
    {
        $data['title'] = 'Data Jurusan - BAAK';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $query = $this->Baak_Model->getJurusan();
        $data['records'] = $query->result();
        $this->load->view('layout/header_baak', $data);
        $this->load->view('baak/data_jurusan', $data);
        $this->load->view('layout/footer_baak');
    }

    public function detail_jurusan()
    {
        $data['title'] = 'Data Detail Kelas - BAAK';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $id = $this->uri->segment('3');
        $data['records'] = $this->Baak_Model->getKlsMhs($id)->result();
        $data['jurusan'] = $this->Baak_Model->getDetailJurusan($id)->row_array();
        $this->load->view('layout/header_baak', $data);
        $this->load->view('baak/data_detail_jurusan', $data);
        $this->load->view('layout/footer_baak');
    }
    // --------------------------------------------- End Jurusan ----------------------------------------------------

    public function krs()
    {
        $query = $this->Baak_Model->getKRS();
        $data['records'] = $query->result();
        $data['title'] = 'Data KRS - BAAK';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('layout/header_baak', $data);
        $this->load->view('baak/data_krs', $data);
        $this->load->view('layout/footer_baak');
    }

    public function detail_krs()
    {
        $id = $this->uri->segment('3');
        $nim = $this->uri->segment('4');
        $data['mhs'] = $this->Baak_Model->getAkadMhs($id, $nim)->row_array();
        $data['matkul'] = $this->Baak_Model->getMatkulMhs($id)->row_array();

        $data['title'] = 'Detail KRS - BAAK';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('layout/header_baak', $data);
        $this->load->view('baak/data_detail_krs', $data);
        $this->load->view('layout/footer_baak');
    }
}
