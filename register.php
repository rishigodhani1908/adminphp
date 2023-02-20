<?php 
	
	header('Content-type: application/json');
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Headers: *');

	$con = mysqli_connect('localhost','root','','adminlte');

	$data = json_decode(file_get_contents('php://input'), true);
	
	$name = $data['name'];
	$email = $data['email'];
	$password = $data['password'];
	$retypepassword = $data['retypepassword'];

	if ($name != '' && $email != '' && $password !='' && $retypepassword !='') 
	{
		$query = "INSERT INTO register (name,email,password,retypepassword) values ('$name','$email','$password', '$retypepassword')"; 
 		mysqli_query($con, $query);

	}
	
		$query ="select * from register";
		$data = mysqli_query($con, $query);
		$json_data= array();

		while ($row = mysqli_fetch_assoc($data)){
			$json_data[]=$row;
		}

				print json_encode($json_data);	
	// mysqli_close($connection);
 ?>
 

