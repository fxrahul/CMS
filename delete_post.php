<?php 
require 'Functions.php';
confirm_login();
 ?>
<?php
require 'conn.php';



  if(isset($_POST['delete_post'])){
    $PostId=$_POST['id'];
    $Title=mysqli_real_escape_string($conn,$_POST['Title']);
   // $Category=mysqli_real_escape_string($conn,$_POST['Category']);
    $Post=mysqli_real_escape_string($conn,$_POST['Post']);
    date_default_timezone_set("Asia/Kolkata");
    $CurrentTime=time();
    $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
    $Admin_name="Rahul Singh";  
   // $Image=$_FILES['Image']['name'];
   // $Target="img/Uploads/".basename($_FILES['Image']['name']);
    $sql="DELETE FROM admin_panel WHERE id='$PostId'";

    $result=mysqli_query($conn,$sql);
   
   
  //  move_uploaded_file($_FILES['Image']['tmp_name'],$Target);
     // no error
    $msg="Successfully Deleted";
    if(!$result){
      $msg="Something Went Wrong";
    }
    $_SESSION['msg']='<div id="status" class="modal" style="z-index: 1003; display: none; opacity: 0; transform: scaleX(0.7); top: 4%;">
        <div class="modal-content ">
         <h4>Modal Header</h4>
           <p>'.$msg.'</p>
         </div>
         <div class="modal-footer">
            <a href="dashboard.php" class="modal-action modal-close waves-effect waves-green btn-flat ">Ok</a>
         </div>
         </div>';
       // header('Location:dashboard.php');
       // exit;
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

   <div class="row no-margin" style="height:75%">

          <div class="collection hov  col s12 m4 l3 " style="height:100%"> <!-- Note that "m4 l3" was added -->
        <!-- Grey navigation panel

              This content will be:
          3-columns-wide on large screens,
          4-columns-wide on medium screens,
          12-columns-wide on small screens  -->

        
                  <h1>logo</h1>
                <a href="dashboard.php" class="collection-item  imt  ">Dashboard</a>
                <a href="add_new_post.php" class="collection-item   ">Add new post</a>
                <a href="categories.php" class="collection-item  ">Categories</a>
                <a href="manage_admins.php" class="collection-item  ">Manage Admins</a>
                <a href="comments.php" class="collection-item  ">Comments
<?php 
                  //Unapproved badge
                  require 'conn.php';
                  $sql="SELECT COUNT(*) FROM comments WHERE status='OFF' ";
                  $result=mysqli_query($conn,$sql);
                  $results=mysqli_fetch_array($result);
                  $TotalUnApproved=array_shift($results);
                  if($TotalUnApproved>0){
?>
                  <span class="badge orange lighten-2 white-text"><?php echo $TotalUnApproved; ?></span> 
                  <?php } ?>
                </a>
                    <a href="blog.php?Page=1" target="_Blank" class="collection-item  ">Live Blog</a>
                <a href="logout.php" class="collection-item  ">Logout</a>
           

      </div>
      
      <div class="col s12 m8 l9" >

      <h2 class="center">Delete Post</h2>
      <?php 
      require 'conn.php';
      if(isset($_GET['id'])){
        $PostId=mysqli_real_escape_string($conn,$_GET['id']);
      }
        $sql="SELECT * FROM admin_panel WHERE id='$PostId'";
        $result=mysqli_query($conn,$sql);
         while($results=mysqli_fetch_array($result)){
                $TitleToBeUpdated=$results['title'];
                $CategoryToBeUpdated=$results['category'];
                $ImageToBeUpdated=$results['image'];
                $PostToBeUpdated=$results['post'];
                }
      ?> 
    <form class="col s12" method="post" action="delete_post.php" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $PostId; ?>">
        <div class="input-field col l4 offset-l4 s12">
          <input value="<?php echo $TitleToBeUpdated; ?>" id="title" type="text" data-length="200" name="Title" readonly maxlength="200" minlength="2">
          <label for="title">Title</label>
        </div>
     

      
        <div class="input-field col l4 offset-l4 s12">
           <select name="Category" disabled>
            <option  value="" disabled selected>Choose your option</option>
           <?php
          require 'conn.php';
            $sql="SELECT * from categories ORDER BY datetime desc";
            $result=mysqli_query($conn,$sql);
           
            while($results=mysqli_fetch_array($result)){
              $CategoryName=$results['name'];
          ?>
      <option > <?php echo $CategoryName; ?> </option>
      <?php } ?>
    </select>
    <label>Select New Category &nbsp;&nbsp;&nbsp;Existing Category:&nbsp;<?php echo $CategoryToBeUpdated; ?></label>
        </div>
        <div class="input-field col l4 offset-l4 s12">
         <span>Existing Image:</span>
          <img src="img/Uploads/<?php echo $ImageToBeUpdated ?>" width=170px; height=50px >
        </div>
        <div class="file-field input-field col l4 offset-l4 s12">   
      <div class="btn  ">

        <span>Image</span>
        <input disabled type="file" name="Image">
      </div>

      <div class="file-path-wrapper">
        <input class="file-path validate"  readonly placeholder="Choose image" type="text">
      </div>
    </div>
    
      
        <div class="input-field col l4 offset-l4 s12">
          <textarea id="post" data-length&nbsp;<?php echo $CategoryToBeUpdated; ?>="10000" maxlength="10000" readonly name="Post" class="materialize-textarea">
            <?php echo $PostToBeUpdated;?>
          </textarea>
          <label for="post">Post</label>
        </div>
     

         
          <div class="input-field col l4 offset-l4 s12">
            <button class="btn waves-effect waves-light right  " type="submit" name="delete_post">Delete Post
              <i class="material-icons right">send</i>
            </button>
          </div>
        
    </form>
  </div>
</div>
<br>
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
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {
         $('select').material_select();
          });
      </script>
    
    </body>
  </html>