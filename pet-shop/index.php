<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Sandy's Pet Shop</title>
		<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
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
      figure {     
        margin-top:90px;
        margin-left: auto; 
        margin-right: auto;          
        text-align: justify;
        -ms-text-justify: distribute-all-lines;
        text-justify: distribute-all-lines;
      }         
      figure img {
        vertical-align: top;
        display: inline-block;
        *display: inline;
        zoom: 1;          
      }    
      #locmap {
        display: block;
        margin: auto;
        width: 80%;
      }        
      form {
        width: 480px;
      }
		</style> 
    <script>                     
      function submitContactForm()
      {                                                       
        var parms = "fname=" + contactform.elements["fname"].value + "&lname=" + contactform.elements["lname"].value + "&email=" + contactform.elements["email"].value + "&notes=" + contactform.elements["notes"].value;
        //alert('doing validate...' + parms);   
        
        // first validate form data.       
        var reEmail = /^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/;            
        var errorMsg = "";   
        if (contactform.elements["fname"].value == "") {
          errorMsg += "You must enter a first name.\n";
        }
        if (contactform.elements["lname"].value == "") {
          errorMsg += "You must enter a last name.\n";
        }
        if (!reEmail.test(contactform.elements["email"].value)) {
          errorMsg += "You must enter a valid email address.\n";
        }
        if (contactform.elements["notes"].value == "") {
          errorMsg += "You must enter a message.\n";
        }     
        if (errorMsg != "") {                     
          alert(errorMsg);  
        }
        else
        {       
          // if data is good, then submit using AJAX.    
          var contentDiv= document.getElementById("contentDivContact");
          var xmlhttp = new XMLHttpRequest();  
          xmlhttp.open("POST", "sendemail.php", true); 
          xmlhttp.onreadystatechange = function() {
              if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
                contentDiv.innerHTML=xmlhttp.responseText;  
                if (xmlhttp.responseText.includes("SUCCESS")) 
                {                             
                  alert('Email Sent Successfully!');
                  $('#contactform')[0].reset();   // clear contact form  
                  contentDiv.innerHTML = "";       
                } 
                else // let error msg be displayed a few seconds before clearing div
                {            
                   setTimeout(function() {contentDiv.innerHTML = "";}, 3000);                
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
    <script> 
      var predir = ""; 
    </script>
    <script type="text/javascript" src="Includes/submitgroom.js"></script>
	</head>
	<body>                       
		<div data-role="page" id="mypage">
      <?php 
        require 'Includes/Header.php'; 
      ?>
			<div data-role="tabs">   
        <div data-role="navbar">
          <ul>
            <li><a href="#home" id="homeTab" data-icon="home" class="ui-btn-active ui-state-persist">About Us</a></li>
            <li><a href="#location" id="locationTab" data-icon="location">Store Location</a></li>  
            <li><a href="#grooming" id="groomingTab" data-icon="calendar">Grooming</a></li>
            <li><a href="#contact" id="contactTab" data-icon="mail">Contact Us</a></li>
          </ul>
        </div>
             
	      <div class="ui-content" id="home">
          <p>Sandy's Pet Shop offers dog, cat and bird bathing. This includes bathing, nail trimming, and ear cleaning. We offer nail trimmings for all types of animals including dogs, cats, small animals, birds, and repitiles.</p>      
          <p>We provide boarding for small animals, birds, and reptiles only. Sorry - no cats and dogs.</p>
          <p>We provide aquarium set-up and maintenance in your home or office. We offer regular service contracts or one time cleaning.</p>  
          <h1>Our Staff</h1>
          <ul>
            <li>Roger Waters</li>
            <li>David Gilmour</li>
            <li>Nick Mason</li>
            <li>Richard Wright (on sabbatical)</li>
          </ul>
          <figure>
            <img src="dog.jpg" alt="Dog" height="201" width="251">
            <img src="cat.jpg" alt="Cat" height="201" width="251">
            <img src="turtle.jpg" alt="Turtle" height="201" width="251">  
          </figure>
			  </div> 
             
        <div class="ui-content" id="location">
          <h1>Location and Hours</h1>   
          <h2>Hours: Mon-Sat 8AM-5PM</h2>
          <p>We are at 1421 Hess Lane Louisville, KY 40217 on the corner of Poplar Level road.</p>  
          <p>From the Watterson Expressway (I-264) take the Poplar Level Road exit North. Take a left at the McDonalds onto Hess Lane and turn right into our parking lot.</p>
          <p>From I-65 take the Watterson Expressway exit East. (I-264) Take the Poplar Level Road exit North. Turn left at the McDonalds onto Hess Lane and turn right into our parking lot.</p>
          <figure>
            <img src="map.jpg" id="locmap" alt="Map">      
          </figure>  
			  </div>
        
        <div class="ui-content" id="grooming">   			   
          <p>Sandy's Pet Shop offers dog, cat and bird bathing. This includes bathing, nail trimming, and ear cleaning. We offer nail trimmings for all types of animals including dogs, cats, small animals, birds, and repitiles.</p>       
          <h2>New Grooming Appt.</h2>
          <?php require 'Includes/groomform.php'; ?>
			  </div>
	
        <div class="ui-content" id="contact">                         
				  <h2>Contact Us</h2>
          <form onSubmit="return submitContactForm()" method="post" id="contactform" data-ajax="false">
            <div data-role="fieldcontain">
              <label for="fname">First Name</label>
              <input type="text" name="fname" id="fname">
            </div>
            <div data-role="fieldcontain">
              <label for="lname">Last Name</label>
              <input type="text" name="lname" id="lname">
            </div>
            <div data-role="fieldcontain">
              <label for="email">Email</label>
              <input type="email" name="email" id="email">
            </div>
            <div data-role="fieldcontain">
              <label for="notes">Message</label>
              <textarea cols="40" rows="6" name="notes" id="notes"></textarea>
            </div>
            <div data-role="fieldcontain">
              <input type="submit" name="submit-button-1" id="submit-button-1" value="Submit">
            </div>            
            <div id="contentDivContact">           
            </div>
          </form>               
			  </div>
	             
			</div>	
      <?php 
        require 'Includes/Footer.php'; 
      ?>		
		</div>                      
  </body>
</html>

