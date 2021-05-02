<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  $mysqli = new mysqli("mysql.eecs.ku.edu", "chloethornton", "me3eit9r", "chloethornton");
  if($mysqli->connect_errno){
    printf("connection failed:%s\n" . $mysqli->connect_error);
    exit();
  }

  $author_ID = $_POST["authorID"];
  $content = $_POST["content"];
  $query1 = "SELECT user_id FROM Users";
  $isUser = false;

  if($author_ID == ''){
    echo "Please enter your user_ID in the box";
  }
  if($content == ''){
    echo "Please write something to post";
  }

  if($result = $mysqli->query($query1)){
    while($row = $result->fetch_assoc()){
      if($row["user_id"] == $author_ID){
        $isUser = true;
        break;
      }
    }
    if($isUser == false){
      echo "User does not exist, please input a valid user_ID";
    }
    else if($isUser==true){
      echo "Login Successful<br>";
      $query2 = "INSERT INTO Posts (content, author_id) VALUES ('".$content."', '".$author_ID."')";
      if(!$mysqli->query($query2)){
        echo "Cannot be stored in the database";
      }
      else{
        echo "Post was successfully stored in database";
      }
    }
  }
  $mysqli->close();
 ?>
