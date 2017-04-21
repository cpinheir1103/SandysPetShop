function submitGroomingForm()
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
      
   var parms = "fname2=" + fname2 + "&lname2=" + lname2 + "&address=" + address + "&city=" + city + "&state=" + state + "&zip=" + zip + 
      "&phone=" + phone + "&email2=" + email2 + "&pettype=" + pettype + "&breed=" + breed + "&petname=" + petname + "&fixed=" + fixed + "&petbday=" + petbday;
                                            
   //alert("parms=" + parms);   
      
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
   else {                   
     // if data is good, then submit using AJAX.    
      var contentDiv= document.getElementById("contentDivGrooming");
      var xmlhttp = new XMLHttpRequest();  
      xmlhttp.open("POST", predir + "savegrooming.php", true); 
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
            contentDiv.innerHTML=xmlhttp.responseText;   
            
            if (xmlhttp.responseText.includes("SUCCESS")) {                             
              alert('Grooming Request Saved Successfully!');
              $('#groomform')[0].reset();   // clear grooming form  
              contentDiv.innerHTML = "";       
            } 
            else // let error msg be displayed a few seconds before clearing div             
              setTimeout(function() {contentDiv.innerHTML = "";}, 5000);                           
        }
      }   
      xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");  
      xmlhttp.send(parms);    
   }
  
  // return false to keep event from bubbling.     
  return false;
}   
