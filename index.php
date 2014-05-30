<?php 

//need to start session before html tags!!!
//need session to access user login info stored in $_SESSION['?'], ? = whatever you want it to be

session_start(); 

//use this (start session) in all pages of the website

?> 

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

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
<script> 
    $(function(){
      $("#searchBox").load("searchbox.html"); 
    });
 </script> 
-->

<!-- CSS code for tabbed appearance-->
<!--<style>-->
<!--</style>-->
	
</head>

<body>

<div class = "options">

	<h2 class="option"> <a href="index.php"> Home </a> </h2>
	<h2 class="option" style="left:100px;"> <a href="articles.php"> Articles </a> </h2>
	<h2 class="option" style="left:210px;"> <a href="aboutus.php"> About Us </a> </h2>
	<h2 class="option" style="left:330px;"> <a href="contactus.php"> Contact Us </a> </h2>

</div>

<!-- log in -->

<!-- may just login or submit with javascript so to not refresh page -->

<div class = "login">

<?php

if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == true)) //use isset() to see if variable exists
{
    echo $_SESSION['username'];
	
	echo "<form name='input' action='logout.php' method='post'>";
	echo "<input type='submit' value='Logout'>";
	echo "</form>";
} 
else
{ 
?>
    <form name="input" action="checklogin.php" method="post">
		Username: <input type="text" name="username"><br>
		Password: <input type="password" name="password"><br>
		<input type="submit" value="Login">
	</form>
	or
	<form name="input" action="signup.php" method="get">
		<input type="submit" value="Sign Up">
	</form>
	
<?php
}
?>


</div>

<div id="searchBox" class = "search">
	<?php include 'searchbox.php';?>
</div>

<div class = "tabs">

    <div class = "tab" name = "Adoption">
   
	   <input type="radio" id="tab-1" name="tab-group-1" checked>
       <label for="tab-1">Adoption</label>
	   
	   <div class="content">
   
		<!-- insert entries from database using php -->
		
		<?php
		
		$which_tab = "adopt";
		
		//button to add new entry
		
		echo "<form name='input' action='create_entry.php' method='post'>";
		echo "<input type='hidden' name = 'which_tab' value='".$which_tab."'>"; //to be sent to the create_entry.php script
		echo "<input type='submit' value='add entry'>";
		echo "</form>";
		
		//display entries that are within the database
		
		$the_sql = "SELECT sub_id,photo,gender,description FROM submission WHERE which_tab = '".$which_tab."'";
		a_tab($which_tab,$the_sql);

		?>
		
		</div> <!-- end of content -->
		
    </div>
	
	<div class = "tab" name = "Lost">
   
		<input type="radio" id="tab-2" name="tab-group-1">
        <label for="tab-2">Lost</label>
       
        <div class="content">
   
		<!-- insert entries from database using php -->

		<?php
		
		$which_tab = "lost";
		
		//button to add new entry
		
		echo "<form name='input' action='create_entry.php' method='post'>";
		echo "<input type='hidden' name = 'which_tab' value='".$which_tab."'>"; //to be sent to the create_entry.php script
		echo "<input type='submit' value='add entry'>";
		echo "</form>";
		
		$the_sql = "SELECT sub_id,photo,gender,description FROM submission WHERE which_tab = '".$which_tab."'";
		a_tab($which_tab,$the_sql);

		?>
		
		</div> <!-- end of content -->
		
	</div>
				
	<div class = "tab" name = "Found">
   
		<input type="radio" id="tab-3" name="tab-group-1">
        <label for="tab-3">Found</label>
     
        <div class="content">
   
		<!-- insert entries from database using php -->

		<?php
		
		$which_tab = "found";
		
		//button to add new entry
		
		echo "<form name='input' action='create_entry.php' method='post'>";
		echo "<input type='hidden' name = 'which_tab' value='".$which_tab."'>"; //to be sent to the create_entry.php script
		echo "<input type='submit' value='add entry'>";
		echo "</form>";
		
		$the_sql = "SELECT sub_id,photo,gender,description FROM submission WHERE which_tab = '".$which_tab."'";
		a_tab($which_tab,$the_sql);

		?>
		
		</div> <!-- end of content -->
		
    </div>
	
</div>

<!-- file name can't have either underscore or digit ... ?-->
<div class = "ad1">
<img src="ads/lead.png">
</div>

<div class = "ad2">
<img src="ads/lead.png">
</div>
<!-- -->


</body>

</html>