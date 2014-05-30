<html>

<head>

<!-- access with: http://localhost/Adoption_web/index.php -->

<link rel="stylesheet" type="text/css" href="=style.css">

<title> Animal Adoption </title>
<meta http-equiv="Content-type" content="text/html;charset=ISO-8859-1" >
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"> <!-- 16x16 pixel image -->

</head>

<body>

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

//create random submission ID. make sure it is not repeated in the database.

//$_SESSION['username']
$user_id = 123;


$photo = $_POST['photo']; 
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$species = $_POST['species'];
$which_tab = $_POST['which_tab']; //not specified by user
$gender = $_POST['gender'];
$description = $_POST['description'];
$health = $_POST['health'];
$donate = intval($_POST['donate']); //needs to be boolean or int
$foster = intval($_POST['foster']); //needs to be boolean or int
$care = $_POST['care'];
$age = intval($_POST['age']); //needs to be integer
//date added automatically by mysql

//attributes in query are ordered by the order of columns stored in the sbumission table of the database.
//order is important if we don't specify the column names in the INSERT query.

//don't include sub_id. sub_id is assigned by mysql with autoincrement.

$query = "INSERT INTO submission (`user_id`, `photo`, `street`, `city`, `state`, `which_tab`, `gender`, `country`, `species`, `need_foster`, `description`, `health`, `donate`, `care_requirements`, `approx_age`) VALUES ($user_id,'$photo','$street','$city','$state','$which_tab','$gender','$country','$species',$foster,'$description','$health',$donate,'$care',$age)";

$insert = mysql_query($query, $con);

if (!$insert) 
{
  die('Error: ' . mysql_error($con));
}

//Close connection.
			
mysql_close($con);

?>

<h1> DONE! </h1>

</body>
</html>