<?php 

function Login_Attempt($Username,$Password){
	require 'conn.php';
	$HashPassword=md5($Password);
	$sql="SELECT * FROM registration WHERE username='$Username' AND password='$HashPassword' ";
	$result=mysqli_query($conn,$sql);
	if($admin=mysqli_fetch_array($result)){
		return $admin;
	}else{
		return null;
	}
}
function Login(){
	session_start();
	if(isset($_SESSION['user_id'])){
		return true;
	}
}

function confirm_login(){
	if(!Login()){
		$msg='Login Required!';
		 $_SESSION['confirm_login']='<div id="confirm_login_status" class="modal" style="z-index: 1003; display: none; opacity: 0; transform: scaleX(0.7); top: 4%;">
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