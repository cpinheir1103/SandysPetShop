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
		</style>  
    <script>                     
      function gotoAdmin()        
      {
        window.location.href = '../admin';
      }
      
      function doDelRec()
      {                 
        var contentDiv= document.getElementById("contentDivAdmin"); 
      
        var xmlhttp = new XMLHttpRequest();  
        xmlhttp.open("POST", "delrecdb.php", true); 
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              contentDiv.innerHTML=xmlhttp.responseText; 
              
              if (xmlhttp.responseText.includes("SUCCESS")) 
              {                             
                alert('Grooming Request Successfully Deleted!');
                setTimeout(gotoAdmin, 1);       
              } 
              else // let error msg be displayed a few seconds before clearing div
              {            
                setTimeout(gotoAdmin, 5000);                
              }    
                           
          }
        }   
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");  
        xmlhttp.send("recID=" + <?php echo $_GET['recID'] ?>);  
      }
    </script>
	</head>
	<body>          
    <?php 
        require '../Includes/Header.php'; 
    ?>
    <div> 
      <h3> Are you sure you want to delete the record with ID <?php echo $_GET['recID'] ?> ?</h3>  
      <button type="button" onclick="doDelRec()">YES</button> 
      <button type="button" onclick="window.location.href = '../admin'">NO</button>
    </div>                                
    <div id=contentDivAdmin class=tableclass>
    </div>                 
  </body>
</html>

