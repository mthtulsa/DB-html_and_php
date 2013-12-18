<?php
require_once("diditLib.php");

$mysql = null;

try
{
	$mysql = connectToMySQL();
	postUserTask($mysql);
	echo "Tasks posted OK.";
}

catch(Exception $e)
{
 	
 	echo "Unable to Post Task" . $e->getMessage();
	exit;
	
}

if($mysql !== null)
{
	$mysql->close();
}
?>