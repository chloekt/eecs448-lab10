<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $mysqli = new mysqli("mysql.eecs.ku.edu", "chloethornton", "me3eit9r", "chloethornton");
    if($mysqli->connect_errno){
      printf("connection failed:%s\n" . $mysqli->connect_error);
      exit();
    }

    echo "<title>View Users</title>";
    echo "<h2 style='text-align: center;'>Table of Users</h2>";

    $query = "SELECT user_id FROM Users";
    $count = 0;

    if($result = $mysqli->query($query)){
        echo "<table style='text-align: center'; align = 'center' border = '1';>";
        echo "<tr style = \"background-color: LightSteelBlue\">";
        echo "<th>User Number</th>";
        echo "<th>User_ID</th>";
        while($row = $result->fetch_assoc()){
          $count += 1;
          echo "<tr>";
          echo "<td>".$count."</td>";
          echo "<td>".$row["user_id"]."</td>";
          echo "</tr>";
        }
        echo "</table>";
    }
    else{
      echo "cannot access database";
    }
    $mysqli->close();
 ?>
