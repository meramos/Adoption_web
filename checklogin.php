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

$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 

// To protect from MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

//Look for user in database.
$sql="SELECT * FROM user WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{
	// Register $myusername, $mypassword and redirect to previous page
	
	//session_register() is deprecated. use $_SESSION instead
	
	session_start();
	$_SESSION['loggedin'] = true;
	$_SESSION['username'] = $myusername;
	
	echo "success";
	
	header("location:index.php");
}
else
{
	echo "Wrong Username or Password";
}
?>