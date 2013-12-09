<!DOCTYPE html>
<html>

<head>
	<title> Post Tasks </title>
</head>
<body>

<?php

require_once("diditLib.php");

$mysql = null;

try
{
	$mysql = connectToMySQL();
	postUserTask($mysql);
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

echo "Task Posted Successfully";

?>
</body>
</html>