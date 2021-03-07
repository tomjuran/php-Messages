<?php
  //connect to a=database
  $conn = mysqli_connect('localhost', 'root', 'your_password', 'writter');
  
  //check connection 
  if(!$conn){
      echo 'Connection error: '. mysqli_connect_error();
  }
?>