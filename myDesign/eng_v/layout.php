<?php 

	session_start();

	unset($_SESSION["Current"]);

	header("location:" . $_SERVER["HTTP_REFERER"]);
