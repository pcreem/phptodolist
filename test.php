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
        
        // Create connection
        $conn = new mysqli($servername, $username, $password);
        
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";

        if (isset($_POST['submit'])) {
            if (empty($_POST['task'])) {
                $errors = "You must fill in the task";
            }else{
                $task = $_POST['task'];
                $sql = "INSERT INTO tasks (task) VALUES ('$task')";
                mysqli_query($conn, $sql);
                header('location: test.php');
            }
        }	
    ?>

	<div class="heading">
		<h2 style="font-style: 'Hervetica';">ToDo List</h2>
	</div>
	<form method="post" action="index.php" class="input_form">
		<input type="text" name="task" class="task_input">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
    </form>
    <p>test seeeer</p>
</body>
</html>