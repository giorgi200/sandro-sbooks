<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <!-- Meta -->
    <meta name="author" content="giorgi qochiashvili">

    <title>LOGIN</title>

    <!-- vendor css -->
    <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../lib/Ionicons/css/ionicons.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="../css/bracket.css">
    <link rel="stylesheet" href="../css/bracket.dark.css">
  </head>

  <body>
    
    <div class="d-flex align-items-center justify-content-center ht-100v">
      <img src="https://images2.alphacoders.com/261/thumb-1920-26102.jpg" class="wd-100p ht-100p object-fit-cover" alt="">
      <div class="overlay-body bg-black-6 d-flex align-items-center justify-content-center">
        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 rounded bd bd-white-2 bg-black-7">
          <div class="signin-logo tx-center tx-28 mg-b-30 tx-bold tx-white"><span class="tx-normal">[</span> sandros <span class="tx-info">books</span> <span class="tx-normal">]</span></div>
          <div class="tx-white-5 tx-center mg-b-60"><?php echo $alert?></div>

          <form action="login.php" method="post">
            <div class="form-group">
              <input type="text" name="user_name" class="form-control fc-outline-dark" >
            </div><!-- form-group -->
            <div class="form-group">
              <input type="password" name="user_pass" class="form-control fc-outline-dark" >
            </div><!-- form-group -->
            <button type="submit" name="login" class="btn btn-info btn-block">შესვლა</button>
          </form>  
        </div><!-- login-wrapper -->
      </div><!-- overlay-body -->
    </div><!-- d-flex -->
    <?php
include("layout/connect.php"); /* connect database*/

if (isset($_POST['login'])){
	$user_name=mysqli_real_escape_string($connect,$_POST['user_name']);
	$user_pass=mysqli_real_escape_string($connect,$_POST['user_pass']);
	$encrypt=md5($user_pass);

	$admin_query="SELECT * FROM cp_user WHERE cpu_name='$user_name' AND cpu_pass='$encrypt'";
	$result=mysqli_query($connect,$admin_query);
	if (mysqli_num_rows($result)>0){
		$_SESSION['user_name']=$user_name;
		echo "<script>window.open('index.php','_self')</script>";
	}
	else{
		echo "<script>alert('პაროლი არასწორია!')</script>";
	}
}






?>
    <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>

  </body>
</html>
