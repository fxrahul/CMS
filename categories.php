<?php 
require 'Functions.php';
confirm_login();
 ?>
 <?php

 
 if (isset($_POST['add_category'])) {
   require 'conn.php';   
   $CategoryName=mysqli_real_escape_string($conn,$_POST['category_name']);
  
   date_default_timezone_set("Asia/Kolkata");
    $CurrentTime=time();
    $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
    $Admin_name=$_SESSION['user_name'];
    $sql="INSERT into categories VALUES ('','$DateTime','$CategoryName','$Admin_name')";
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

        header('Location:categories.php');
        exit;
  }

  // if(!empty($_SESSION['error'])){// post request get (PRG)
  //   $msg="";
  //   echo "PRG";
  //   if($_SESSION['error']){ // error occured
  //     $msg="error";
  //   }
  //   else{
  //     $msg="success";
  //   }
  //   echo '<div id="status" class="modal" style="z-index: 1003; display: none; opacity: 0; transform: scaleX(0.7); top: 4%;">
  //       <div class="modal-content ">
  //        <h4>Modal Header</h4>
  //          <p>'.$msg.'</p>
  //        </div>
  //        <div class="modal-footer">
  //           <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Ok</a>
  //        </div>
  // </div>
  // <script type="text/javascript">
  //     $(document).ready(function(){
  //        $(".modal").modal();
  //         $("#status").modal("open");
  //     });
  //     </script>';
  // }
    


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
   <!-- <style type="text/css">
        .hov a:hover{
          background-color: #9e9e9e !important;
        }
      </style> -->
</head>
<body>
 <nav>
    <div class="nav-wrapper teal lighten-2">
      <a href="#" class="brand-logo right">Logo</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
       <li><a class="white-text" href="dashboard.php">Home</a></li>
        <li><a class="white-text" href="#">Help</a></li>
        <li><a class="white-text" href="about_us.php">About us</a></li>      </ul>
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
      <div class="row ">

          <div class="col s12 m4 l3 "> <!-- Note that "m4 l3" was added -->
        <!-- Grey navigation panel

              This content will be:
          3-columns-wide on large screens,
          4-columns-wide on medium screens,
          12-columns-wide on small screens  -->

          <div class="collection hov ">
                  <h1>logo</h1>
               <a href="dashboard.php" class="collection-item  imt  ">Dashboard</a>
                <a href="add_new_post.php" class="collection-item   ">Add new post</a>
                <a href="categories.php" class="collection-item active ">Categories</a>
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

      </div>
      <br><br>
      <div class="col s12 m8 l9">

      <h2 class="center">Manage Categories</h2>
       
    <form class="col s12" method="post" action="categories.php">
      <div class="row">
        <div class="input-field col l4 offset-l4 s12">
          <input id="category" type="text" data-length="100" name="category_name" required maxlength="100">
          <label for="category">Category Name</label>
        </div>
      </div>
          <div class="row">
          
          <div class="input-field col l4 offset-l4 s12">
            <button class="btn waves-effect waves-light right  " type="submit" name="add_category">Add new category
              <i class="material-icons right">send</i>
            </button>
          </div>
        </div>
    </form>
  </div>
</div>
<div >


          <table class="responsive-table centered highlight bordered">
        <thead>
          <tr>
              <th>Sr.No</th>
              <th>Date and Time</th>
              <th>Category Name</th>
              <th>Creator Name</th>
              <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php
          require 'conn.php';
            $sql="SELECT * from categories ORDER BY `id` desc";
            $result=mysqli_query($conn,$sql);
            $SrNo=0;
            while($results=mysqli_fetch_array($result)){
              $id=$results['id'];
              $DateTime=$results['datetime'];
              $CategoryName=$results['name'];
              $CreatorName=$results['creatorname'];
              $SrNo++;
          ?>
          <tr>
            <td><?php echo htmlentities($SrNo); ?></td>
            <td><?php echo htmlentities($DateTime); ?></td>
            <td><?php echo htmlentities($CategoryName); ?></td>
            <td><?php echo htmlentities($CreatorName); ?></td>
            <td><a href="delete_category.php?id=<?php echo $id; ?>" class="btn waves-effect waves-light red lighten-2" >Delete</a></td>
          </tr>
          <?php } ?>
        </tbody>

      </table>

</div>
  <br><br><br>
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
     
      <script type="text/javascript" src="js/materialize.min.js"></script>
      
    
    </body>
  </html>
        