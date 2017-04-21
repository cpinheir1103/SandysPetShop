<?php                                    
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

  // get results from database
  $result = mysqli_query($connection,"SELECT * FROM grooming");
  $allfields = array();  //array for saving property

  // show field names
  echo '<table class="data-table">
          <tr class="data-heading">';    
  echo '<td></td><td></td>';  // two empty headers for edit and delete columns.
  while ($field = mysqli_fetch_field($result)) {
      echo '<td>' . $field->name . '</td>';  // field name for header
      array_push($allfields, $field->name); 
  }
  echo '</tr>';

  // show records
  while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      foreach ($allfields as $item) {     
          if ($item == 'GroomingID')  // add edit and delete buttons.
          { 
            echo '<td><button type="button" onclick="doEdit(' . $row[$item] . ')">Edit</button></td>';  
            echo '<td><button type="button" onclick="doDelete(' . $row[$item] . ')">Delete</button></td>';
          }
          echo '<td>' . $row[$item] . '</td>';
      }
      echo '</tr>';
  }
  echo "</table>";
?>
