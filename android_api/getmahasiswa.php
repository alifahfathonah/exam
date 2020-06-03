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
	$sql = "SELECT * FROM tbl_mahasiswa INNER JOIN tbl_prodi INNER JOIN tbl_krs WHERE tbl_mahasiswa.nim = '$username' AND tbl_prodi.id_prodi = tbl_mahasiswa.id_prodi AND tbl_krs.nim = '$username'";

	//executing query
	$result = mysqli_query($con, $sql);

	$res = mysqli_query($con, $sql);

	$array = array();

	// //ini bentuk array
	while ($row = mysqli_fetch_array($res)) {
		// echo print_r($row);
		array_push($array, array(
			"nim" => $row['nim'],
			"nama_mhs" => $row['nama_mhs'],
			"jk" => $row['jk'],
			"nama_prodi" => $row['nama_prodi'],
			"semester" => $row['semester']
		));
	}

	//fetching result
	$check = mysqli_fetch_array($result);


	//if we got some result
	if (isset($check)) {
		//displaying success

		//object
		echo json_encode($array[0]);

		//array
		// echo json_encode(array('data'=>$array));

		// echo "success";
	} else {
		//displaying failure
		echo "failure";
	}
	mysqli_close($con);
}
