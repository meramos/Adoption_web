<?php 

session_start(); //necessary to start session everytime we will use something from session
session_destroy();

header("location:index.php");

?>