<html>

<head>

<!-- access with: http://localhost/Adoption_web/index.php -->

<link rel="stylesheet" type="text/css" href="=style.css">

<title> Animal Adoption </title>
<meta http-equiv="Content-type" content="text/html;charset=ISO-8859-1" >
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"> <!-- 16x16 pixel image -->

<script>
function validateForm()
{
	var country = document.forms["createForm"]["country"].value;
	if (country==null || country=="")
	{
	  alert("First name must be filled out");
	  return false;
	}
}
</script>

</head>

<body>

<h1>Submission Page </h1>

<p> Please fill the following application to upload an entry. </p>

<form name="createForm" action="insert_entry.php" onsubmit="return validateForm()" method="post">

Photo: 	<input type="file" name="photo" size="40"><br> <!-- make sure it's an image with javascript -->
<br>
Category:  
<select name = "which_tab">
  <option selected disabled>Choose one</option>
  <option value="adopt">For Adoption</option>
  <option value="lost">Lost</option>
  <option value="found">Found</option>
 </select><br> 
<br>
Street: <input type="text" name="street"><br>
City: <input type="text" name="city"><br>
State:
<select name = "state">
	<option selected disabled>Choose one</option>
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="PR">Puerto Rico</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VI">Virgin Islands</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>	<br>
Country: <input type="text" name="country"><br>	
<br><br>
Species: <select name = "species">
  <option selected disabled>Choose one</option>
  <option value="dog">Dog</option>
  <option value="cat">Cat</option>
  <option value="rodent">Rodent</option>
  <option value="rabbit">Rabbit</option>
  <option value="reptile">Reptile</option>
  <option value="bird">Bird</option>
  <option value="amphibious">Amphibious</option>
  <option value="fish">Fish</option>
 </select><br> 
Gender: <select name = "gender">
  <option selected disabled>Choose one</option>
  <option value="female">Female</option>
  <option value="male">Male</option>
 </select><br> 
Approx. Age (in years, 0 and above): <input type="text" name="age"><br>  <!-- has to be an integer, from 0 and up -->
Description: <br> <textarea rows="4" cols="50" name="description"> </textarea> <br>
Health:	<br> <textarea rows="4" cols="50" name="health"> </textarea> <br>	
Care Requirements: 	<br> <textarea rows="4" cols="50" name="care"> </textarea> <br>
Is foster needed? 
<input type="radio" name="foster" value="1">Yes
<input type="radio" name="foster" value="0">No
<br>
Allow Donations:
<input type="radio" name="donate" value="1">Yes
<input type="radio" name="donate" value="0">No
<br>
<input type="submit" value="Upload">

</form>		

</body>
</html>