<?php 
require 'Functions.php';
confirm_login();
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
   <!--Import jQuery before materialize.js-->
  
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript">
    $( document ).ready(function() {
     $(".button-collapse").sideNav();
});
  </script>
      <style type="text/css">
        .hov a:hover{
          background-color: #9e9e9e !important;
        }
         html{
          height:100%;
        }
        body{
         
          min-height: 100%;
      
        }
      </style>
      
      <!--Let browser know website is optimized for mobile-->
      
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

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
        <li><a  href="dashboard.php">Home</a></li>
        <li><a  href="chatbot.php">Help</a></li>
        <li><a  href="about_us.php">About us</a></li>
      </ul>
    </div>
  </nav>
   <?php

      if(!empty($_SESSION['login_msg'])){
        echo $_SESSION['login_msg'];
        unset($_SESSION['login_msg']);
        
      }
      ?>

      <script type="text/javascript">
       $(document).ready(function(){
         $("#login_status").modal();
          $("#login_status").modal("open");
       });
       </script>
	<div class="row">

     <!-- Note that "m4 l3" was added -->
        <!-- Grey navigation panel

              This content will be:
          3-columns-wide on large screens,
          4-columns-wide on medium screens,
          12-columns-wide on small screens  -->

          <div class="collection hov  col s12 m5 l2">
          				<h1>logo</h1>
				       <a href="dashboard.php" class="collection-item  imt active  ">Dashboard</a>
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

   

      <div class="col s12 m9 l10"> <!-- Note that "m8 l9" was added -->
        <!-- Teal page content

              This content will be:
          9-columns-wide on large screens,
          8-columns-wide on medium screens,
          12-columns-wide on small screens  -->
                <h3 class="center">Manage Dashboard</h3>
               <table class="responsive-table bordered centered highlight">
        <thead>
          <tr>
              <th>No</th>
              <th>Post Title</th>
              <th>Date and Time</th>
              <th>Author</th>
              <th>Category</th>
              <th>Banner</th>
              <th>Comments</th>
              <th>Action</th>
              <th>Details</th>
          </tr>
        </thead>
        <tbody>
           <?php
              require 'conn.php';
              $sql="SELECT * from admin_panel ORDER BY `id` desc ";
              $result=mysqli_query($conn,$sql);

               $SrNo=0;
               
              while($results=mysqli_fetch_array($result)){
                $DateTime=$results['datetime'];
                $PostId=$results['id'];
                $Title=$results['title'];
                $Category=$results['category'];
                $Author=$results['author'];
                $Image=$results['image'];
                $Post=$results['post'];
                 $SrNo++;
                ?>
          <tr>
            <td><?php echo $SrNo; ?></td>
            <td><?php
            if(strlen($Title)>22){$Title=substr($Title, 0,15).'..';}
             echo htmlentities($Title); 
             ?></td>
            <td><?php
            if(strlen($DateTime)>11){$DateTime=substr($DateTime, 0,11).'..';}
             echo htmlentities($DateTime); 
             ?></td>
            <td><?php
            if(strlen($Author)>6){$Author=substr($Author, 0,6).'..';}
             echo htmlentities($Author);
              ?></td>
            <td><?php
            if(strlen($Category)>8){$Category=substr($Category, 0,8).'..';}
             echo htmlentities($Category); 
             ?></td>
            <td><img src="img/Uploads/<?php echo $Image; ?>" width="120px"; height="50px"></td>
            <td>
              
               <?php 
                  //approved badge
                  require 'conn.php';
                  $sql1="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$PostId' and status='ON' ";
                  $result1=mysqli_query($conn,$sql1);
                  $results1=mysqli_fetch_array($result1);
                  $TotalApproved1=array_shift($results1);
                  if($TotalApproved1>0){
                  ?>
                  <span class="badge green white-text valign-wrapper">
                    <?php echo $TotalApproved1; ?>
                    </span> 
                  <?php } ?>

                   <?php 
                  //Unapproved badge
            
                  $sql2="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$PostId' and status='OFF' ";
                  $result2=mysqli_query($conn,$sql2);
                  $results2=mysqli_fetch_array($result2);
                  $TotalUnApproved2=array_shift($results2);
                  if($TotalUnApproved2>0){
                  ?>
                  <span class="badge red lighten-2 white-text"><?php echo $TotalUnApproved2; ?></span> 
                  <?php } ?>

            </td>
            <td>
            <a  href="edit_post.php?id=<?php echo $PostId; ?>" class="btn waves-effect waves-light  orange lighten-2 " >Edit</a> 
            <a  href="delete_post.php?id=<?php echo $PostId; ?>" class="btn waves-effect waves-light  red lighten-2 " >Delete</a>
            
          </td>

            <td><a  href="full_post.php?id=<?php echo $PostId; ?>"> <span class="btn waves-effect waves-light   " >Live Preview</span></a></td>
          </tr>
            <?php } ?>
        </tbody>
      </table>
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

  <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
     <script src="js/init.js"></script>
    </body>
  </html