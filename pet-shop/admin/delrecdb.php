<?php           
  $recID =  $_POST['recID']; 
  //echo 'id is ' . $recID;     
  $host    = "localhost";
  $user    = "root";
  $pass    = "pwdpwd";
  $db_name = "pet_shop";
  //create connection
  $connection = mysqli_connect($host, $user, $pass, $db_name);
  //test if connection failed
  if(mysqli_connect_errno()){
      die("connection failed: "
          . mysqli_connect_error()
          . " (" . mysqli_connect_errno()
          . ")");
  }
  //get results from database
  $result = mysqli_query($connection,"DELETE FROM grooming WHERE GroomingID = " . $recID);     
  if(!$result) {
    echo "Could not delete record: " . mysql_error();
  }
  else {      
    echo "SUCCESS";   
  }
?>         
