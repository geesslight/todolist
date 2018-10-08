<?php

include 'db.php';
	
	$id=$_GET['id'];
	
	
	
	$sql1="DELETE  FROM `todolist` WHERE id='$id'";
	
	$row=$conn->query($sql1);
	
	if($row)
	{
		echo"delete successfully";
		header("Location:index.php");
	}
	else
	{
		echo"not deleted";
	}
	
	
	?>