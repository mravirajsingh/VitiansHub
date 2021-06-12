

<?php
   session_start();
   error_reporting(0);
   include("config.php");
   if(isset($_POST['submit']))
   {
   $ret=mysqli_query($con,"SELECT * FROM user WHERE username='".$_POST['username']."' and password='".$_POST['password']."'");
   $num=mysqli_fetch_array($ret);
   if($num>0)
   {
   $extra="dashboard.php";//
   $_SESSION['login']=$_POST['username'];
   $_SESSION['userid']=$num['userid'];
   $host=$_SERVER['HTTP_HOST'];
   $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
   header("location:http://$host$uri/$extra");
   exit();
   }
   else
   {
   $_SESSION['errmsg']="Invalid username or password";
   $extra="index.php";
   $host  = $_SERVER['HTTP_HOST'];
   $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
   header("location:http://$host$uri/$extra");
   exit();
   }
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>VitiansHub : Login</title>
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <!-- FONTAWESOME STYLES-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/styles.css">
      <link href="assets/image/icon.ico" type="image" rel="icon">
   </head>
   </head>
   <body class="login">
      <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
         <h3>Username : user1@vitstudent.ac.in or user2@vitstudent.ac.in</h3>
         <h3>Password : 123456789 or 987654321</h3>
         <div class="logo margin-top-30">
            <img style="width: 300px; id="logo" src="assets/image/logo1.png" alt="logo"  />
            <hr/>
            <h2><b>Admin Login</b></h2>
         </div>
         <div class="box-login">
            <form class="form-login" method="post">
               <fieldset>
                  <legend style="color:#42b0f5; ">
                     <b>Sign in to your account</b>
                  </legend>
                  <p>
                     Enter username<br />
                     <span style="color:#42b0f5;"></span>
                  </p>
                  <div class="form-group">
                     <span class="input-icon">
                     <input type="text" class="form-control" name="username" placeholder="Username">
                     <i class="fa fa-user"></i> </span>
                  </div>
                  Enter password
                  <div class="form-group form-actions">
                     <span class="input-icon">
                     <input type="password" class="form-control password" name="password" placeholder="Password"><i class="fa fa-lock"></i>
                     </span>
                  </div>
                  <div class="form-actions">
                     <button style="background-color:#42b0f5; "type="submit" class="btn btn-primary pull-right" name="submit">
                     Login <i class="fa fa-arrow-circle-right"></i>
                     </button>
                  </div>
               </fieldset>
            </form>
         </div>
      </div>
      <div style="float: right; margin-top: 680px; margin-right: 20px;">
      <a   href="contact.php"><i class="fa fa-comments fa-5x" ></i></a>
      <div>
   </body>
   <!-- end: BODY -->
</html>

