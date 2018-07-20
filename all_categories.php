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
  <script type="text/javascript">
    $( document ).ready(function() {
     $(".button-collapse").sideNav();
});
  </script>
</head>
<body>
   <nav>
    <div class="nav-wrapper grey lighten-5">
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
    <br><br>
    <a href="blog.php" class="btn waves-effect waves-light left black-text grey lighten-5"><i class="material-icons left">arrow_back</i>Go Back</a><br><br>
        <div class="row">
          <div class="input-field col l4 offset-l4 s12">
            
           <ul class="collection with-header">
        <li class="collection-header grey lighten-5"><h4>Categories</h4></li>
    <?php require 'conn.php';
     $sql="SELECT * from categories ORDER BY datetime desc";
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
    <a href="#" class="collection-item black-text"><?php echo $CategoryName; ?></a>
    <?php } ?>
  </ul>
          </div>
        </div>

  <footer class="page-footer grey lighten-3">
    <div class=" col s12 grey lighten-3">
      <div class="row">
        <div class="col s12 grey lighten-3">
          <h5 class="black-text">Company Bio</h5>
          <p class="black-text">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container black-text">
      Made by <a class="black-text" href="http://materializecss.com">Copyrights Rahul</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
