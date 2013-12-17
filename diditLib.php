<?php
require_once("didit.inc");

/* connect to the mySQL pointed to by the didit.inc file 
   returns pointer to the mySQL connection
   throws exception if the connection cannot be established */

function connectToMySQL()
{
	/* register globals */
	
	global $MYSQL_HOSTNAME;
	global $MYSQL_USERNAME;
	global $MYSQL_PASSWORD;
	global $MYSQL_DATABASE;
	
	
	$mysql    = new mysqli($MYSQL_HOSTNAME, $MYSQL_USERNAME, $MYSQL_PASSWORD, $MYSQL_DATABASE);
	
	if($mysql->connect_error)
	{
		throw(new Exception("Unable to connect to mySQL: " . $mysql->connect_error));
	}
	
	return($mysql);
}

/* * posts task list data to mySQL
   * @param  pointer to mySQL connection
   * @throws if an SQL or input validation error occurs */
function postUserTask($mysql)
{
	
	/* if statement for looping through the 6 tasks */
	for($i = 1; $i <= 6; $i++)
	{
		$taskHolder = $_POST["task$i"];
		
		if(empty($taskHolder))
		{
			continue;
		}
	
		
		$query = "INSERT INTO tasks (userId, description)  VALUES(1,?)";
	
	
		/* prepare query */
		$statement = $mysql->prepare($query);
		if($statement === false)
		{
			throw(new Exception("Unable to prepare mySQL query: " . $mysql->error));
		}
	
	
		/* bind parameters to the prepared statement */
		$statement->bind_param("s",$taskHolder);
	
		/* execute mySQL query */
		if($statement->execute() === false)
		{
			throw(new Exception("Unable to query mySQL: " . $statement->error));
		}
	
		/* affected_rows != 1 implies the data wasn't able to be inserted */
		if($statement->affected_rows !== 1)
		{
			throw(new Exception("Unable to query mySQL: " . $statement->error));
		}
	}
}

function generateUserTask($mysql, $userId)
{
	$query = "SELECT id, description FROM tasks WHERE userId = ?";    //no comma necessary after fields  
	
	/* prepare query */
	$statement = $mysql->prepare($query);
	if($statement === false)
	{
		throw(new Exception("Unable to prepare mySQL query: " . $mysql->error));
	}
	
	/* bind parameters to the prepared statement */
	$statement->bind_param("i",	$userId);
	
	/* execute mySQL query */
	if($statement->execute() === false)
	{
		throw(new Exception("Unable to query mySQL: " . $statement->error));
	}
	
	/* build the table header */
	$table  = "<table border=\"1\">";
	$table .= "<tr><th>Task #</th></tr>";
	
	/* use the results to build the table data */
	$statement->bind_result($id,$description);
	while($statement->fetch())
	{
		$table .= "<tr><td><input type=\"checkbox\" />$description  </td></tr>"; // the backslashes are the "escapes" before the ""'s for putting a special character in strings
		
	}
	
	/* build the table footer & return the table */
	$table .= "</table>";
	
	return($table);
}
?>