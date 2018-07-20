<?php
session_start();
require 'conn.php';
  if(isset($_POST['add_comment'])){
    $Name=mysqli_real_escape_string($conn,$_POST['full_name']);
    $Email=mysqli_real_escape_string($conn,$_POST['email']);
    $Comments=mysqli_real_escape_string($conn,$_POST['comments']);
    $Status='OFF';
    date_default_timezone_set("Asia/Kolkata");
    $CurrentTime=time();
    $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime); 
     $PostId=$_GET['id'];
    $sql="INSERT into comments VALUES ('','$DateTime','$Name','$Email','$Comments','Pending','$Status','$PostId')";
    $result=mysqli_query($conn,$sql);
   
     // no error
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
          header('Location:full_post.php?id='.$PostId);
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
  <style type="text/css">
    .comment-block{
      background-color: #f6f7f9;
    }
    .comment-info{
      color:#365899;
      font-family:sans-serif;
      font-size: 1.1em;
      font-weight: bold;
      padding-top: 10px;
    }
    .description{
      color:#868686;
      font-weight: bold;
      margin-top: -2px;
    }
    .Commnt{
      margin-top: -2px;
      padding-bottom: 10px;
      font-size: 1.1em;
    }
  </style>
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
  <?php

      if(!empty($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        
      }
      ?>
       <script type="text/javascript">
       $(document).ready(function(){
         $("#status").modal();
          $("#status").modal("open");
       });
       </script>
       
  <div class="container  grey-lighten-5" style="margin-left: 1%">
    <h4>The Complete Responsive CMS Blog</h4>
    <h5>The Complete Blog by R.A.S.S </h5>
  </div> 
<br>
<div class="row">
  <div class="col s12">
                  <?php
              require 'conn.php';
              if(isset($_GET['search_btn'])){
                $SearchText=mysqli_real_escape_string($conn,$_GET['search_content']);
                $sql="SELECT * FROM admin_panel WHERE datetime LIKE '%$SearchText%' OR title LIKE '%$SearchText%' OR category LIKE '%$SearchText%' OR post LIKE '%$SearchText%' ";
                   ?> <a href="blog.php" class="btn waves-effect waves-light left  "><i class="material-icons left">arrow_back</i>Go Back</a><br><br> <?php
              }else{
                $PostId=$_GET['id'];
              $sql="SELECT * from admin_panel WHERE id=$PostId ORDER BY datetime desc";
               }
             $result=mysqli_query($conn,$sql);
              while($results=mysqli_fetch_array($result)){
                $DateTime=$results['datetime'];
                $PostId=$results['id'];
                $Title=$results['title'];
                $Category=$results['category'];
                $Author=$results['author'];
                $Image=$results['image'];
                $Post=$results['post'];
              ?>
              <a href="blog.php" class="btn waves-effect waves-light left  "><i class="material-icons left">arrow_back</i>All Blog</a><br><br><br>
          <div class="card">
              <span class="card-title comment-info">Title:&nbsp;<?php echo htmlentities($Title); ?></span>
            <div class="card-image">
              <img src="img/Uploads/<?php echo $Image ?>">
            </div>
            <div class="card-content">
              <span class="comment-info">Author: &nbsp;<?php echo htmlentities($Author); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
              <span class="description">Category: &nbsp;<?php echo htmlentities($Category); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
              <span class="description">Published on:&nbsp;<?php echo htmlentities($DateTime); ?></span>
              
            </div>
          </div>
          
  </div>
  <div class="col s12">
   <p class="Commnt">Post: <br><?php
                    echo nl2br($Post);
               ?></p>
  </div>
  <hr>
  <?php } ?>
   <div class="row">
    <div class="col s12">
      <?php
        require 'conn.php';
        $PostIdForComments=$_GET['id'];
        $sql="SELECT * FROM comments WHERE admin_panel_id='$PostIdForComments' AND status='ON' ORDER BY `datetime` desc";
        $result=mysqli_query($conn,$sql);
        while($results=mysqli_fetch_array($result)){
          $CommentorName=$results['name'];
          $DateTime=$results['datetime'];
          $Comments=$results['comment'];
        
      ?>
      <div class="comment-block">
        <img class="left" style="margin-left: 10px; margin-top: 10px;" src="img/comment.png" width="70px"; height="100px";>
        <p class="comment-info" style="margin-left: 90px;">
          <?php echo $CommentorName; ?>
        </p>
        <p class="description" style="margin-left: 90px;">
          <?php echo $DateTime; ?>
        </p>
        <p class="Commnt" style="margin-left: 90px;">
          <?php echo nl2br($Comments); ?>
        </p>
      </div>
      <br>
      <hr>
      <?php } ?>
    </div>
    <form  method="post" action="full_post.php?id=<?php echo $PostId; ?>">
     <div class="col s12 center"> <h4 class="responsive">Share Your Thoughts About This Topic</h4></div><br>
    <div class="col s12 center"><h5>Comments</h5></div><br><br>
      <div class="row">
        <div class="input-field col l4 offset-l4 s12">
          <input  id="full_name" type="text" name="full_name" class="validate" required>
          <label for="full_name">Name</label>
        </div>
         <div class="input-field col l4 offset-l4 s12">
          <input id="email" type="email" class="validate" name="email" required>
          <label for="email" data-error="wrong" data-success="right">Email</label>
        </div>
          <div class="input-field col l4 offset-l4 s12">
          <textarea id="comments" data-length="500" maxlength="500" required name="comments" required class="materialize-textarea"></textarea>
          <label for="comments">Comments</label>
        </div>
        <div class="input-field col l4 offset-l4 s12">
            <button class="btn waves-effect waves-light right " type="submit" name="add_comment">Add Comment
              <i class="material-icons right">send</i>
            </button>
          </div>
      </div>
      </div>
    </form>
  </div>

</div>


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
