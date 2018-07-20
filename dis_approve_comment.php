<?php
session_start();
require 'conn.php';
if(isset($_GET['id'])){
	$IdFromURL=mysqli_real_escape_string($conn,$_GET['id']);
	$sql="UPDATE comments SET status='OFF' WHERE id='$IdFromURL'";
	$result=mysqli_query($conn,$sql);
	 $msg="success";
    if(!$result){
      $msg="error";
    }
    $_SESSION['msg']='<div id="status" class="modal" style="z-index: 1003; display: none; opacity: 0; transform: scaleX(0.7); top: 4%;">
        <div class="modal-content ">
         <h4>Modal Header</h4>
           <p>'.$msg.'</p>
         </div>
         <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Ok</a>
         </div>
         </div>';
        header('Location:comments.php');
        exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>CMS by R.A.S.S</title>

  <!-- CSS  -->
   
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script type="text/javascript">
    $( document ).ready(function() {
     $(".button-collapse").sideNav();
});
  </script>
   <style type="text/css">
        
        html{
          height:100vh;
        }
        body{
          min-height: 100vh;
          
        }
        .no-margin{
          margin-bottom: 0;
        }
        .input-field{
          margin-top: 0px;
        }

      </style>
</head>
<body>
 
   <nav>
    <div class="nav-wrapper teal lighten-2">
      <a href="#" class="brand-logo right">Logo</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
<li><a class="white-text" href="dashboard.php">Home</a></li>
        <li><a class="white-text" href="#">Help</a></li>
        <li><a class="white-text" href="about_us.php">About us</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
    <li><a class="white-text" href="dashboard.php">Home</a></li>
        <li><a class="white-text" href="#">Help</a></li>
        <li><a class="white-text" href="about_us.php">About us</a></li>
      </ul>
    </div>
  </nav>

    

       <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
     
    
    </body>
  </html>