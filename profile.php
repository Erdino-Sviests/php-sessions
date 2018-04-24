<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Resume</title>
<link type="text/css" rel="stylesheet" href="css/red.css" />
<link type="text/css" rel="stylesheet" href="css/print.css" media="print"/>
<!--[if IE 7]>
<link href="css/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>
<link href="css/ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.tipsy.js"></script>
<script type="text/javascript" src="js/cufon.yui.js"></script>
<script type="text/javascript" src="js/scrollTo.js"></script>
<script type="text/javascript" src="js/myriad.js"></script>
<script type="text/javascript" src="js/jquery.colorbox.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript">
		Cufon.replace('h1,h2');
</script>
</head>
<body>
<!-- Begin Wrapper -->
<div id="wrapper">
  <div class="wrapper-top"></div>
  <div class="wrapper-mid">
    <!-- Begin Paper -->
    <div id="paper">
	<div class="paper-top"></div>
	<div id="paper-mid">
		<div class="entry">
		  <!-- Begin Image -->
		  <img class="portrait" src="images/image.jpg" alt="John Smith" />
		  <!-- End Image -->
		  <!-- Begin Personal Information -->
		  <?php
		  session_start();
		  $data = array();
		  $errorMsg = "";
//		  $id = $_SESSION["id"];
//		  if(is_active($id)){
//			store_data($id, $data);
//		  }
		  $data = array("John","Smith","john.smith@email.com");
		  echo '<div class="self">';
		  if($data<>NULL){
			$name= $data[0];				
			$surname= $data[1];				
			$email= $data[2];		
			
		  echo '<h1 class="name">'.$name.'<br />';
		  echo $surname.'<br /></h1>';
		  echo '<ul>';
		  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errorMsg = "Missing E-mail!"; 
		} else {	
			echo '<li class="mail">'.$email.'</li>';
		}
		echo '</ul>';
		  } else {
			  $errorMsg = 'Missing Users Data!';
		  }
		echo '</div>';
		 ?>
		  <!-- End Personal Information -->
		</div>
		  <!-- Begin Error Block -->
			<div>
			<?php
			if($errorMsg<>""){
				echo '<span style="font-size:16px; color:red">'.$errorMsg.'</span>';
			}
			?>
			</div>
		  <!-- End Error Block -->
	</div>
      <div class="clear"></div>
      <div class="paper-bottom">
	  </div>
    </div>
    <!-- End Paper -->
  </div>
  <div class="wrapper-bottom"></div>
</div>
<div id="message"><a href="#top" id="top-link">Go to Top</a></div>
<!-- End Wrapper -->
</body>
</html>
