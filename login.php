<?php
require('db.inc.php');
$msg="";
if(isset($_POST['email']) && isset($_POST['password'])){
   $email=mysqli_real_escape_string($con,$_POST['email']);
   $password=mysqli_real_escape_string($con,$_POST['password']);
   $res=mysqli_query($con,"select * from drivers where email='$email' and password='$password'");
   $count=mysqli_num_rows($res);
   if($count>0){
      $row=mysqli_fetch_assoc($res);
      $_SESSION['ROLE']=$row['role'];
      $_SESSION['USER_ID']=$row['id'];
      $_SESSION['USER_NAME']=$row['name'];
      header('location:index.php');
      die();
   }else{
      $msg="Please enter correct login details";
   }
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/stylecss">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
   <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
   <script src="https://kit.fontawesome.com/a81368914c.js"></script>
   </head>
   <body class="bg-white">
      <img class="wave" src="img/wave.png">
      <div class="container">
      <div class="">
         <img src="images\royal.png" align="align-content-center">
      </div>
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
                  <form method="post">
                      <center><img src="avatar.svg" width="200" height="200" ></center>
               <h2><font size="4"><center>WELCOME</center></font></h2>
                     <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                     </div>
                     <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">LOGIN</button>
                <div class="result_msg"><?php echo $msg?></div>
                   </div>
               </div>
              
               </form>
               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
      <script type="text/javascript" src="js/main.js"></script>
   </body>