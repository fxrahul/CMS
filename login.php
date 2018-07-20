 <?php 
session_start();
require 'conn.php';
require 'Functions.php';
if(isset($_POST['login'])){
  $Username=mysqli_real_escape_string($conn,$_POST['userid']);
  $Password=mysqli_real_escape_string($conn,$_POST['password']);
  $Account_Found=Login_Attempt($Username,$Password);
  if($Account_Found){
    $_SESSION['user_id']=$Account_Found['id'];
    $_SESSION['user_name']=$Account_Found['username'];
    $login_msg="Welcome".' '.$_SESSION['user_name'];
    
    $_SESSION['login_msg']='<div id="login_status" class="modal" style="z-index: 1003; display: none; opacity: 0; transform: scaleX(0.7); top: 4%;">
        <div class="modal-content ">
         <h4>Modal Header</h4>
           <p>'.$login_msg.'</p>
         </div>
         <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Ok</a>
         </div>
         </div>';
        header('Location:dashboard.php');
        exit;
  }else{
    
    $msg="Invalid Username/Password";

   $_SESSION['msg1']='<div id="status1" class="modal" style="z-index: 1003; display: none; opacity: 0; transform: scaleX(0.7); top: 4%;">
        <div class="modal-content ">
         <h4>Modal Header</h4>
           <p>'.$msg.'</p>
         </div>
         <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Ok</a>
         </div>
         </div>';

        header('Location:login.php');
        exit;
}
}
 ?>
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>CMS by R.A.S.S</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript">
    $( document ).ready(function() {
     $(".button-collapse").sideNav();
});
  </script>
</head>
<body>
   <nav>
    <div class="nav-wrapper teal lighten-2">
      <a href="#" class="brand-logo right">Logo</a>
     
    </div>
  </nav>


   

       <?php

      if(!empty($_SESSION['msg1'])){
        echo $_SESSION['msg1'];
        unset($_SESSION['msg1']);
        
      }
      ?>

      <script type="text/javascript">
       $(document).ready(function(){
         $("#status1").modal();
          $("#status1").modal("open");
       });
       </script>

       <?php

      if(!empty($_SESSION['confirm_login'])){
        echo $_SESSION['confirm_login'];
        unset($_SESSION['confirm_login']);
        
      }
      ?>
      <script type="text/javascript">
       $(document).ready(function(){
         $("#confirm_login_status").modal();
          $("#confirm_login_status").modal("open");
       });
       </script>

  <br><br><br>
    <!-- Login Starts Here -->
      <form method="post"  action="login.php">
      <div class="login">
          <div class="col s12 center"><h4>Login</h4></div>
        <div class="row">
          <div class="input-field col l4 offset-l4 s12">
            <i class="material-icons prefix">account_circle</i>
            <input name="userid" required id="username" type="text" class="validate">
            <label for="username">Username</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col l4 offset-l4 s12">
            <i class="material-icons prefix">lock</i>
            <input name="password" required id="icon_prefix" type="password" class="validate">
            <label for="icon_prefix">Password</label>
          </div><br>
        </div>
        <div class="row">
          
          <div class="input-field col l4 offset-l4 s12">
            <button class="btn waves-effect waves-light right  " type="submit" name="login">Login
              <i class="material-icons right">send</i>
            </button>
          </div>
        </div>
      </div>
      </form>
  <br><br><br><br><br><br><br>
  <footer class="page-footer teal lighten-2">
    <div class=" col s12 ">
      <div class="row">
        <div class="col s12 ">
          <h5 class="">Company Bio</h5>
          <p class="">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container ">
      Made by <a class="white-text" href="http://materializecss.com">Copyrights Rahul</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
