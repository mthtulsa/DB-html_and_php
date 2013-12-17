<!DOCTYPE html>
<html>

<head>
	<title> Create User Tasks </title>
</head>
<body>

<?php

require_once("diditLib.php");

$mysql = null;

try
{
	$mysql = connectToMySQL();
	generateUserTask($mysql, 1); // the 1 is hardwired for the userId CHANGE THIS ONCE the LOGIN and SUBSYTEM IS ONLINE
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

// make sure the page doesnt switch pages and say "Post Task Successfully" this post, and stays on page.
// echo "<script> history.go(-1); </script>"
 
      

?>
</body>
</html>