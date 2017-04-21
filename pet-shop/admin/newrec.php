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
      var predir = "../";    // needed to prepend to path so savegrooming.php can be accessed in Includes dir.
    </script>
    <script type="text/javascript" src="../Includes/submitgroom.js"></script>
	</head>
	<body>
    <?php 
        require '../Includes/Header.php'; 
    ?>
    <h2>New Grooming Appt.</h2>      
    <?php                
      require '../Includes/groomform.php';    
    ?>        
    <button type="button" id="toadmin" onclick="location.href='http://localhost/pet-shop/admin';" >Back To Admin Main</button>                      
  </body>
</html>