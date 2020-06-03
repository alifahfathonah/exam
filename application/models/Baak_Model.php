<?php
class Baak_Model extends CI_Model
{
    // Dosen
    public function getDosen($nid)
    {
        $query = $this->db->query("SELECT * FROM tbl_dosen WHERE nid = $nid");
        return $query;
    }

    public function getDetailDosen($nid)
    {
        $query = $this->db->query("SELECT * FROM tbl_dosen WHERE nid = $nid");
        return $query;
    }

    public function updateDosen($data, $nid)
    {
        $this->db->set($data);
        $this->db->where("nid", $nid);
        $this->db->update("tbl_dosen", $data);
    }

    // Matkul
    public function getMatkul($kd)
    {
        $query = $this->db->query("SELECT * FROM tbl_matkul WHERE kd_matkul = $kd");
        return $query;
    }

    public function updateMatkul($data, $kd)
    {
        $this->db->set($data);
        $this->db->where("kd_matkul", $kd);
        $this->db->update("tbl_matkul", $data);
    }

    // Mahasiswa
    public function getMahasiswa()
    {
        $query = $this->db->query("SELECT m.*, p.* FROM tbl_mahasiswa m JOIN tbl_prodi p ON m.id_prodi = p.id_prodi");
        return $query;
    }

    public function getProdi()
    {
        $query = $this->db->get("tbl_prodi");
        return $query;
    }

    public function getDetailMahasiswa($nim)
    {
        $query = $this->db->query("SELECT m.*, p.* FROM tbl_mahasiswa m JOIN tbl_prodi p ON m.id_prodi = p.id_prodi AND m.nim = $nim");
        return $query;
    }

    public function getEditMhs($nim)
    {
        $query = $this->db->query("SELECT m.*, p.* FROM tbl_mahasiswa m JOIN tbl_prodi p ON m.nim = $nim AND m.id_prodi = p.id_prodi");
        return $query;
    }

    public function updateMhs($data, $nim)
    {
        $this->db->set($data);
        $this->db->where("nim", $nim);
        $this->db->update("tbl_mahasiswa", $data);
    }

    public function getKRS()
    {
        $query = $this->db->query("SELECT m.*, k.*, p.* FROM tbl_mahasiswa m JOIN tbl_krs k JOIN tbl_prodi p ON m.nim = k.nim AND p.id_prodi = k.id_prodi");
        return $query;
    }

    public function getAkadMhs($id, $nim)
    {
        $query = $this->db->query("SELECT m.*, k.*, p.* FROM tbl_mahasiswa m, tbl_krs k, tbl_prodi p WHERE k.nim = $nim AND m.nim = $nim AND k.id_krs = $id");
        return $query;
    }

    public function getMatkulMhs($id)
    {
        $query = $this->db->query("SELECT k.*, dk.* FROM tbl_krs k JOIN tbl_detail_krs dk ON dk.id_krs = $id");
        return $query;
    }

    // Jurusan
    public function getJurusan()
    {
        $query = $this->db->query("SELECT p.*, ks.*, j.* FROM tbl_prodi p JOIN tbl_kelas ks JOIN tbl_jurusan j WHERE p.id_prodi = j.id_prodi AND ks.id_kelas = j.id_kelas");
        return $query;
    }

    public function getKlsMhs($id)
    {
        $query = $this->db->query("SELECT k.* , m.*, j.* FROM tbl_krs k JOIN tbl_mahasiswa m JOIN tbl_jurusan j ON k.id_jurusan = $id AND k.nim = m.nim AND j.id_jurusan = k.id_jurusan");
        return $query;
    }

    public function getDetailJurusan($id)
    {
        $query = $this->db->query("SELECT p.*, j.*, ks.* FROM tbl_jurusan j JOIN tbl_prodi p JOIN tbl_kelas ks WHERE j.id_jurusan = $id AND j.id_prodi = p.id_prodi AND ks.id_kelas = j.id_kelas");
        return $query;
    }

    // public function getJurusan($id)
    // {
    //     $query = $this->db->query("SELECT kr.* , ks.* , p.* FROM tbl_krs kr JOIN tbl_jurusan ks JOIN tbl_prodi p ON kr.id_jurusan = $id AND ks.id_jurusan = $id");
    //     return $query;
    // }
}
