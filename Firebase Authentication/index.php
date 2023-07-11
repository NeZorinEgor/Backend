<?php
include("config.php");

if(isset($_SESSION['user'])){
	header("location: login.php");
}else{
	header("location: dashboard.php");
}