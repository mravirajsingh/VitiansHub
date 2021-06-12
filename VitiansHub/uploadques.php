

<?php
   include("config.php");
   session_start();
   	if (!isset($_SESSION['userid']) ||(trim ($_SESSION['userid']) == '')) {
   	header('location:index.php');
       exit();
   	}
   	
   	$uquery=mysqli_query($con,"SELECT * FROM `user` WHERE userid='".$_SESSION['userid']."'");
   	$urow=mysqli_fetch_assoc($uquery);
   if(isset($_POST['submit']))
   {   	 
        $program = $_POST['program'];
        $subject = $_POST['subject'];
        $year = $_POST['year'];
        date_default_timezone_set('Asia/Kolkata'); 
   	   $date=date("Y-m-d h:i:sa");
        $owner = $urow['name'];
        $targetDir = "upload/";
        $targetFile = $targetDir.basename($_FILES["file"]["name"]);
        $file_tmp = $_FILES["file"]["tmp_name"];
        $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);
        $canUpload = 1;
        //check whether it's doc type
   if($fileType != "pdf")
   {
   //print "<p>". $fileType ."</p>";
   echo '<script>  alert("This is not a pdf file!");
                   window.location.href = "questions_paper.php";
        </script>';
   $canUpload = 0;
   }
   //check whether this file already exists
   
   //check file size
   if($_FILES["file"]["size"] > 10000000)
   {
       echo '<script>  
               alert("File size is too large. It should be less than or equal to 10 MB.");   
               window.location.href = "questions_paper.php";
               </script>';
   $canUpload = 0;
   }
   //upload the file
   if($canUpload == 1)
   {
   move_uploaded_file($file_tmp, $targetFile);
   $sql = "INSERT INTO questions_paper (program,subject,owner,year,date,link) VALUES ('$program', '$subject' , '$owner','$year', '$date', '$targetFile')";
        if (mysqli_query($con, $sql)) {
           header('location:notes.php');
        } else {
           echo "Error: " . $sql . "
   " . mysqli_error($con);
        }
        mysqli_close($con);
   }
        
   }
   ?>

