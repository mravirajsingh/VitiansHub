

<?php
   include('config.php');
   session_start();
   if (!isset($_SESSION['userid']) ||(trim ($_SESSION['userid']) == '')) {
   header('location:index.php');
      exit();
   }
   
   $uquery=mysqli_query($con,"SELECT * FROM `user` WHERE userid='".$_SESSION['userid']."'");
   $urow=mysqli_fetch_assoc($uquery);
   
      $query1="select * from notes";
      $result1=mysqli_query($con,$query1);
      $query2="select * from questions_paper";
      $result2=mysqli_query($con,$query2);
      $query3="select * from company_details";
      $result3=mysqli_query($con,$query3);
      $query4="select * from club_details";
      $result4=mysqli_query($con,$query4);
   
      $count1=0;
      $count2=0;
      $count3=0;
      $count4=0;
      while($row=mysqli_fetch_array($result1)){
          $count1++;
      }
      while($row=mysqli_fetch_array($result2)){
          $count2++;
      }
      while($row=mysqli_fetch_array($result3)){
          $count3++;
      }
      while($row=mysqli_fetch_array($result4)){
          $count4++;
      } 
      
   ?>
<!DOCTYPE html>
<html >
   <head>
      <title>VitiansHub</title>
      <!-- BOOTSTRAP STYLES-->
      <link href="assets/css/bootstrap.css" rel="stylesheet" />
      <!-- FONTAWESOME STYLES-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- CUSTOM STYLES-->
      <link href="assets/css/custom.css" rel="stylesheet" />
      <!-- GOOGLE FONTS-->
      <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
      <link href="assets/image/icon.ico" type="image" rel="icon">
   </head>
   <body>
      <div id="wrapper">
         <img style="width: 260px; id="logo" src="assets/image/logo2.png" alt="logo"  />
         <div style="color: white;padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
            <strong><?php echo $urow['name'];?></strong> &nbsp;&nbsp;&nbsp;
            <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout
            <i class="fa fa-power-off fa-1x"></i>
            </a> 
         </div>
         </nav>   
         <!-- /. NAV TOP  -->
         <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
               <ul class="nav" id="main-menu">
                  <li>
                     <a class="active-menu"  href="dashboard.php"><i class="fa fa-home fa-3x"></i>Home</a>
                  </li>
                  <li>
                     <a  href="questions_paper.php"><i class="fa fa-copy fa-3x"></i>Previous year question</a>
                  </li>
                  <li>
                     <a  href="notes.php"><i class="fa fa-book fa-3x"></i>Notes</a>
                  </li>
                  <li>
                     <a  href="club.php"><i class="fa fa-users fa-3x"></i>Clubs</a>
                  </li>
                  <li>
                     <a  href="placement.php"><i class="fa fa-building fa-3x"></i>Internship & placement</a>
                  </li>
                  <li  >
                     <a   href="messages.php"><i class="fa fa-comments fa-3x" ></i> Messages</a>
                  </li>
               </ul>
            </div>
         </nav>
         <div id="page-wrapper" >
            <div id="page-inner">
               <!-- /. ROW  -->
               <hr />
               <div class="row">
                  <div class="col-md-3 col-sm-6 col-xs-6">
                     <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-red set-icon">
                        <i class="fa fa-comments-o"></i>
                        </span>
                        <div class="text-box" >
                           <p class="main-text"><?php echo $count2;?><img style="width: 30px;" src="assets/image/new_icon.gif" alt="new"  /></p>
                           <p class="text-muted">Questions Paper Uploaded</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-6">
                     <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-green set-icon">
                        <i class="fa fa-bars"></i>
                        </span>
                        <div class="text-box" >
                           <p class="main-text"><?php echo $count1;?><img style="width: 30px;" src="assets/image/new_icon.gif" alt="new"  /></p>
                           <p class="text-muted">Notes uploaded</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-6">
                     <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-blue set-icon">
                        <i class="fa fa-bell-o"></i>
                        </span>
                        <div class="text-box" >
                           <p class="main-text"><?php echo $count3;?><img style="width: 30px;" src="assets/image/new_icon.gif" alt="new"  /></p>
                           <p class="text-muted">Company Updates</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-6">
                     <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-brown set-icon">
                        <i class="fa fa-rocket"></i>
                        </span>
                        <div class="text-box" >
                           <p class="main-text"><?php echo $count4;?><img style="width: 30px;" src="assets/image/new_icon.gif" alt="new"  /></p>
                           <p class="text-muted">Club Updates</p>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /. ROW  -->
               <hr />
            </div>
         </div>
      </div>
      </div>
      <!-- /. PAGE WRAPPER  -->
      </div>
      <!-- /. WRAPPER  -->
   </body>
</html>

