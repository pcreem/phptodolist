<!DOCTYPE html>
<html>
<head>
  <title>ToDo List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
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

				// sql to create table
				$sql = "CREATE TABLE Task (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				task VARCHAR(30) NOT NULL,
				reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
				)";

				if ($conn->query($sql) === TRUE) {
					echo "Table Task created successfully";
				} else {
					echo "Error creating table: " . $conn->error;
				}

				$conn->close();
    ?>

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
		$tasks = mysqli_query($conn, "SELECT * FROM tasks");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"> <?php echo $row['task']; ?> </td>
				<td class="delete"> 
					<a href="index.php?del_task=<?php echo $row['id'] ?>">x</a> 
				</td>
			</tr>
		<?php $i++; } ?>	
	</tbody>
</table>
</body>
</html>