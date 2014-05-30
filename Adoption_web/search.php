<html>

<head>

<!-- access with: http://localhost/Adoption_web/index.php -->

<?php include 'php_functions.php'; ?>

<link rel="stylesheet" type="text/css" href="=style.css">

<title> Animal Adoption </title>
<meta http-equiv="Content-type" content="text/html;charset=ISO-8859-1" >
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"> <!-- 16x16 pixel image -->
<link rel="stylesheet" type="text/css" href="style.css">

<!-- include html code for search box -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
<script> 
    $(function(){
      $("#searchBox").load("searchbox.html"); 
    });
 </script> 
	
</head>

<body>

<div class = "options">

	<h2 style="position:absolute; top:70px;"> Home </h2>
	<h2 style="position:absolute; top:70px; left:100px;"> Articles </h2>
	<h2 style="position:absolute; top:70px; left:210px;"> About Us </h2>
	<h2 style="position:absolute; top:70px; left:330px;"> Contact Us </h2>

</div>

<!-- log in -->

<!-- may just login or submit with javascript so to not refresh page -->

<div class = "login">
	<form name="input" action="login.php" method="get">
		Username: <input type="text" name="username"><br>
		Password: <input type="password" name="pwd"><br>
		<input type="submit" value="Login">
	</form>
	or
	<form name="input" action="signup.php" method="get">
		<input type="submit" value="Sign Up">
	</form>
</div>

<div id="searchBox" class = "search"></div>

<?php

//Connect to database.

//Create connection

include 'mysqlINFO.php';

$con_search = mysql_connect($server,$username,$password);

//Check connection
if (! $con_search) 
{
  echo "Failed to connect to MySQL: ";
}

mysql_select_db($database,$con_search) or die(mysql_error());

$city = $_GET['city'];
$state = $_GET['state'];
$country = $_GET['country'];
$species = $_GET['species'];
$which_tab = $_GET['which_tab']; //not specified by user
$gender = $_GET['gender'];
$foster = $_GET['foster'];
$age = $_GET['age'];

//if country selected:
//	add coutry == $country to $statement string

$statement = "";

if($city != "")
{
	$statement = $statement."city = '".$city."' AND ";
}
if($state != "any")
{
	$statement = $statement."state = '".$state."' AND ";
}
if($country != "any")
{
	$statement = $statement."country = '".$country."' AND ";
}
if($species != "any")
{
	$statement = $statement."species = '".$species."' AND ";
}
if($which_tab != "any")
{
	$statement = $statement."which_tab = '".$which_tab."' AND "; //might not want to end in AND
}
if($gender != "any")
{
	$statement = $statement."gender = '".$gender."' AND ";
}
if($foster != "any")
{
	$statement = $statement."foster = ".$foster." AND ";
}
if($age != "")
{
	$statement = $statement."age = ".$age." AND ";
}

//now remove the last 4 digits of the statement variable, which should be "AND "

$statement = substr($statement, 0, -3);

$sql = "SELECT sub_id,photo,gender,description FROM submission WHERE ".$statement;
$result = mysql_query($sql, $con_search);

//Now to display search results

a_tab($which_tab,$sql);


//Close connection.
			
mysql_close($con_search);

?>


</body>
</html> 