<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Sandy's Pet Shop</title>
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <style type="text/css">
			h2 {
				white-space: normal !important;
			}
			ul li a h3 {
				white-space: normal !important;
			}                         
      
      header img {
        display: block;
        margin: auto;
        width: 30%;
      }
      form {
        width: 480px;
      }            
      #toadmin {
        width: 480px;
      }
		</style>                         
    <script>
      function submitGroomingForm(recID)
      {                
         var fname2 = groomform.elements["fname2"].value;    
         var lname2 = groomform.elements["lname2"].value;   
         var address = groomform.elements["address"].value;
         var city = groomform.elements["city"].value;
         var state = groomform.elements["state"].value;
         var zip = groomform.elements["zip"].value;
         var phone = groomform.elements["phone"].value;
         var email2 = groomform.elements["email2"].value;
         var pettype = groomform.elements["pettype"].value;
         var breed = groomform.elements["breed"].value;
         var petname = groomform.elements["petname"].value;
         var fixed = groomform.elements["fixed"].value;
         var petbday = groomform.elements["petbday"].value;
            
         var parms =  "recID=" + "<?php echo $_GET['recID'] ?>" + "&fname2=" + fname2 + "&lname2=" + lname2 + "&address=" + address + "&city=" + city + "&state=" + state + "&zip=" + zip + 
            "&phone=" + phone + "&email2=" + email2 + "&pettype=" + pettype + "&breed=" + breed + "&petname=" + petname + "&fixed=" + fixed + "&petbday=" + petbday;
                    
         //alert(parms);   
                                   
         // first validate form data.                
         var reName = /^([A-Za-z']+ )*[A-Za-z']+$/;      
         var reState = /^[A-Za-z]{2}$/; 
         var reZipCode = /^\d{5}(\-\d{4})?$/;     
         var rePhone = /^\(?([2-9]\d\d)\)?[\-\. ]?([2-9]\d\d)[\-\. ]?(\d{4})$/;
         var reEmail = /(^$|^.*@.*\..*$)/;
         var reDate = /^\d{4}\-?((((0[13578])|(1[02]))\-?(([0-2][0-9])|(3[01])))|(((0[469])|(11))\-?(([0-2][0-9])|(30)))|(02\-?[0-2][0-9]))$/;
                              
         var errorMsg = "";   
         if (!reName.test(groomform.elements["fname2"].value)) {
           errorMsg += "You must enter a first name.\n";
         }
         if (!reName.test(groomform.elements["lname2"].value)) {
           errorMsg += "You must enter a last name.\n";
         }                           
         if (groomform.elements["address"].value == "") {
          errorMsg += "You must enter an address.\n";
         }                       
         if (!reName.test(groomform.elements["city"].value)) {
           errorMsg += "You must enter a city.\n";
         }  
         if (!reState.test(groomform.elements["state"].value)) {
           errorMsg += "You must enter a valid state.\n";
         }    
         if (!reZipCode.test(groomform.elements["zip"].value)) {
           errorMsg += "You must enter a valid zip code.\n";
         }                                                  
         if (!rePhone.test(groomform.elements["phone"].value)) {
           errorMsg += "You must enter a valid phone number.\n";
         }
         if (!reEmail.test(groomform.elements["email2"].value)) {
           errorMsg += "You must enter a valid email address.\n";
         }                            
         if (!reName.test(groomform.elements["petname"].value)) {
           errorMsg += "You must enter the pet's name.\n";
         }
         if ((groomform.elements["petbday"].value != "") &&
            (!reDate.test(groomform.elements["petbday"].value))) {
           errorMsg += "You must enter a valid birth date.\n";
         }                  
         
         if (errorMsg != "") {                     
           alert(errorMsg);  
         }
         else
         {                   
           // if data is good, then submit using AJAX.    
            var contentDiv= document.getElementById("contentDivGrooming");
            var xmlhttp = new XMLHttpRequest();  
            xmlhttp.open("POST", "updategrooming.php", true); 
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
                  contentDiv.innerHTML=xmlhttp.responseText; 
                  
                  if (xmlhttp.responseText.includes("SUCCESS")) 
                  {                             
                    alert('Grooming Request Updated Successfully!');
                    //$('#groomform')[0].reset();   // clear grooming form  
                    contentDiv.innerHTML = "";       
                  } 
                  else // let error msg be displayed a few seconds before clearing div
                  {            
                     setTimeout(function() {contentDiv.innerHTML = "";}, 5000);                
                  }                  
              }
            }   
            xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");  
            xmlhttp.send(parms);    
         }
        
        // return false to keep event from bubbling.     
        return false;
      }
    </script>
	</head>
	<body>                
    <?php 
        require '../Includes/Header.php'; 
    ?>
    <h2>Edit Grooming Appt.</h2>   
    <?php                       
      $recID =  $_GET['recID']; 
      //echo 'id is ' . $recID;   
      require '../Includes/groomform.php';     
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
      $result = mysqli_query($connection,"SELECT * FROM grooming WHERE GroomingID = " . $recID);     
      $row = mysqli_fetch_array($result);

    ?>                            
    <script>                           
       
       // populate form fields with db results.
       $('#fname2').val("<?php echo $row['FirstName'] ?>");  
       $('#lname2').val("<?php echo $row['LastName'] ?>");
       $('#address').val("<?php echo $row['Address'] ?>");
       $('#city').val("<?php echo $row['City'] ?>");
       $('#state').val("<?php echo $row['State'] ?>");
       $('#zip').val("<?php echo $row['Zip'] ?>");
       $('#phone').val("<?php echo $row['PhoneNumber'] ?>");
       $('#email2').val("<?php echo $row['Email'] ?>");   
       var typeVal = "<?php echo $row['PetType'] ?>";   
       $('#pettype').val(typeVal);
       $('#breed').val("<?php echo $row['Breed'] ?>");
       if (typeVal != 'dog')
         $("#breeddiv").hide();
       $('#petname').val("<?php echo $row['PetName'] ?>");     
       var chkVal = <?php echo $row['NeuteredOrSpayed'] ?>; 
       $('#fixed').prop('checked', chkVal);    //.checkboxradio('refresh');
       $('#fixed').val(chkVal);    
       var bdayVal = "<?php echo $row['PetBirthday'] ?>".substring(0, 10);
       $('#petbday').val(bdayVal);
    </script>             
    <button type="button" id="toadmin" onclick="location.href='http://localhost/pet-shop/admin';" >Back To Admin Main</button>
  </body>
</html>                               