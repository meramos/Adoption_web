<?php

function a_tab($which_tab, $sql)
{

?>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
<script> 
$(document).ready(function() 
{
    $('div.tabs').css("height", "0");
});
</script>-->
<!-- supossed to make it so that when you chnage tab it adjusts to its own size but it isn't working-->
<!--it makes it so that it stays this size for all the tabs no matter the entries. WHY WORLD, WHY-->

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
	
	//tables in database: user, submission
	
	//go through user submissions (ids) where which_tab = ""adopt
	//NOTE: query used changes depending on user's search specifications
	
	//$sql = "SELECT sub_id,photo,gender,description FROM submission WHERE which_tab = '".$which_tab."'";
	$result = mysql_query($sql, $con);
	
	//display entries of 'adopt'
	
	if($result === FALSE) 
	{
		echo mysql_error();
	}
	else
	{
	
		while($row = mysql_fetch_array($result)) 
		{
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
<script> 
$(document).ready(function() 
{
    $('div.tabs').css("height", "+=200" );
});
</script>

<?php
		
			echo "<form name='input' action='view_entry.php' method='get'>";
		
			echo "<div class = 'entry'>"; //start entry div
			
			echo "<input type='hidden' name = 'sub_id' value='".$row["sub_id"]."'>"; //to be sent to the view_entry.php script

			echo "<input type='hidden' name = 'which_tab' value='".$which_tab."'>"; 

			//display image, $row['photo'], access from folder where .html is stored
			
			//location: C:\xampp\htdocs\Adoption_web\photos
			
			$image_url = $row['photo'];
			
			echo "<div class = 'photo'>";
			echo "<img src='".$image_url."' width='259' height='194'>";
			echo "</div>";
			
			//display gender, $row['gender']
			
			echo "<div class = 'gender'>";
			echo "<b>Gender: </b>".$row['gender'];
			echo "</div>";
			
			//display preview of description, $row['description']
			
			$description = $row['description'];
			
			if(strlen($description) > 142)
			{
				$description = substr($description,0,142)."...";
			}
			
			echo "<div class = 'description'>";
			echo "<b>Description:</b> ".$description;
			echo "</div>";
			
			echo "<div class = 'view_button'>";
			echo "<input type='submit' value='View'>"; //goes to view_entry.php. in future, could make entry box clickable.
			echo "</div>";
			
			echo "</div>"; //end entry div
			
			echo "</form>";
			
		}
		
	} //end of else
	
	//Close connection.
	
	mysql_close($con);
}

/*DECIDED TO DO THIS WITH PYTHON ONLY ONCE, THIS FUNCTION TAKES TOO LONG TO RUN
function dropdown_parse($file, $delimeter, $type)
{
	echo "in function";
	$txt_file = file_get_contents($file); //store file as string

	$rows = explode($delimeter, $txt_file); //split string by delimeter, have array of rows

	//array_shift($rows); would use if first row was column names

	echo "<select name = '".$type."'>";

	//go through rows

	for($i = 0; $i < count($rows); $i++)
	{	
		$value = $rows[i];
		
		echo "<option value='".$value."'>".$value."</option>";
	}

	echo "<select name = '".$type."'>";
}*/

?>