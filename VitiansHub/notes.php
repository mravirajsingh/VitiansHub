

<?php
   include('config.php');
   session_start();
   if (!isset($_SESSION['userid']) ||(trim ($_SESSION['userid']) == '')) {
   header('location:index.php');
      exit();
   }
   
   $uquery=mysqli_query($con,"SELECT * FROM `user` WHERE userid='".$_SESSION['userid']."'");
   $urow=mysqli_fetch_assoc($uquery);
   
   $query="select * from notes";
   
   $result=mysqli_query($con,$query);
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
               <
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
            <div class="alert alert-info">
               <h2 style="color:black;">Class Notes</h2>
            </div>
            <div class="table-responsive">
               <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
                  <form action="uploadnotes.php" method="post" enctype="multipart/form-data">
                     <td><input type="text" name="program" class="text"  required="required" placeholder="Program name"></td>
                     <td><input type="text" name="subject" class="text"  required="required" placeholder="Subject name"></td>
                     <td><input type="file" name="file" id="file"  required="required"></td>
                     <td><input type="submit" class="btn btn-primary" value="SUBMIT" name="submit">
                  </form>
                  </tr></td>
               </table>
            </div>
            <div class="col-md-18">
               <div class="container-fluid" style="margin-top:0px;">
                  <div class = "row">
                     <div class="panel panel-default">
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                 <thead>
                                    <tr>
                                       <th>Program</th>
                                       <th>Subject</th>
                                       <th>Uploaded by</th>
                                       <th>Uploaded Date and Time</th>
                                       <th>Preview</th>
                                       <th>Download</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       while($row=mysqli_fetch_array($result))
                                       { 
                                               
                                       ?>  
                                    <tr>
                                       <td><?php echo $row['program']; ?></td>
                                       <td><?php echo $row['subject']; ?></td>
                                       <td><?php echo $row['owner']; ?></td>
                                       <td><?php echo $row['date']; ?></td>
                                       <td><a  href="<?php echo $row['link']; ?>">Click Here </a></td>
                                       <td><a  href="download.php?path=<?php echo $row['link']; ?>">Click Here </a></td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- /. PAGE WRAPPER  -->
      </div>
      <!-- /. WRAPPER  -->
   </body>
</html>

