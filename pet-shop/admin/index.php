<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Sandy's Pet Shop</title>
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		<style type="text/css">
			h2 {
				white-space: normal !important;
			}
			ul li a h3 {
				white-space: normal !important;
			}            
                     
      header {
        display: inline; 
      }
      header img {      
        width: 20%;
      } 
      table {           
        border-collapse: collapse;
      }        
      th, td {
        padding: 5px;
      }
      table, th, td {          
        white-space: nowrap;
        border: 1px solid black;
      }
      .tableclass {    
        width: auto;
        height: 70vh;
        overflow-x: auto; 
        border:1px solid black;   
        clear: both;
      }         
      button {
        width: 75px;
      }   
      #newbutton {     
        display: inline;
        width: 150px;   
        float: right;       
      }       
      #appttext {
        display: inline;    
        font: bold;      
      }
 
		</style>  
    <script>
      function doEdit(recID)
      {  
        window.location.href = 'editrec.php?recID=' + recID;
      }       
      
      function doDelete(recID)
      {   
        window.location.href = 'delrec.php?recID=' + recID;
      }            
      
      function doNew()
      {  
        window.location.href = 'newrec.php';
      }
    </script>
	</head>
	<body>   
    <?php 
        require '../Includes/Header.php'; 
    ?>    
    <span id="appttext">Appointments:</span> 
    <button type="button" id="newbutton" onclick="doNew()">New Appt.</button>                          
    <div id=contentDivAdmin class=tableclass>
    </div>
    <script>            
      var contentDiv= document.getElementById("contentDivAdmin"); 
      
      var xmlhttp = new XMLHttpRequest();  
      xmlhttp.open("POST", "buildtable.php", true); 
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            contentDiv.innerHTML=xmlhttp.responseText;
        }
      }   
      xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");  
      xmlhttp.send(null);     
    </script>            
  </body>
</html>

