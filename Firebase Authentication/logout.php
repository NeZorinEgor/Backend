<?php
include("config.php");
include("firebaseRDB.php");

if(isset($_SESSION['user'])){
	unset($_SESSION['user']);

}

header("location: login.php");