<?php 

	session_start();

	unset($_SESSION["CurrentAdmin"]);

	header("location:index.php");
