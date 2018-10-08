<?php
include'db.php';

$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 10 ? $_GET['per-page'] : 4);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;


$sql = "select * from todolist limit ".$start." , ".$perPage." ";
$total = $conn->query("select * from todolist")->num_rows;
$pages = ceil($total / $perPage);

$rows = $conn->query($sql);
	//echo"new record created succesfully";

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
<header class="text-center">TODO LIST</header>
</div>
<div class="row">
<a href="addtotdo.php" class="btn btn-success"> Add</a>
</div>
<div class="container">
<table class="table table-striped">
<thead>
<th>
<td>ID</td>
<td>Task</td>
<td>Date</td>
<td>Edit</td>
<td>Delete</td>
</th>
</thead>
<tbody style="margin-left:120px;">

<?php while($row=$rows->fetch_assoc()): ?>
<tr>
<td>&nbsp;</td>
<td><?php echo $row['id'];?></td>
<td><?php echo $row['task'];?></td>
<td><?php echo $row['date'];?></td>
<td><a href="edit.php?id=<?php echo $row['id'];?> "class="btn btn-primary">Edit</a></td>
<td><a href="delete.php?id=<?php echo $row['id'];?>"  class="btn btn-danger">Delete</a></td>
</tr>
<?php endwhile;?>

</tbody>
</table>
</div>
<center>
<ul class="pagination">
				<?php for($i = 1 ; $i <= $pages; $i++): ?>
				<li><a href="?page=<?php echo $i;?>&per-page=<?php echo $perPage;?>"><?php echo $i; ?></a></li>

			<?php endfor; ?>
				</ul>
</center>
</div>
</body>
</html>