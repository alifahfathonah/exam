<?php
class Mahasiswa_Model extends CI_Model
{
    public function getMhs($id)
    {
        $query = $this->db->query("SELECT m.*, p.* FROM tbl_mahasiswa m JOIN tbl_prodi p ON nim = $id AND m.id_prodi = p.id_prodi");
        return $query;
    }

    public function getAkun($id)
    {
        $query = $this->db->query("SELECT * FROM tbl_user WHERE username = $id");
        return $query;
    }

    public function updatePassword($data, $id)
    {
        $this->db->set($data);
        $this->db->where("id", $id);
        $this->db->update("tbl_user", $data);
    }

    public function getDetailMhs($nim)
    {
        $query = $this->db->query("SELECT k.*, m.*, dk.* FROM tbl_mahasiswa m JOIN tbl_krs k JOIN tbl_detail_krs dk ON m.nim = $nim AND k.nim = $nim AND k.id_krs = dk.id_krs");
        return $query;
    }

    public function getDaftarUjian($nim)
    {
        $query = $this->db->query("SELECT k.*, m.*, dk.*, s.*, u.*, mk.* FROM tbl_mahasiswa m JOIN tbl_krs k JOIN tbl_detail_krs dk JOIN tbl_soal s JOIN tbl_ujian u JOIN tbl_matkul mk ON m.nim = $nim AND k.nim = $nim AND k.id_krs = dk.id_krs AND dk.kd_matkul = s.kd_matkul AND s.id_soal = u.id_soal AND s.kd_matkul = mk.kd_matkul");
        return $query;
    }

    public function getUjian($id_ujian)
    {
        $query = $this->db->query("SELECT * FROM tbl_ujian WHERE id_ujian = $id_ujian");
        return $query;
    }

    public function cekToken($id_ujian, $token){
        $query = $this->db->query("SELECT * FROM tbl_ujian WHERE id_ujian = $id_ujian AND token_ujian = '$token'");
        return $query;
    }
}
