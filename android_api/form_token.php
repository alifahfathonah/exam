<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'exam');
date_default_timezone_set('Asia/Jakarta');

$con = mysqli_connect(HOST, USER, PASS, DB) or die('Unable to Connect');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Getting values
    $id_ujian = $_POST['id_ujian'];
    $token = $_POST['token_ujian'];


    //Creating sql query
    $sql = "SELECT * FROM tbl_ujian WHERE id_ujian = '$id_ujian' AND token_ujian='$token'";

    //executing query
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);

    $currentTime = new DateTime();
    $startTime = new DateTime($data['tgl_ujian'].$data['waktu_mulai_ujian']);
    $endTime = new DateTime($data['tgl_ujian'].$data['waktu_selesai_ujian']);
    // echo $currentTime->format('Y-m-d H:i:s');
    // echo $startTime->format('Y-m-d H:i:s');
    // echo $endTime->format('Y-m-d H:i:s');

    if ($currentTime >= $startTime && $currentTime <= $endTime) {
        
    $res = mysqli_query($con, $sql);

    // echo $sql;

    // $array = array();

    // while ($row = mysqli_fetch_array($res)) {
    //     // echo print_r($row);
    //     array_push($array, array(
    //         "id_ujian" => $row['id_ujian'],
    //         "id_soal" => $row['id_soal']
    //     ));
    // }

    //fetching result
    // $check = mysqli_fetch_array($res);

    //if we got some result
    if ($res) {
        //displaying success

        //object
        // echo json_encode($array[0]);

        //array
        // echo json_encode(array('data'=>$array));

         echo "success";
    } else {
        //displaying failure
        echo "failure";
    }

    } else{
        echo "Anda telat ujian";
    }

    mysqli_close($con);
}
