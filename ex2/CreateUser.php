<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  $mysqli = new mysqli("mysql.eecs.ku.edu", "chloethornton", "me3eit9r", "chloethornton");
  if($mysqli->connect_errno){
    printf("connection failed:%s\n" . $mysqli->connect_error);
    exit();
  }

  $user = $_POST["user_id"];

  if($user ==""){
    echo "Can't leave the field empty";
  }
  else{
    $query = "INSERT INTO Users (user_id) VALUES ('".$user."')";

    if(!$mysqli->query($query)){
      echo "User ID (".$user.") already exists in the Database";
    }
    else{
      echo "User (".$user.") successfully stored in the Database";
    }
  }
  $mysqli->close();
?>
