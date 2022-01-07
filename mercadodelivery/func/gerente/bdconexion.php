<?php
	$servername="localhost"; 
	$database="bdmercado";
	$username='root';
	$password= '';
	$conn=mysqli_connect($servername, $username, $password, $database);
	if (mysqli_connect_error()){
    	echo "Connection failed: <br>" . mysqli_connect_error();
	}else{
		/*echo "Connected successfully<br>";*/
	}
?>