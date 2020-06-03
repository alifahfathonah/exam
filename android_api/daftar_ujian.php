<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'exam');

$con = mysqli_connect(HOST, USER, PASS, DB) or die('Unable to Connect');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Getting values
    $username = $_POST['nim'];

    //Creating sql query
    // $sql = "SELECT k.*, m.*, dk.* FROM tbl_mahasiswa m JOIN tbl_krs k JOIN tbl_detail_krs dk ON m.nim = $username AND k.nim = $username AND k.id_krs = dk.id_krs";

    $sql2 = "SELECT k.*, m.*, dk.*, s.*, u.*, mk.* FROM tbl_mahasiswa m JOIN tbl_krs k JOIN tbl_detail_krs dk JOIN tbl_soal s JOIN tbl_ujian u JOIN tbl_matkul mk ON m.nim = $username AND k.nim = $username AND k.id_krs = dk.id_krs AND dk.kd_matkul = s.kd_matkul AND s.id_soal = u.id_soal AND s.kd_matkul = mk.kd_matkul";

    //executing query
    $result = mysqli_query($con, $sql2);

    $res = mysqli_query($con, $sql2);

    $array = array();

    // //ini bentuk array
    while ($row = mysqli_fetch_array($res)) {
        // echo print_r($row);
        array_push($array, array(
            "id_ujian" => $row['id_ujian'],
            "id_soal" => $row['id_soal'],
            "kd_matkul" => $row['kd_matkul'],
            "nama_matkul" => $row['nama_matkul'],
            "tgl_ujian" => $row['tgl_ujian'],
            "waktu_mulai_ujian" => $row['waktu_mulai_ujian'],
            "waktu_selesai_ujian" => $row['waktu_selesai_ujian'],
            "token_ujian" => $row['token_ujian']
        ));
    }

    //fetching result
    $check = mysqli_fetch_array($result);


    //if we got some result
    if (isset($check)) {
        //displaying success

        //object
        // echo json_encode($array[0]);

        //array
        echo json_encode(array('data' => $array));

        // echo "success";
    } else {
        //displaying failure
        echo "failure";
    }
    mysqli_close($con);
}
