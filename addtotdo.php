<?php
include_once'db.php';
if(isset($_POST['submit']))
{
	$task=$_POST['task'];
	
	$sql="INSERT INTO `todolist`(`task`) VALUES ('$task')";
	
	$val=$conn->query($sql);
	
	if($val)
	{
	echo"new record created succesfully";
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
<header class="text-center">ADD TODO</header>
</div>
<div class="row">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<label for="task">Task</label>
<input type="text" value="" name="task" class="form-control" required/>
<br/>
<input type="submit" name="submit" value="submit" class="btn">
</form>
</div>
<div class="row">

</div>
</div>
</body>
</html>