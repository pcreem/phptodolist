<?php

  if ($_GET['edit_task_id']) {
    require '../db_conn.php';

    $id = $_GET['edit_task_id'];
    // $sql = "SELECT task FROM Task WHERE id=$id;";
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        if($id === $row['id']){
          $task = $row['task'];
          echo "    
            <html>
                <body>

                <form action=\"app/edit.php\" method=\"post\">
                Update Task: <input type=\"text\" name=\"name\"
                value=\"$task\"
                
                ><br>
                <input type=\"submit\">
                </form>

                </body>
              </html> 
            
            ";
        }
        
      }
    }

    

  }
  else {
    header("Location: ../frontend.php?mess=error");
  }

?>