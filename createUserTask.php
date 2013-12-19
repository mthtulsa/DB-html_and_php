
<?php

require_once("diditLib.php");

$mysql = null;

try
{
	$mysql = connectToMySQL();
	$table = generateUserTask($mysql, 1); // the 1 is hardwired for the userId CHANGE THIS ONCE the LOGIN and SUBSYTEM IS ONLINE
	echo $table;
}

catch(Exception $e)
{
 	
 	echo "Unable to Retrieve Task" . $e->getMessage();
	exit;
	
}

if($mysql !== null)
{
	$mysql->close();
}


?>
