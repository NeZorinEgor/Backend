<?php
include("config.php");
include("firebaseRDB.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if($email == ""){
	echo "Email is required";
}else if($password == ""){
	echo "password is required";
}else if($name == ""){
	echo "name is required";
}else{
	$rdb= new firebaseRDB($databaseURL);
	$retrieve = $rdb->retrieve("/user", "email", "EQUAL", $email);
	$data = json_decode($retrieve, 1);

	if(isset($data['email'])){
		echo "Email already used";
	}else{
		$insert = $rdb->insert("/user", [
			"name" => $name,
			"email" => $email, 
			"password" => $password,

		]);

		$result = json_decode($insert, 1);
		if(isset($result['name'])){
			echo "Sign up success, please login";
		}else{
			echo "Signup failed";
		}

	}
}

