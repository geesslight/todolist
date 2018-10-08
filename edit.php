<?php
include 'db.php';
	
	if(isset($_GET['id']))
	{
	$id=$_GET['id'];
	
	
	
	$sql1="SELECT  * FROM `todolist` WHERE id='$id'";
	
	$rows=$conn->query($sql1);
	
	$row=$rows->fetch_assoc();
	}
	
	
if(isset($_POST['edit']))
{
	$idno=$_POST['idno'];
	
	$task=$_POST['task'];
	
	$sql="UPDATE `todolist` SET `task`='$task'  WHERE  id='$idno'";
	
	$val=$conn->query($sql);
	
	if($val)
	{
	echo"new record updated  succesfully";
	header("location:index.php");	 
	}
	else
	{
		echo"record is not created";
	}
}

	

?>

<html>
<head>
<title>
TODO List
</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<br/>
<header class="text-center">Edit TODO</header>
</div>
<div class="row">
<form method="post" action="edit.php">
<label for="task">Task</label>

<input type="text" value="<?php echo $row['task'];?>" name="task" class="form-control" required/>
<input type="text" name="idno" value="<?php echo $id;?> ">
<br/>
<input type="submit" name="edit" value="submit" class="btn">
</form>
</div>
<div class="row">

</div>
</div>
</body>
</html>