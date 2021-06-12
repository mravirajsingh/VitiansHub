

<?php
   include ('config.php');
   session_start();
   if(isset($_POST['msg'])){		
   	$msg = addslashes($_POST['msg']);
   	$id = $_POST['id'];
   	date_default_timezone_set('Asia/Kolkata'); 
   	$date=date("Y-m-d h:i:sa");
   	mysqli_query($con,"insert into `chat` (chat_room_id, chat_msg, userid, chat_date) values ('$id', '$msg' , '".$_SESSION['userid']."', '$date')") or die(mysqli_error());
   }
   ?>
<?php
   if(isset($_POST['res'])){
   	$id = $_POST['id'];
   ?>
<?php
   $query=mysqli_query($con,"select * from `chat` left join `user` on user.userid=chat.userid where chat_room_id='$id' order by chat_date asc") or die(mysqli_error());
   while($row=mysqli_fetch_array($query)){
   ?>	
<div>
   <?php echo $row['chat_date']; ?><br>
   <b><?php echo $row['name']; ?> </b>: <?php echo $row['chat_msg']; ?><br>
</div>
<br>
<?php
   }
   }	
   ?>

