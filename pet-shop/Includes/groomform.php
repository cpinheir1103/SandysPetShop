<script>
  function toggleFixed(fixedBox) { 
    if (fixedBox.checked) 
      fixedBox.value = 1;  
    else
      fixedBox.value = 0;  
  }        
  
  function pettypeChanged() {                              
    if (groomform.elements["pettype"].value == "dog")      
      $("#breeddiv").show();
    else            
      $("#breeddiv").hide();
  }     
</script>
<form onSubmit="return submitGroomingForm()" method="post" id="groomform" data-ajax="false">
  <div data-role="fieldcontain">
    <label for="fname2">First Name</label>
    <input type="text" name="fname2" id="fname2">
  </div>
  <div data-role="fieldcontain">
    <label for="lname2">Last Name</label>
    <input type="text" name="lname2" id="lname2">
  </div>   
  <div data-role="fieldcontain">
    <label for="address">Address</label>
    <input type="text" name="address" id="address">
  </div>
  <div data-role="fieldcontain">
    <label for="city">City</label>
    <input type="text" name="city" id="city">
  </div>
  <div data-role="fieldcontain">
    <label for="state">State</label>
    <input type="text" name="state" id="state">
  </div>
  <div data-role="fieldcontain">
    <label for="zip">Zip Code</label>
    <input type="text" name="zip" id="zip">
  </div>
  <div data-role="fieldcontain">
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone">
  </div>         
  <div data-role="fieldcontain">
    <label for="email2">Email</label>
    <input type="text" name="email2" id="email2">
  </div>
  <div data-role="fieldcontain">
    <label for="pettype">Type of Pet</label> 
    <select name="pettype" id="pettype" onchange="pettypeChanged()">
      <option value="dog">Dog</option>
      <option value="cat">Cat</option>
      <option value="bird">Bird</option>
    </select> 
  </div>   
  <div data-role="fieldcontain" id=breeddiv>
    <label for="breed">Breed</label>
    <select name="breed" id="breed">
      <option value="lab">Lab</option>
      <option value="beagle">Beagle</option>
      <option value="poodle">Poodle</option>   
      <option value="boxer">Boxer</option>
      <option value="terrier">Terrier</option>
    </select>
  </div>
  <div data-role="fieldcontain">
    <label for="petname">Pet's Name</label>
    <input type="text" name="petname" id="petname">
  </div>
  <div data-role="fieldcontain">
    <label for="fixed">Neutred/Spayed</label>  
    <input type="checkbox" name="fixed" id="fixed" onClick="toggleFixed(this)" value="1" checked>
  </div>            
  <div data-role="fieldcontain">
    <label for="petbday">Pet's Birthday (YYYY-MM-DD)</label>
    <input type="text" name="petbday" id="petbday">
  </div> 
  <div id="contentDivGrooming"> 
  </div>
  <div data-role="fieldcontain">
    <input type="submit" name="submit-button-2" id="submit-button-2" value="Submit">
  </div>       
</form>
