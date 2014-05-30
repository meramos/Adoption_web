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

<!-- reference: http://mrbool.com/how-to-create-a-sign-up-form-registration-with-php-and-mysql/28675 -->

<h1>Sign-Up Page </h1>

<p> Please fill the following application to make an account. </p>

<form method="POST" action="connectivity-sign-up.php"> 
	
	<fieldset style="width:30%"><legend>Registration Form</legend> 
	<table border="0"> 
	
	<tr> <td>Name</td>	<td> <input type="text" name="name"></td> </tr> 
	<tr> <td>Email</td>  <td> <input type="text" name="email"></td> </tr> 
	<tr> <td>UserName</td>   <td> <input type="text" name="user"></td> </tr> 
	<tr> <td>Password</td>  <td> <input type="password" name="pass"></td> </tr> 
	<tr> <td>Confirm Password </td>   <td><input type="password" name="cpass"></td> </tr> 
	<tr> <td><input id="button" type="submit" name="submit" value="Sign-Up"></td> </tr> 

	</table> 
	</fieldset>
	
</form> 


</body>

</html>