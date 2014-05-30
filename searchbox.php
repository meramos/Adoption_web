<!-- this file is html code but contains php code-->
<!-- should not use <html>, <head> or <body> tags -->

<!-- the following script is part of <body> within where ever this file is included -->
<script>
function validateForm(form)
{
	var age = form.age.value;
	if(isNaN(age)) //if age is not a number		UUUGH not working :(
	{ 
	  alert("age has to be a number");
	  return false;
	}
	else
	{
		if(age < 0)
		{
			alert("age has to be greater than or equal to 0");
			return false; //NECESSARY to stop the form from going through
		}
	}
}
</script>

<form name="searchForn" action="search.php" method="get">

	Country:
	<?php 
		include 'select_country.php';
	?>
	State: 
	<?php 
		include 'select_state.php';
	?>
	<br>
	City: <input type="text" name="city"><br>
	Category:  
	<select name = "which_tab">
	  <option value="any">Any</option>
	  <option value="adopt">For Adoption</option>
	  <option value="lost">Lost</option>
	  <option value="found">Found</option>
	 </select><br> 
	Gender: <select name = "gender">
	  <option value="any">Any</option>
	  <option value="F">Female</option>
	  <option value="M">Male</option>
	 </select><br> 
	Species: <select name = "species">
	  <option value="any">Any</option>
	  <option value="dog">Dog</option>
	  <option value="cat">Cat</option>
	  <option value="rodent">Rodent</option>
	  <option value="rabbit">Rabbit</option>
	  <option value="reptile">Reptile</option>
	  <option value="bird">Bird</option>
	  <option value="amphibious">Amphibious</option>
	  <option value="fish">Fish</option>
	 </select><br> 
	Approx. Age (in years, 0 and above): <input type="text" name="age"><br>  <!-- has to be an integer, from 0 and up -->
	Foster Needed: <select name = "foster">
	  <option value="any">Any</option>
	  <option value="F">Yes</option>
	  <option value="M">No</option>
	 </select><br> 

	 <input type="submit" value="Search" onClick = "return validateForm(this.form)">
</form>