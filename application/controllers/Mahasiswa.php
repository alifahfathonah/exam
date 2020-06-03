<?php
class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mahasiswa_Model");
        $this->load->model("Dosen_Model");
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = "Home - Mahasiswa";
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view("layout/header_mahasiswa", $data);
        $this->load->view("mahasiswa/home");
        $this->load->view("layout/footer_mahasiswa");
    }

    public function profil()
    {
        $data['title'] = "Profil - Mahasiswa";
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $id = $this->session->userdata('username');
        $data['akun'] = $this->Mahasiswa_Model->getAkun($id)->row_array();
        $data['mhs'] = $this->Mahasiswa_Model->getMhs($id)->row_array();

        $this->load->view("layout/header_mahasiswa", $data);
        $this->load->view("mahasiswa/profil", $data);
        $this->load->view("layout/footer_mahasiswa");
    }

    public function updateAkun()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'password' => $this->input->post('password')
        );
        $id = $this->input->post('id');
        $this->Mahasiswa_Model->updatePassword($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
                    Edit password has been successfully. <strong>Check your data!</strong> </div>');
        redirect('mahasiswa/profil');
    }

    public function daftar_ujian()
    {
        $data['title'] = "Daftar Ujian - Mahasiswa";
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $nim = $this->session->userdata('username');
        $data['detail_mhs'] = $this->Mahasiswa_Model->getDetailMhs($nim)->row_array();
        $data['daftar_ujian'] = $this->Mahasiswa_Model->getDaftarUjian($nim)->result();

        $this->load->view("layout/header_mahasiswa", $data);
        $this->load->view("mahasiswa/daftar_ujian", $data);
        $this->load->view("layout/footer_mahasiswa");
    }

    public function form_token()
    {
        $this->form_validation->set_rules('token_ujian', 'Token Ujian', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Form Token Ujian - Mahasiswa";
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
            $id_ujian = $this->uri->segment('3');
            $id_soal = $this->uri->segment('4');
            $data['ujian'] = $this->Mahasiswa_Model->getUjian($id_ujian)->row_array();
            $this->load->view("layout/header_mahasiswa", $data);
            $this->load->view("mahasiswa/form_token", $data);
            $this->load->view("layout/footer_mahasiswa");
        } else {
            $id_ujian = $this->input->post('id_ujian');
            $id_soal = $this->input->post('id_soal');
            $token = $this->input->post('token_ujian');

            $token_ujian = $this->Mahasiswa_Model->cekToken($id_ujian, $token)->result();

            if ($token_ujian) {
                redirect('mahasiswa/halaman_ujian/' . $id_ujian . '/' . $id_soal);
            } else {
                echo "Form Token Salah!";
            }
        }
    }

    public function halaman_ujian()
    {
        $data['title'] = "Daftar Ujian - Mahasiswa";
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();


        $id_ujian = $this->uri->segment('3');
        $id_soal = $this->uri->segment('4');

        $data['soal'] = $this->Dosen_Model->getDaftarSoal($id_soal)->result();

        foreach ($data['soal'] as $key => $row) {
            $row->jawaban = $this->Dosen_Model->getDataJawaban($row->id_detail_soal)->result();
            $data['soal'][$key] = [
                'id_soal' => $row->id_soal,
                'id_detail_soal' => $row->id_detail_soal,
                'soal' => $row->soal,
                'jenis_soal' => $row->jenis_soal,
                'nilai_soal' => $row->nilai_soal,
                'jawaban' => $row->jawaban
            ];
        }

        $this->load->view("layout/header_mahasiswa", $data);
        $this->load->view("mahasiswa/halaman_ujian", $data);
        $this->load->view("layout/footer_mahasiswa");
    }

    public function ujian_api()
    {

        $currentTime = new DateTime();
        $id_soal = 5;
        $data['soal'] = $this->Dosen_Model->getDaftarSoal2($id_soal)->result();
        $data['ujian'] = $this->db->query("SELECT ds.*, u.* FROM tbl_detail_soal ds JOIN tbl_ujian u WHERE ds.id_soal = $id_soal AND u.id_soal = $id_soal")->row_array();

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

        // echo $this->getMillis($currentTime->format('H:i:s'));
        // echo "\n";
        // echo $this->getMillis($data['ujian']['waktu_selesai_ujian']);


        echo json_encode(
            [
            "waktu_sekarang" => $currentTime->format('H:i:s'), 
            "waktu_mulai" => $data['ujian']['waktu_mulai_ujian'], 
            "waktu_selesai" => $data['ujian']['waktu_selesai_ujian'], 
            "data" => $data['soal']
            ]);
    }

    public function insertdata()
    {

        $dataJson = json_decode($this->input->raw_input_stream);
        $dataUjian = [
            'nim' => $dataJson->nim,
            'id_ujian' => $dataJson->id_ujian,
        ];

        // $ujian = $this->db->query("SELECT * FROM tbl_ujian WHERE id_ujian = $dataUjian[id_ujian]")->row_array();
        // echo $ujian['id_ujian'];

        $this->db->insert('tbl_hasil_ujian', $dataUjian);
        $id = $this->db->insert_id();

        if ($dataJson->data_jawaban == null) {
            return;
        }

        $jawaban = [];

        foreach ($dataJson->data_jawaban as $row) {
            $row->id_hasil_ujian = $id;
            $jawaban[] = $row;
        }

        $this->db->insert_batch('tbl_detail_hasil_ujian', $jawaban);
    }
}
