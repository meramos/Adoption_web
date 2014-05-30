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

function display()
{
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

	$sub_id = $_GET['sub_id'];

	$sql = "SELECT * FROM submission WHERE sub_id = ".$sub_id; //should just be one entry
	$result = mysql_query($sql, $con);

	while($row = mysql_fetch_array($result)) 
	{
		//Display ALL of the information stored for the entry

		//display image, $row['photo'], access from folder where .html is stored
						
		//location: C:\xampp\htdocs\Adoption_web\photos
						
		$image_url = $row['photo'];
						
		echo "<div name = 'photo'>";
		echo "<img src='".$image_url."' width='259' height='194'>";
		echo "</div>";
		
		//display category
		
		echo "<b>Category:</b> ";
		
		$category = $row['which_tab'];
		if($category == "adopt")
		{
			echo "For Adoption";
		}
		else
		{
			echo $category;
		}
		
		//display location
		
		echo "<h3>Location</h3>";
		
		echo "<b>Country:</b> ".$row['country']."<br>";
		echo "<b>State:</b> ".$row['state']."<br>";
		echo "<b>City:</b> ".$row['city']."<br>";
		echo "<b>Street:</b> ".$row['street']."<br>";
					
		//display other info
		
		echo "<h3>Information</h3>";
					
		//display species
			
		echo "<b>Species:</b> ".$row['species']."<br>";
			
		//display gender, $row['gender']
						
		echo "<b>Gender:</b> ".$row['gender']."<br>";		

		//display age
						
		echo "<b>Approx. Age:</b> ".$row['approx_age']." years old<br>";	
						
		//display description, $row['description']
						
		$description = $row['description'];
		echo "<b>Description:</b> ".$description."<br>";
		
		//display health
						
		echo "<b>Health:</b> ".$row['health']."<br>";
		
		//display care requirements
						
		echo "<b>Care Requirements:</b> ".$row['care_requirements']."<br>";
		
		//display if foster is needed
		
		echo "<b>Foster:</b> ";
		
		if ($row['need_foster'] == 0)
		{
			echo "not needed";
		}
		else
		{
			echo "needed";
		}
		
		echo "<br><br>";
		
		//display donation option
		
		if ($row['donate'] == 1)
		{
			echo "<input type='submit' value='Donate with Paypal'>";
		}
		
		//Add button so user responds to post. Either 'adopt' or just 'contact'.
		
		//Add option to show if pet was adopted or found/taken in by real owner
		//QUESTION: Should adopted pets be shown in search results / kept in the database?
						
	}

	//Close connection.
				
	mysql_close($con);
}

?>

<div class = "tabs">

	<?php 
	
		//create array to keep adopt, found and lost in order for automation/generalization
	
		$tabs = array
		   (
		   array("adopt","Adoption","tab-1"),
		   array("lost","Lost","tab-2"),
		   array("found","Found","tab-3")
		   );
		   
		//now go through array
		
		$which_tab = $_GET['which_tab'];
		
		echo "<div class = 'tabs'>";
		
		for($i = 0; $i < 3; $i++)
		{
			$checked = false;
			
			echo "<div class = 'tab' name = '".$tabs[$i][1]."'>";
			
			if($which_tab == $tabs[$i][0])
			{
				echo "<input type='radio' id='".$tabs[$i][2]."' name='tab-group-1' checked>";
				
				$checked = true;
			}
			else
			{   
				echo "<input type='radio' id='".$tabs[$i][2]."' name='tab-group-1'>";
			}
			
			echo "<label for='".$tabs[$i][2]."'>".$tabs[$i][1]."</label>";
			
			echo "<div class='content'>";
			
			if($checked)
			{ 
				display();
			}
			else
			{   $which_tab = $tabs[$i][0];
				$the_sql = "SELECT sub_id,photo,gender,description FROM submission WHERE which_tab = '".$which_tab."'";
				a_tab($which_tab,$the_sql);
			}
	
			echo "</div>";
	
			echo "</div>";
				
		}
		
		echo "</div>";
	
	?>

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