<?php       
  require '../Includes/fnStrings.php';         
  $dbEntries = $_POST;
  foreach ($dbEntries as &$entry)
  {
    $entry = dbString($entry);
  }
                       
  $recID = $_POST['recID'];
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
  $query = "UPDATE grooming SET " .                               
    "FirstName = '" .	$dbEntries['FirstName'] . "'," . 
    "LastName = '" .	$dbEntries['LastName'] . "'," .
    "Address = '" .	$dbEntries['Address'] . "'," .
    "City = '" .	$dbEntries['City'] . "'," .
    "State = '" .	$dbEntries['State'] . "'," .                
    "Zip = '" .	$dbEntries['Zip'] . "'," .
    "PhoneNumber = '" .	$dbEntries['PhoneNumber'] . "'," .
    "Email = '" .	$dbEntries['Email'] . "'," .
    "PetType = '" .	$dbEntries['PetType'] . "'," .
    "Breed = '" .	$dbEntries['Breed'] . "'," .
    "PetName = '" .	$dbEntries['PetName'] . "'," .
    "NeuteredOrSpayed = '" .	$dbEntries['NeuteredOrSpayed'] . "'," .           
    "PetBirthday = '" .	$dbEntries['PetBirthday'] . "'" .    
    " WHERE GroomingID = " . $recID . ";";
     
  if ($db->query($query))
    echo "SUCCESS";
  else {
    echo "Update FAILED!";                
  }
?>
