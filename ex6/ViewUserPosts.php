<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $mysqli = new mysqli("mysql.eecs.ku.edu", "chloethornton", "me3eit9r", "chloethornton");
    if($mysqli->connect_errno){
      printf("connection failed:%s\n" . $mysqli->connect_error);
      exit();
    }
    $userID = $_POST["users"];
    $query2 = "SELECT content FROM Posts WHERE author_id = '".$userID."'";

    if($result = $mysqli->query($query2)){
        echo "<table style='text-align: center'; align = 'center' border = '1';>";
        echo "<tr>";
        echo "<th>User (".$userID.")'s Posts'</th>";
        echo "</tr>";

        while($row = $result->fetch_assoc()){
          echo "<tr>";
          echo "<td>".$row["content"]."</td>";
          echo "</tr>";
        }
        echo "</table>";
    }
    else{
      echo "This User Has no posts";
    }
    $mysqli->close();
 ?>
