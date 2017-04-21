<?php       
  require 'Includes/fnStrings.php';   
  $dbEntries = $_POST;
  foreach ($dbEntries as &$entry)
  {
    $entry = dbString($entry);
  }
               
  $dbEntries =  array('FirstName' => $_POST['fname2'],
                      'LastName' => $_POST['lname2'],
                      'Address' => $_POST['address'],
                      'City' => $_POST['city'],
                      'State' => $_POST['state'],
                      'Zip' => $_POST['zip'],
                      'PhoneNumber' => $_POST['phone'],
                      'Email' => $_POST['email2'],
                      'PetType' => $_POST['pettype'],
                      'Breed' => $_POST['breed'],
                      'PetName' => $_POST['petname'],
                      'NeuteredOrSpayed' => $_POST['fixed'],
                      'PetBirthday' => $_POST['petbday']
                     );
  if ($_POST['pettype'] != 'dog')
    $dbEntries['Breed'] = '';  

  @$db = new mysqli('localhost','root','pwdpwd','pet_shop');
  if (mysqli_connect_errno())
  {
    echo 'Cannot connect to database: ' . mysqli_connect_error();
  }
  $query = "INSERT INTO grooming
    (FirstName, LastName, Address,
      City, State, Zip, PhoneNumber,
      Email, PetType, Breed, PetName, NeuteredOrSpayed,
      PetBirthday)
    VALUES ('" .	$dbEntries['FirstName'] . "','" .
            $dbEntries['LastName'] . "','" .
            $dbEntries['Address'] . "','" .
            $dbEntries['City'] . "','" .
            $dbEntries['State'] . "','" .                
            $dbEntries['Zip'] . "','" .
            $dbEntries['PhoneNumber'] . "','" .
            $dbEntries['Email'] . "','" .
            $dbEntries['PetType'] . "','" .
            $dbEntries['Breed'] . "','" .
            $dbEntries['PetName'] . "','" .
            $dbEntries['NeuteredOrSpayed'] . "','" .            
            $dbEntries['PetBirthday'] . "')";

  if ($db->query($query))
    echo "SUCCESS";
  else
    echo "Insert failed";
?>
