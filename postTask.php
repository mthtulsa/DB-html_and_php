<?php
/* <!DOCTYPE html>
<html>

<head>
	<title> Post Tasks </title>
</head>
<body>
*/


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

// make sure the page doesnt switch pages and say "Post Task Successfully" this post, and stays on page.
// echo "<script> history.go(-1); </script>"
header("Location: didit.php");
 
      
/*
</body>
</html>
*/
?>