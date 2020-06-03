<?php
class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->model('Dosen_Model');
    }

    public function index()
    {
        $data['title'] = 'Home - Dosen';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('layout/header_dosen', $data);
        $this->load->view('dosen/home');
        $this->load->view('layout/footer_dosen');
    }

    public function profil()
    {
        $data['title'] = 'Profil Dosen - BAAK';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $nid = $this->session->userdata('username');
        $data['dosen'] = $this->Dosen_Model->getProfil($nid)->row_array();

        $this->load->view('layout/header_dosen', $data);
        $this->load->view('dosen/profil_dosen');
        $this->load->view('layout/footer_dosen');
    }

    // Soal
    public function soal()
    {
        $data['title'] = 'Kelola Soal';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $nid = $this->session->userdata('username');
        $data['dosen'] = $this->Dosen_Model->getDosen($nid)->row_array();
        $data['ajar'] = $this->Dosen_Model->getAjar($nid);
        $data['records'] = $this->Dosen_Model->getData($nid)->result();

        $this->load->view('layout/header_dosen', $data);
        $this->load->view('dosen/data_tambah_matkul', $data);
        $this->load->view('layout/footer_dosen');
    }

    public function add_matkul()
    {
        $data['title'] = 'Kelola Soal';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $nid = $this->session->userdata('username');
        $data['dosen'] = $this->Dosen_Model->getDosen($nid)->row_array();

        $data = array(
            'nid' => $nid,
            'kd_matkul' => $this->input->post('kd_matkul'),
            'tipe_ujian' => $this->input->post('tipe_ujian'),
            'tahun' => date('Y')
        );
        $this->db->insert('tbl_soal', $data);
        redirect('dosen/soal');
    }

    public function detail_soal()
    {
        $data['title'] = 'Detail Soal';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $id = $this->uri->segment('3');
        $data['records'] = $this->Dosen_Model->getDetailSoal($id)->result();
        $data['old_id'] = $id;

        $this->load->view('layout/header_dosen', $data);
        $this->load->view('dosen/detail_soal', $data);
        $this->load->view('layout/footer_dosen');
    }

    public function add_soal()
    {
        $this->form_validation->set_rules('soal', 'Soal', 'required');
        $this->form_validation->set_rules('jenis_soal', 'Jenis Soal', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Input Soal';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $id = $this->uri->segment('3');
            $data['data'] = $this->Dosen_Model->getDataSoal($id)->row_array();
            $data['soal'] = $this->Dosen_Model->getSoal($id);
            $data['old_id'] = $id;

            $this->load->view('layout/header_dosen', $data);
            $this->load->view('dosen/form_input_soal', $data);
            $this->load->view('layout/footer_dosen');
        } else {
            $data = array(
                'id_soal' => $this->input->post('old_id'),
                'soal' => $this->input->post('soal'),
                'jenis_soal' => $this->input->post('jenis_soal')
            );
            $old_id = $this->input->post('old_id');
            $this->db->insert('tbl_detail_soal', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
                Add soal has been successfully. <strong>Check your data!</strong> </div>');
            redirect('dosen/add_soal/' . $old_id);
        }
    }

    public function edit_soal()
    {
        $this->form_validation->set_rules('soal', 'Soal', 'required');
        $this->form_validation->set_rules('jenis_soal', 'Jenis Soal', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Edit Soal';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $id = $this->uri->segment('3');
            $id_d = $this->uri->segment('4');
            $data['data'] = $this->Dosen_Model->getDataDetailSoal($id, $id_d)->row_array();
            $data['old_id'] = $id;
            $data['old_id_d'] = $id_d;

            $this->load->view('layout/header_dosen', $data);
            $this->load->view('dosen/form_edit_detail_soal', $data);
            $this->load->view('layout/footer_dosen');
        } else {
            $data = array(
                'soal' => $this->input->post('soal'),
                'jenis_soal' => $this->input->post('jenis_soal')
            );
            $old_id_d = $this->input->post('old_id_d');
            $old_id = $this->input->post('old_id');
            $this->Dosen_Model->updateDetailSoal($data, $old_id_d);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
                Edit soal has been successfully. <strong>Check your data!</strong> </div>');
            redirect('dosen/detail_soal/' . $old_id);
        }
    }

    public function delete_soal($id, $id_d)
    {
        if ($id_d == "") {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Delete data failed. </div>');
            redirect('dosen/detail_soal/' . $id);
        } else {
            $this->db->where('id_detail_soal', $id_d);
            $this->db->delete('tbl_detail_soal');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Data has been deleted. </div>');
            redirect('dosen/detail_soal/' . $id);
        }
    }
    // --------------------------------------------- End Soal ----------------------------------------------------------

    // Jawaban
    public function data_matkul()
    {
        $data['title'] = 'Data Mata Kuliah';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $nid = $this->session->userdata('username');
        $data['records'] = $this->Dosen_Model->getDataMatkul($nid)->result();
        $this->load->view('layout/header_dosen', $data);
        $this->load->view('dosen/data_matkul', $data);
        $this->load->view('layout/footer_dosen');
    }

    public function detail_data_soal()
    {
        $data['title'] = ' Data Detail Soal';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $id = $this->uri->segment('3');
        $id_d = $this->uri->segment('4');
        $data['records'] = $this->Dosen_Model->getSoalPG($id)->result();
        $data['old_id'] = $id;
        $data['old_id_d'] = $id_d;

        $this->load->view('layout/header_dosen', $data);
        $this->load->view('dosen/data_detail_soal', $data);
        $this->load->view('layout/footer_dosen');
    }

    public function detail_jawaban()
    {
        $data['title'] = 'Detail Jawaban';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $id = $this->uri->segment('3');
        $id_d = $this->uri->segment('4');
        $data['records'] = $this->Dosen_Model->getDetailJawaban($id_d)->result();
        $data['old_id'] = $id;
        $data['old_id_d'] = $id_d;

        $this->load->view('layout/header_dosen', $data);
        $this->load->view('dosen/detail_jawaban', $data);
        $this->load->view('layout/footer_dosen');
    }

    public function add_jawaban()
    {
        $this->form_validation->set_rules('jawaban', 'Jawaban', 'required');
        $this->form_validation->set_rules('nilai_jawaban', 'Nilai Jawaban', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Input Jawaban';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $id = $this->uri->segment('3');
            $id_d = $this->uri->segment('4');
            $data['data'] = $this->Dosen_Model->getDataDetailSoal($id, $id_d)->row_array();
            $data['jawaban'] = $this->Dosen_Model->getDetailJawaban($id_d);

            $data['old_id'] = $id;
            $data['old_id_d'] = $id_d;

            $this->load->view('layout/header_dosen', $data);
            $this->load->view('dosen/form_input_jawaban', $data);
            $this->load->view('layout/footer_dosen');
        } else {
            $data = array(
                'id_detail_soal' => $this->input->post('old_id_d'),
                'jawaban' => $this->input->post('jawaban'),
                'nilai_jawaban' => $this->input->post('nilai_jawaban')
            );
            $old_id = $this->input->post('old_id');
            $old_id_d = $this->input->post('old_id_d');
            $this->db->insert('tbl_jawaban', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
                Add jawaban has been successfully. <strong>Check your data!</strong> </div>');
            redirect('dosen/add_jawaban/' . $old_id . '/' . $old_id_d);
        }
    }

    public function edit_jawaban()
    {
        $this->form_validation->set_rules('jawaban', 'Jawaban', 'required');
        $this->form_validation->set_rules('nilai_jawaban', 'Nilai Jawaban', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Edit Jawaban';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $id = $this->uri->segment('3');
            $id_d = $this->uri->segment('4');
            $id_j = $this->uri->segment('5');
            $data['data'] = $this->Dosen_Model->getDataDetailSoal($id, $id_d)->row_array();
            $data['jawaban'] = $this->Dosen_Model->getDataDetailJawaban($id_d, $id_j)->row_array();

            $data['old_id'] = $id;
            $data['old_id_d'] = $id_d;
            $data['old_id_j'] = $id_j;

            $this->load->view('layout/header_dosen', $data);
            $this->load->view('dosen/form_edit_jawaban', $data);
            $this->load->view('layout/footer_dosen');
        } else {
            $data = array(
                'id_detail_soal' => $this->input->post('old_id_d'),
                'jawaban' => $this->input->post('jawaban'),
                'nilai_jawaban' => $this->input->post('nilai_jawaban')
            );
            $old_id = $this->input->post('old_id');
            $old_id_d = $this->input->post('old_id_d');
            $old_id_j = $this->input->post('old_id_j');
            $this->Dosen_Model->updateJawaban($data, $old_id_j);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
                Edit jawaban has been successfully. <strong>Check your data!</strong> </div>');
            redirect('dosen/detail_jawaban/' . $old_id . '/' . $old_id_d);
        }
    }

    public function delete_jawaban($id, $id_d, $id_jawaban)
    {
        if ($id_jawaban == "") {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Delete data failed. </div>');
            redirect('dosen/detail_jawaban/' . $id . '/' . $id_d);
        } else {
            $this->db->where('id_jawaban', $id_jawaban);
            $this->db->delete('tbl_jawaban');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Data has been deleted. </div>');
            redirect('dosen/detail_jawaban/' . $id . '/' . $id_d);
        }
    }
    // -------------------------------------------- End Jawaban --------------------------------------------------

    // Daftar Soal & Jawaban 
    public function daftar_soal_jawaban()
    {
        $data['title'] = 'Daftar Soal & Jawaban';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $nid = $this->session->userdata('username');
        $data['data_soal'] = $this->Dosen_Model->getData($nid)->result();
        $data['dosen'] = $this->Dosen_Model->getDosen($nid)->row_array();

        $this->load->view('layout/header_dosen', $data);
        $this->load->view('dosen/daftar_soal_jawaban', $data);
        $this->load->view('layout/footer_dosen');
    }

    public function proses_tampil_daftar()
    {
        $id = $this->input->post('id_soal');
        redirect('dosen/tampil_daftar_soal/' . $id);
    }

    public function tampil_daftar_soal()
    {
        $data['title'] = 'Daftar Soal & Jawaban';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $nid = $this->session->userdata('username');
        $id = $this->uri->segment('3');

        $data['dosen'] = $this->Dosen_Model->getDosen($nid)->row_array();
        $data['data_soal'] = $this->Dosen_Model->getData($nid)->result();
        $data['get_soal'] = $this->Dosen_Model->getSoalSoal($id)->row_array();

        $data['soal'] = $this->Dosen_Model->getDaftarSoal($id)->result();

        foreach ($data['soal'] as $key => $row) {
            $row->jawaban = $this->Dosen_Model->getDataJawaban($row->id_detail_soal)->result();
            $data['soal'][$key] = [
                'id_soal' => $row->id_soal,
                'id_detail_soal' => $row->id_detail_soal,
                'soal' => $row->soal,
                'jenis_soal' => $row->jenis_soal,
                'jawaban' => $row->jawaban
            ];
        }

        $this->load->view('layout/header_dosen', $data);
        $this->load->view('dosen/daftar_detail_soal', $data);
        $this->load->view('layout/footer_dosen');
    }
    // ----------------------------------------- End Daftar Soal & Jawaban --------------------------------------------

    // Ujian
    public function kelola_ujian()
    {
        $this->form_validation->set_rules('id_soal', 'Soal Ujian', 'required');
        $this->form_validation->set_rules('tgl_ujian', 'Tanggal Ujian', 'required');
        $this->form_validation->set_rules('waktu_mulai_ujian', 'Waktu Mulai', 'required');
        $this->form_validation->set_rules('waktu_selesai_ujian', 'Waktu Selesai', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Kelola Ujian';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $nid = $this->session->userdata('username');
            $data['soal_ujian'] = $this->Dosen_Model->getSoalUjian($nid);

            $this->load->view('layout/header_dosen', $data);
            $this->load->view('dosen/form_kelola_ujian', $data);
            $this->load->view('layout/footer_dosen');
        } else {
            $token = ['A', '2', 'B', '4', 'C', '6', 'D', '8', 'E'];
            $i = count($token);

            while (--$i) {
                $j = mt_rand(0, $i);

                if ($i != $j) {
                    // swap elements
                    $tmp = $token[$j];
                    $token[$j] = $token[$i];
                    $token[$i] = $tmp;
                }
            }
            $token_ujian = implode("", $token);

            $data = array(
                'id_soal' => $this->input->post('id_soal'),
                'tgl_ujian' => $this->input->post('tgl_ujian'),
                'waktu_mulai_ujian' => $this->input->post('waktu_mulai_ujian'),
                'waktu_selesai_ujian' => $this->input->post('waktu_selesai_ujian'),
                'token_ujian' => $token_ujian
            );

            $this->db->insert('tbl_ujian', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
                Add ujian has been successfully. <strong>Check your data!</strong> </div>');
            redirect('dosen/daftar_ujian');
        }
    }

    public function acakToken($token)
    {
        $token = ['A', '2', 'B', '4', 'C', '6', 'D', '8', 'E'];
        $i = count($token);

        while (--$i) {
            $j = mt_rand(0, $i);

            if ($i != $j) {
                // swap elements
                $tmp = $token[$j];
                $token[$j] = $token[$i];
                $token[$i] = $tmp;
            }
        }
        return $token;
    }

    public function daftar_ujian()
    {
        $data['title'] = 'Daftar Ujian';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $nid = $this->session->userdata('username');
        $data['records'] = $this->Dosen_Model->getDataUjian($nid)->result();

        $this->load->view('layout/header_dosen', $data);
        $this->load->view('dosen/daftar_ujian', $data);
        $this->load->view('layout/footer_dosen');
    }

    public function edit_ujian()
    {
        $data['title'] = 'Form Edit Ujian';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $id_ujian = $this->uri->segment('3');
        $id_soal = $this->uri->segment('4');
        $data['ujian'] = $this->Dosen_Model->getUjian($id_ujian, $id_soal)->row_array();
        $data['old_id'] = $id_ujian;

        $this->load->view('layout/header_dosen', $data);
        $this->load->view('dosen/form_edit_ujian', $data);
        $this->load->view('layout/footer_dosen');
    }

    public function proses_edit_ujian()
    {
        $data = array(
            'tgl_ujian' => $this->input->post('tgl_ujian'),
            'waktu_mulai_ujian' => $this->input->post('waktu_mulai_ujian'),
            'waktu_selesai_ujian' => $this->input->post('waktu_selesai_ujian')
        );
        $old_id = $this->input->post('old_id');
        $this->Dosen_Model->updateUjian($data, $old_id);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
                Edit ujian has been successfully. <strong>Check your data!</strong> </div>');
        redirect('dosen/daftar_ujian');
    }

    public function delete_ujian($id_ujian)
    {
        if ($id_ujian == "") {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Delete data failed. </div>');
            redirect('dosen/daftar_ujian');
        } else {
            $this->db->where('id_ujian', $id_ujian);
            $this->db->delete('tbl_ujian');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Data has been deleted. </div>');
            redirect('dosen/daftar_ujian');
        }
    }

    // --------------------------------------------- End Ujian ----------------------------------------------------------

    // Hasil Ujian
    public function hasil_ujian()
    {
        $data['title'] = 'Hasil Ujian';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $nid = $this->session->userdata('username');
        $data['ujian'] = $this->Dosen_Model->getHasil($nid)->result();
        $this->load->view('layout/header_dosen', $data);
        $this->load->view('dosen/hasil_ujian', $data);
        $this->load->view('layout/footer_dosen');
    }

    public function proses_get_hasil()
    {
        $id = $this->input->post('id_ujian');
        redirect('dosen/get_hasil_ujian/' . $id);
    }

    public function get_hasil_ujian()
    {
        $data['title'] = 'Hasil Ujian';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $id = $this->uri->segment('3');
        $nid = $this->session->userdata('username');

        $data['ujian'] = $this->Dosen_Model->getHasil($nid)->result();
        $data['get_ujian'] = $this->Dosen_Model->getDetailUjian($id)->row_array();
        $data['records'] = $this->Dosen_Model->getHasilUjian($id)->result();

        $this->load->view('layout/header_dosen', $data);
        $this->load->view('dosen/data_hasil_ujian', $data);
        $this->load->view('layout/footer_dosen');
    }

    public function detail_hasil()
    {
        $data['title'] = 'Detail Hasil Ujian';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $id = $this->uri->segment('3');
        $nim = $this->uri->segment('4');
        $data['get_mhs'] = $this->Dosen_Model->getMhs($nim)->row_array();
        $data['records'] = $this->Dosen_Model->getDetailHasil($id)->result();
        $this->load->view('layout/header_dosen', $data);
        $this->load->view('dosen/detail_hasil_ujian', $data);
        $this->load->view('layout/footer_dosen');
    }
}
