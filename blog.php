
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
    <div class="nav-wrapper teal lighten-2 ">
      <a href="#" class="brand-logo right">Logo</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="left hide-on-med-and-down ">
        <li><a class="white-text" href="blog.php">Home</a></li>
        <li><a class="white-text" href="login.php">Login</a></li>
        <li><a class="white-text" href="chatbot.php">Help</a></li>
        <li><a class="white-text" href="about_us.php">About us</a></li>
        
        <li><a  class="modal-trigger white-text" href="#modal1">Search</a></li>
        <!-- Modal Structure -->
  
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a  href="index.php">Home</a></li>
        <li><a  href="login.php">Login</a></li>
        <li><a  href="#">Services</a></li>
        <li><a  href="about_us.php">About us</a></li>
        
        <li><a class="modal-trigger" href="#modal1">Search</a></li>
             <!-- Modal Structure -->
  </ul>
  </nav>
  <div id="modal1" class="modal";">
    
        <div class="modal-content">
          <h4>Search</h4>
          <form action="blog.php">
          <div class="row" id="search_input">
            <div class="input-field col l12  m12 s12">
              <input id="search_content" type="text" name="search_content">
              <label for="search_content">Enter Here</label>
            </div>

            <div class="input-field col l4 offset-l4 s12">
            <button class="btn waves-effect waves-light right  " name="search_btn">Go
              <i class="material-icons right">send</i>
            </button>
          </div>
          </div>
        </form>
        </div>
  </div>

  <!-- Modal for All Categories -->
    <div id="modal2" class="modal modal-fixed-footer";">
    
        <div class="modal-content">
           <div class="row">
          <div class="input-field col l4 offset-l4 s12">
            
           <ul class="collection with-header">
        <li class="collection-header "><h4>Categories</h4></li>
    <?php require 'conn.php';
   
     $sql="SELECT * from categories ORDER BY `datetime` desc";
            $result=mysqli_query($conn,$sql);
            while($results=mysqli_fetch_array($result)){
              $CategoryName=$results['name'];
              
     ?>
    <!-- Categories -->
    <!-- <li class="collection-item avatar">
      <i class="material-icons circle green">list</i>
      <span class="title"></span>
      <a href="post_acc_to_categories.php" class="secondary-content"><i class="material-icons">arrow_forward</i></a>
    </li> -->
    <a href="blog.php?category=<?php echo $CategoryName; ?>" class="collection-item "><?php echo $CategoryName; ?></a>
    <?php } ?>
  </ul>
          </div>
        </div>
        </div>
          <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
    </div>
  </div> 

  <!--Modal ends here-->


  <div class="container" style="margin-left: 1%">
    <h4>The Complete Responsive CMS Blog</h4>
    <h5>The Complete Blog by R.A.S.S </h5>
  </div> 
<br>
<div class="row">
  <div class="col s12 m8 l9">
                  <?php
              require 'conn.php';
              if(isset($_GET['search_btn'])){
                $SearchText=mysqli_real_escape_string($conn,$_GET['search_content']);
                $sql="SELECT * FROM admin_panel WHERE datetime LIKE '%$SearchText%' OR title LIKE '%$SearchText%' OR category LIKE '%$SearchText%' OR post LIKE '%$SearchText%' ORDER BY `id` desc";
                   ?> <a href="blog.php" class="btn waves-effect waves-light left  "><i class="material-icons left">arrow_back</i>Go Back</a><br><br> <?php
              }
              elseif(isset($_GET['category'])) {
                $CategoryName=mysqli_real_escape_string($conn,$_GET['category']);
                $sql="SELECT * from admin_panel WHERE category='$CategoryName' ORDER BY `id` desc";
                ?> <a href="blog.php" class="btn waves-effect waves-light left  "><i class="material-icons left">arrow_back</i>Go Back</a><br><br> <?php
              }elseif(isset($_GET['Page'])) {
                $Page=$_GET['Page'];
                if($Page<1 || $Page==0){
                  $ShowPostFrom=0;
                }else{
                $ShowPostFrom=($Page*5)-5;
                }
                $sql="SELECT * from admin_panel ORDER BY `id` desc LIMIT $ShowPostFrom,5";
              }
              else{
              $sql="SELECT * from admin_panel ORDER BY `id` desc LIMIT 0,3";
              ?> 
              <a href="blog.php?Page=1" class="btn waves-effect waves-light left  "><i class="material-icons left"></i>See All Blogs</a><br><br>
              <?php 
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
          <div class="card large">
              <span class="card-title comment-info ">Title:&nbsp;<?php echo htmlentities($Title); ?></span>
            <div class="card-image">
              <img src="img/Uploads/<?php echo $Image ?>">
            </div>
            <div class="card-content">
              <span class="comment-info">Author: &nbsp;<?php echo htmlentities($Author); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
              <span class="description">Category: &nbsp;<?php echo htmlentities($Category); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
              <span class="description">Published on:&nbsp;<?php echo htmlentities($DateTime); ?></span>
               <?php 
                  //approved badge
                  require 'conn.php';
                  $sql1="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$PostId' and status='ON' ";
                  $result1=mysqli_query($conn,$sql1);
                  $results1=mysqli_fetch_array($result1);
                  $TotalApproved1=array_shift($results1);
                  if($TotalApproved1>0){
                  ?>
                  <span class="badge grey white-text valign-wrapper">
                    Comments:<?php echo $TotalApproved1; ?>
                    </span> 
                  <?php } ?>
              <p class="Commnt"><?php
                    if(strlen($Post)>150){$Post=substr($Post,0,150);}
                    echo $Post;
               ?></p>
            </div>
            <div class="card-action ">
              <a href="full_post.php?id=<?php echo $PostId; ?>">Read Full Post</a>
            </div>
          </div>
          <?php } ?>
            <ul class="pagination center">
              <?php
              if(isset($Page)){
              if($Page>1){
                ?>
                <li ><a href="blog.php?Page=<?php echo $Page-1; ?>"><i class="material-icons">chevron_left</i></a></li>
            <?php 
              }
             } ?>
              
          <?php
          require 'conn.php';
  //          <ul class="pagination center">
  //   <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
  //   <li class="active teal lighten-2"><a class="" href="#!">1</a></li>
  //   <li class="waves-effect"><a href="#!">2</a></li>
  //   <li class="waves-effect"><a href="#!">3</a></li>
  //   <li class="waves-effect"><a href="#!">4</a></li>
  //   <li class="waves-effect"><a href="#!">5</a></li>
  //   <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
  // </ul>
           $querypagination="SELECT COUNT(*) FROM admin_panel";
           $executepagination=mysqli_query($conn,$querypagination);
           $rowpagination=mysqli_fetch_array($executepagination);
           $TotalPost=array_shift($rowpagination);
           $PostPerPage=$TotalPost/5;
           $PostPerPage=ceil($PostPerPage);
           for($i=1;$i<=$PostPerPage;$i++){
            if(isset($Page)){
            if($i==$Page){
        ?>
      
         <li class="waves-effect active teal lighten-2"><a href="blog.php?Page=<?php echo $i; ?> "> <?php echo $i; ?> </a></li>
        <?php
          }else{?>
              <li class="waves-effect "><a href="blog.php?Page=<?php echo $i; ?> "> <?php echo $i; ?> </a></li>
          <?php
         }
         }
         } ?>
              <?php
              if(isset($Page)){
              if($Page+1<=$PostPerPage){
                ?>
                <li ><a href="blog.php?Page=<?php echo $Page+1; ?>"><i class="material-icons">chevron_right</i></a></li>
            <?php 
              }
             } ?>
        </ul>
  </div>
  <div class="col s12 m4 l3">

    <!-- About Me -->
      <ul class="collection with-header ">
        <li class="collection-header center"><h4>About Me</h4><img style="padding-left:5%; " src="img/comment.png" alt="" class="circle" width="100px"; height="100px";><br>
                    We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.
        

        </li>
  

        

      </ul>


    <ul class="collection with-header">
        <li class="collection-header"><h4>Categories</h4></li>
    <?php require 'conn.php';
     $sql="SELECT * from categories ORDER BY datetime desc";
            $result=mysqli_query($conn,$sql);

           $j=1;
            while($j<=4 && $results=mysqli_fetch_array($result)){
              $CategoryName=$results['name'];
              $j++;
              
     ?>
    <!-- Categories -->
    <!-- <li class="collection-item avatar">
      <i class="material-icons circle green">list</i>
      <span class="title"></span>
      <a href="post_acc_to_categories.php" class="secondary-content"><i class="material-icons">arrow_forward</i></a>
    </li> -->
    <a href="blog.php?category=<?php echo $CategoryName; ?>" class="collection-item "><?php echo $CategoryName; ?></a>
    <?php } ?>
   <li>
     <a href="#modal2" class="collection-item  modal-trigger" >See All Categories</a>
   </li>
  </ul>


       <!-- Recent Posts -->

       <ul class="collection with-header">
        <li class="collection-header"><h4>Recent Posts</h4></li>

       <?php require 'conn.php';
     $sql="SELECT * from admin_panel ORDER BY datetime desc";
            $result=mysqli_query($conn,$sql);
            $i=1;
            while($i<=4 && $results=mysqli_fetch_array($result)){
              $DateTime=$results['datetime'];
                $PostId=$results['id'];
                $Title=$results['title'];
                $Category=$results['category'];
                $Author=$results['author'];
                $Image=$results['image'];
                $Post=$results['post'];
                $i++;
     ?>

        <li class="collection-item avatar">
      <img src="img/Uploads/<?php echo $Image ?>" alt="" class="circle">
      <span>Title:&nbsp;<?php echo htmlentities($Title);?></span><br>
      <span>Published By: &nbsp;<?php echo htmlentities($Author); ?></span>&nbsp;
      <p><?php
                    if(strlen($Post)>50){$Post=substr($Post,0,50).'..';}
                    echo $Post;
               ?>

      </p>
      <a href="full_post.php?id=<?php echo $PostId; ?>" class="secondary-content"><i class="material-icons">arrow_forward</i></a>
    </li>
    <?php } ?>
  </ul>

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
  <script type="text/javascript">
      $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
      $('.modal').modal();
  });
      </script>
  </body>
</html>
