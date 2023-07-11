<?php

include("config.php");
include("firebaseRDB.php");

if(!isset($_SESSION['user'])){
	header("location: login.php");
}else{
	echo "hello {$_SESSION['user']['name']}, welcome!<br>";
	echo '<a href ="logout.php">Loguot</a>';
}