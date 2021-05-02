<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $mysqli = new mysqli("mysql.eecs.ku.edu", "chloethornton", "me3eit9r", "chloethornton");
    if($mysqli->connect_errno){
      printf("connection failed:%s\n" . $mysqli->connect_error);
      exit();
    }

    $query = "SELECT post_id FROM Posts";

    foreach( $_POST['delete'] as $temp){
      $query_del = "DELETE FROM Posts WHERE post_id = '".$temp."'";
    if($result = $mysqli->query($query_del)){
      echo "<h4 style='text-align:center;'> Post ID (".$temp.") post has been deleted</h4>";
    }
    else{
      echo "Could not delete the post";
    }
  }
 ?>
