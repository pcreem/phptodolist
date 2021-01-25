<?php 
        $servername = "localhost";
        $username = "localuser";
				$password = "Password123#@!";
				$dbname = 'todolist';
        
        // Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

    ?>

<!DOCTYPE html>
<html>
<head>
  <title>ToDo List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
    

	<div class="heading">
		<h2 style="font-style: 'Hervetica';">ToDo List</h2>
	</div>
	<form method="post" action="test.php" class="input_form">
		<input type="text" name="task" class="task_input">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
    </form>
    <table>
	<thead>
		<tr>
			<th>N</th>
			<th>Tasks</th>
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		// select all tasks if page is visited or refreshed
		$sql = "SELECT id, task, reg_date FROM Task";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					
				while($row = $result->fetch_assoc()) {	?>
					<td><?php echo $row["id"] ?></td>
					<td><?php echo $row["task"] ?></td>
					<td><?php echo $row["reg_date"] ?></td>
				
			
				<?php 	}}
					?>
				
	</tbody>
</table>
</body>
</html>