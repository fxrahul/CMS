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
	<div class="row">

     <!-- Note that "m4 l3" was added -->
        <!-- Grey navigation panel

              This content will be:
          3-columns-wide on large screens,
          4-columns-wide on medium screens,
          12-columns-wide on small screens  -->

          <div class="collection hov  col s12 m5 l2">
          				<h1>logo</h1>
				        <a href="dashboard.php" class="collection-item  imt  ">Dashboard</a>
                <a href="add_new_post.php" class="collection-item   ">Add new post</a>
                <a href="categories.php" class="collection-item  ">Categories</a>
                <a href="manage_admins.php" class="collection-item  ">Manage Admins</a>
                <a href="comments.php" class="collection-item active ">Comments
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
            <
              This content will be:
          9-columns-wide on large screens,
          8-columns-wide on medium screens,
          12-columns-wide on small screens  -->
          <h3 class="center">Un-Approved Comments</h3>
          <table class="responsive-table bordered centered highlight">
        <thead>
          <tr>
              <th>No</th>
              <th>Name</th>
              <th>Date</th>
              <th>Comment</th>
              <th>Approve</th>
              <th>Delete Comment</th>
              <th>Details</th>
              
          </tr>
        </thead>
        <tbody>
           <?php
              require 'conn.php';
              $sql="SELECT * from comments WHERE status='OFF' ORDER BY `datetime` desc";
              $result=mysqli_query($conn,$sql);
               $SrNo=0;
              while($results=mysqli_fetch_array($result)){
                $DateTime=$results['datetime'];
                $CommentId=$results['id'];
                $PersonName=$results['name'];
                $PersonComment=$results['comment'];
                $CommentedPostId=$results['admin_panel_id'];
                 $SrNo++;
                ?>
          <tr>
           <td><?php echo htmlentities($SrNo); ?></td>
            <td style="color: #5e5eff;"><?php 
            if(strlen($PersonName)>10){
              $PersonName=substr($PersonName,0,10).'..';
            }
            echo htmlentities($PersonName); ?></td>
            <td><?php echo htmlentities($DateTime);  ?></td>
            <td><?php 
             if(strlen($PersonComment)>18){
              $PersonComment=substr($PersonComment,0,18).'..';
            }
            echo htmlentities($PersonComment);  ?></td>
            <td><a  href="approve_comment.php?id=<?php echo $CommentId; ?>" class="btn waves-effect waves-light orange lighten-2  " >Approve</a> </td>
            <td><a  href="delete_comment.php?id=<?php echo $CommentId; ?>" class="btn waves-effect waves-light  red lighten-2 " >Delete</a></td>
           <td><a  href="full_post.php?id=<?php echo $CommentedPostId; ?>"> <span class="btn waves-effect waves-light " target="_blank" >Live Preview</span></a></td>
          </tr>
            <?php } ?>
        </tbody>
      </table>

        <h3 class="center">Approved Comments</h3>
          <table class="responsive-table bordered centered highlight">
        <thead>
          <tr>
              <th>No</th>
              <th>Name</th>
              <th>Date</th>
              <th>Comment </th>
              <th>Approved By</th>
              <th>Revert Approve</th>
              <th>Delete Comment</th>
              <th>Details</th>
              
          </tr>
        </thead>
        <tbody>
           <?php
              require 'conn.php';
              $sql="SELECT * from comments WHERE status='ON' ORDER BY `datetime` desc";
              $result=mysqli_query($conn,$sql);
               $SrNo=0;
               $Admin='Rahul Singh';
              while($results=mysqli_fetch_array($result)){
                $DateTime=$results['datetime'];
                $CommentId=$results['id'];
                $PersonName=$results['name'];
                $PersonComment=$results['comment'];
                $ApprovedBy=$results['approvedby'];
                $CommentedPostId=$results['admin_panel_id'];
                 $SrNo++;
                ?>
          <tr>
            <td><?php echo htmlentities($SrNo); ?></td>
            <td style="color: #5e5eff;"><?php 
            if(strlen($PersonName)>10){
              $PersonName=substr($PersonName,0,10).'..';
            }
            echo htmlentities($PersonName); ?></td>
            <td><?php echo htmlentities($DateTime);  ?></td>
            <td><?php 
             if(strlen($PersonComment)>18){
              $PersonComment=substr($PersonComment,0,18).'..';
            }
            echo htmlentities($PersonComment);  ?></td>
            <td><?php echo htmlentities($ApprovedBy); ?></td>
            <td><a  href="dis_approve_comment.php?id=<?php echo $CommentId; ?>" class="btn waves-effect waves-light  orange lighten-2 " >Dis-Approve</a> </td>
            <td><a  href="delete_comment.php?id=<?php echo $CommentId; ?>" class="btn waves-effect waves-light  red lighten-2 " >Delete</a></td>
            <td><a  href="full_post.php?id=<?php echo $CommentedPostId; ?>"> <span class="btn waves-effect waves-light " target="_blank" >Live Preview</span></a></td>
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
  </html