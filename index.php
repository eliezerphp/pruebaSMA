<?php
session_start();

if(!isset($_SESSION["usuario"]))
{
 header("location:login.php");
} 

include_once('includes/header.php');

include_once('includes/footer.php');