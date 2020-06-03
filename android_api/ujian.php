<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'exam');

$con = mysqli_connect(HOST, USER, PASS, DB) or die('Unable to Connect');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Getting values
    // $id_ujian = $_POST['id_ujian'];
    $currentTime = new DateTime();
    $id_soal = $_POST['id_soal'];

    //Creating sql query
    $sql = "SELECT ds.*, u.* FROM tbl_detail_soal ds JOIN tbl_ujian u WHERE ds.id_soal = $id_soal AND u.id_soal = $id_soal";

    // foreach ($sql as $key => $row) {
    //     $row->jawaban = "SELECT * FROM tbl_jawaban where id_detail_soal = $id_soal";
    //     $sql[$key] = [
    //         'id_soal' => $row->id_soal,
    //         'id_detail_soal' => $row->id_detail_soal,
    //         'soal' => $row->soal,
    //         'jenis_soal' => $row->jenis_soal,
    //         'nilai_soal' => $row->nilai_soal,
    //         'jawaban' => $row->jawaban
    //     ];
    // }

    //executing query
    $result = mysqli_query($con, $sql);

    $res = mysqli_query($con, $sql);

    $array = array();

    // //ini bentuk array
    while ($row = mysqli_fetch_array($res)) {
        // echo print_r($row);
        array_push($array, array(
            "id_detail_soal" => $row['id_detail_soal'],
            "soal" => $row['soal'],
            // "waktu_mulai_ujian" => $row['waktu_mulai_ujian'],
            // "waktu_selesai_ujian" => $row['waktu_selesai_ujian']
        ));
    }

    //fetching result
    $check = mysqli_fetch_array($result);


    //if we got some result
    if (isset($check)) {
        //displaying success

        //object
        // echo json_encode($array[0]);
    $data = mysqli_fetch_assoc($result);

        //array
        echo json_encode(array('waktu_sekarang'=> $currentTime->format('H:i:s'), 'waktu_mulai' => $data['waktu_mulai_ujian'], 'waktu_selesai' => $data['waktu_selesai_ujian'],'data' => $array));

        // echo "success";
    } else {
        //displaying failure
        echo "failure";
    }
    mysqli_close($con);
}
