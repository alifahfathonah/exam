<?php

/**
 * 
 */
class Dosen_Model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	// Soal
	public function getDosen($nid)
	{
		$query = $this->db->query("SELECT * FROM tbl_dosen WHERE nid = $nid");
		return $query;
	}

	public function getProfil($nid)
	{
		$query = $this->db->query("SELECT d.*, u.* FROM tbl_dosen d JOIN tbl_user u ON d.nid = $nid AND u.username = $nid");
		return $query;
	}

	public function getAjar($nid)
	{
		$query = $this->db->query("SELECT a.*, mk.* FROM tbl_ajar a JOIN tbl_matkul mk ON a.nid = $nid AND a.kd_matkul = mk.kd_matkul");
		return $query;
	}

	public function getData($nid)
	{
		$query = $this->db->query("SELECT s.*, mk.*, d.* FROM tbl_soal s JOIN tbl_matkul mk JOIN tbl_dosen d ON s.kd_matkul = mk.kd_matkul AND s.nid = $nid AND d.nid = $nid");
		return $query;
	}

	public function getSoalMatkul($matkul)
	{
		$query = $this->db->query("SELECT * FROM tbl_matkul WHERE kd_matkul = $matkul");
		return $query;
	}

	public function getTipeUjian($tipe_ujian)
	{
		$query = $this->db->query("SELECT * FROM tbl_soal WHERE tipe_ujian = '$tipe_ujian'");
		return $query;
	}

	public function getDetailSoal($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_detail_soal WHERE id_soal = $id");
		return $query;
	}

	public function getDataSoal($id)
	{
		$query = $this->db->query("SELECT s.*, mk.* FROM tbl_soal s JOIN tbl_matkul mk ON s.id_soal = $id AND s.kd_matkul = mk.kd_matkul");
		return $query;
	}

	public function getSoal($id)
	{
		$query = $this->db->query("SELECT s.*, ds.* FROM tbl_soal s JOIN tbl_detail_soal ds ON s.id_soal = $id AND  ds.id_soal = $id");
		return $query;
	}

	public function getDataDetailSoal($id, $id_d)
	{
		$query = $this->db->query("SELECT ds.*, s.*, mk.* FROM tbl_detail_soal ds JOIN tbl_soal s JOIN tbl_matkul mk ON s.id_soal = $id AND ds.id_detail_soal = $id_d AND s.kd_matkul = mk.kd_matkul");
		return $query;
	}

	public function updateDetailSoal($data, $old_id_d)
	{
		$this->db->set($data);
		$this->db->where("id_detail_soal", $old_id_d);
		$this->db->update("tbl_detail_soal", $data);
	}

	// ------------------------------------------------ End Soal ------------------------------------------------------- 

	// Jawaban
	public function getDataMatkul($nid)
	{
		$query = $this->db->query("SELECT s.*, mk.*, d.* FROM tbl_soal s JOIN tbl_matkul mk JOIN tbl_dosen d ON s.kd_matkul = mk.kd_matkul AND s.nid = $nid AND d.nid = $nid");
		return $query;
	}

	public function getAllData()
	{
		$query = $this->db->query("SELECT mk.*, s.*, ds.* FROM tbl_matkul mk JOIN tbl_soal s JOIN tbl_detail_soal ds ON mk.kd_matkul = s.kd_matkul");
		return $query;
	}

	public function getSoalPG($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_detail_soal WHERE id_soal = $id AND jenis_soal = 'Pilihan Ganda'");
		return $query;
	}


	public function getDetailJawaban($id_d)
	{
		$query = $this->db->query("SELECT j.*, ds.* FROM tbl_jawaban j JOIN tbl_detail_soal ds ON ds.id_detail_soal = $id_d AND j.id_detail_soal = $id_d");
		return $query;
	}

	public function getDataDetailJawaban($id_d, $id_j)
	{
		$query = $this->db->query("SELECT j.*, ds.* FROM tbl_jawaban j JOIN tbl_detail_soal ds ON ds.id_detail_soal = $id_d AND j.id_jawaban = $id_j");
		return $query;
	}

	public function getJawaban($id_d)
	{
		$query = $this->db->query("SELECT j.*, ds.* FROM tbl_jawaban j JOIN tbl_detail_soal ds ON ds.id_soal = $id_d");
		return $query;
	}

	public function updateJawaban($data, $old_id_j)
	{
		$this->db->set($data);
		$this->db->where("id_jawaban", $old_id_j);
		$this->db->update("tbl_jawaban", $data);
	}
	// ------------------------------------------------ End Jawaban ---------------------------------------------------

	// Daftar Soal & Jawaban - Algoritma
	public function getDaftarSoal($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_detail_soal WHERE id_soal = $id");
		return $query;
	}

	public function getDaftarSoal2($id_soal)
	{
		$query = $this->db->query("SELECT ds.*, u.* FROM tbl_detail_soal ds JOIN tbl_ujian u WHERE ds.id_soal = $id_soal AND u.id_soal = $id_soal");
		return $query;
	}

	public function getSoalSoal($id)
	{
		$query = $this->db->query("SELECT s.*, mk.* FROM tbl_soal s JOIN tbl_matkul mk ON s.id_soal = $id AND s.kd_matkul = mk.kd_matkul");
		return $query;
	}

	public function getDataJawaban($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_jawaban where id_detail_soal = $id");
		// $query = $this->db->query("SELECT s.*, ds.*, j.* FROM tbl_soal s JOIN tbl_detail_soal ds JOIN tbl_jawaban j ON j.id_detail_soal= $id");
		return $query;
	}
	// ------------------------------------------ End Daftar Soal & Jawaban -------------------------------------------

	// Ujian
	public function getSoalUjian($nid)
	{
		$query = $this->db->query("SELECT s.*, mk.* FROM tbl_soal s JOIN tbl_matkul mk WHERE s.nid = $nid AND mk.kd_matkul = s.kd_matkul");
		return $query;
	}

	public function getDataUjian($nid)
	{
		$query = $this->db->query("SELECT s.*, mk.*, u.* FROM tbl_soal s JOIN tbl_matkul mk JOIN tbl_ujian u ON s.id_soal = u.id_soal AND s.kd_matkul = mk.kd_matkul AND s.nid = $nid");
		return $query;
	}

	public function getUjian($id_ujian, $id_soal)
	{
		$query = $this->db->query("SELECT u.*, s.*, mk.* FROM tbl_ujian u JOIN tbl_soal s JOIN tbl_matkul mk ON u.id_ujian = $id_ujian AND s.id_soal = $id_soal AND s.kd_matkul = mk.kd_matkul");
		return $query;
	}

	public function updateUjian($data, $old_id)
	{
		$this->db->set($data);
		$this->db->where("id_ujian", $old_id);
		$this->db->update("tbl_ujian", $data);
	}
	// ------------------------------------------------ End Ujian -----------------------------------------------------

	// Hasil Ujian
	public function getHasil($nid)
	{
		$query = $this->db->query("SELECT s.*, mk.*, u.* FROM tbl_soal s JOIN tbl_matkul mk JOIN tbl_ujian u ON s.id_soal = u.id_soal AND s.kd_matkul = mk.kd_matkul AND s.nid = $nid ");
		return $query;
	}

	public function getDetailUjian($id)
	{
		$query = $this->db->query("SELECT u.*, s.*, mk.* FROM tbl_ujian u JOIN tbl_soal s JOIN tbl_matkul mk WHERE id_ujian = $id AND u.id_soal = s.id_soal AND s.kd_matkul = mk.kd_matkul");
		return $query;
	}

	public function getHasilUjian($id)
	{
		$query = $this->db->query("SELECT hs.*, m.*, p.*, kr.*, j.*, k.* FROM tbl_hasil_ujian hs JOIN tbl_mahasiswa m JOIN tbl_prodi p JOIN tbl_krs kr JOIN tbl_jurusan j JOIN tbl_kelas k WHERE hs.id_ujian = $id AND m.nim = hs.nim AND m.id_prodi = p.id_prodi AND m.nim = kr.nim AND kr.id_jurusan = j.id_jurusan AND j.id_kelas = k.id_kelas");
		return $query;
	}

	public function getMhs($nim)
	{
		$query = $this->db->query("SELECT m.*, p.*, kr.*, j.*, k.* FROM tbl_mahasiswa m JOIN tbl_prodi p JOIN tbl_krs kr JOIN tbl_jurusan j JOIN tbl_kelas k WHERE m.nim = $nim AND m.id_prodi = p.id_prodi AND kr.nim = $nim AND kr.id_jurusan = j.id_jurusan AND j.id_kelas = k.id_kelas");
		return $query;
	}

	public function getDetailHasil($id)
	{
		$query = $this->db->query("SELECT dhu.*, ds.*, hu.* FROM tbl_detail_hasil_ujian dhu JOIN tbl_detail_soal ds  JOIN tbl_hasil_ujian hu WHERE dhu.id_hasil_ujian = $id AND dhu.id_detail_soal = ds.id_detail_soal AND hu.id_hasil_ujian = $id");
		return $query;
	}

	public function getDetailHasilEssay($id)
	{
		$query = $this->db->query("SELECT dhu.*, ds.* FROM tbl_detail_hasil_ujian dhu JOIN tbl_detail_soal ds WHERE dhu.id_hasil_ujian = $id AND ds.id_detail_soal = dhu.id_detail_soal");
		return $query;
	}
}
