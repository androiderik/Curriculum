<?php 

	$db = mysqli_connect('localhost', 'root', 'root', 'Curriculum');
	$db->query("SET NAMES 'utf8'"); //PARSEANDO Ñ, COMAS ACENTOS SIGNOS SIN PROBLEMAS EN B.F
	if(mysqli_connect_errno())
	{
		echo 'Failed to connect to MySQL: '.mysqli_connect_error();
	}

 ?>