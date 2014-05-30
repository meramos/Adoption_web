<?php

//Connect to database.

//Create connection

include 'mysqlINFO.php';

$con = mysql_connect($server,$username,$password);

//Check connection
if (! $con) 
{
  echo "Failed to connect to MySQL: ";
}

mysql_select_db($database,$con) or die(mysql_error());

function NewUser() 
{ 
	$userName = $_POST['user']; 
	$password = $_POST['pass']; 
	$fullname = $_POST['name']; 
	$to_adopt = $_POST['to_adopt']; 
	$cellphone = $_POST['cellphone']; 
	$type = $_POST['type']; 
	
	$query = "INSERT INTO user (user_name,password,name,email,to_adopt,cellphone,type) VALUES ('$userName',$password,'$fullname','$email','$to_adopt','$cellphone','$type')"; 
	$data = mysql_query ($query)or die(mysql_error()); 
	
	if($data) 
	{ 
		echo "YOUR REGISTRATION IS COMPLETED..."; 
	}
} 

function SignUp() 
{ 
	if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-Up.html, is it empty or have some text 
	{ 
		$query = mysql_query("SELECT * FROM websiteusers WHERE userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysql_error()); 
		
		if(!$row = mysql_fetch_array($query) or die(mysql_error())) 
		{ 
			newuser(); 
		} 
		else 
		{ 
			echo "SORRY...YOU ARE ALREADY REGISTERED USER..."; 
		} 
	} 
} 

if(isset($_POST['submit'])) 
{ 
	SignUp(); 
}


?>