

<?php
   include('config.php');
   session_start();
   if (!isset($_SESSION['userid']) ||(trim ($_SESSION['userid']) == '')) {
   header('location:index.php');
      exit();
   }
   
   $uquery=mysqli_query($con,"SELECT * FROM `user` WHERE userid='".$_SESSION['userid']."'");
   $urow=mysqli_fetch_assoc($uquery);
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
      <script src="assets/javascript.js"></script>	
   </head>
   <style>
      #chat_room {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      }
      #chat_room td, #chat_room th {
      border: 1px solid #ddd;
      padding: 8px;
      }
      #chat_room tr:nth-child(even){background-color: #f2f2f2;}
      /* #chat_room tr:hover {background-color: #ddd;} */
      #chat_room th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
      }
      .send{ /* style for send button */
      background-color: #2980B9; /* Green */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      float:right;
      width: 200px;
      }
      textarea {
      resize: none;
      width: 100%;
      }
   </style>
   <body>
      <div id="wrapper">
         <img style="width: 260px;" id="logo" src="assets/image/logo2.png" alt="logo"  />
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
               <div class="alert alert-info">
                  <h2 style="color:black;">Chat Room</h2>
               </div>
               <table id="chat_room" align="center">
                  <?php
                     $query=mysqli_query($con,"select * from `chat_room`");
                     $row=mysqli_fetch_array($query);
                     ?>
                  <div>
                     <tr>
                        <td>
                           <h3><?php echo $row['chat_room_name']; ?></h3>
                        </td>
                     </tr>
                  </div>
                  <tr>
                     <td>
                        <div id="result" style="overflow-y:scroll; height:300px; width: 100%;"></div>
                        <form class="form">
                           <!--<input type="text" id="msg">--><br/>
                           <textarea id="msg" rows="4" cols="85"></textarea>
                           <br/>
                           <input type="hidden" value="<?php echo $row['chat_room_id']; ?>" id="id">
                           <button type="button" id="send_msg" class="send">Send</button>
                        </form>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
         <!-- /. PAGE WRAPPER  -->
      </div>
      <!-- /. WRAPPER  -->
   </body>
</html>
<script type="text/javascript">
   $(document).keypress(function(e){ //using keyboard enter key
   	displayResult();
   	/* Send Message	*/	
   	
   		if(e.which === 13){ 
   				if($('#msg').val() == ""){
   				alert('Please write message first');
   			}else{
   				$msg = $('#msg').val();
   				$id = $('#id').val();
   				$.ajax({
   					type: "POST",
   					url: "send_message.php",
   					data: {
   						msg: $msg,
   						id: $id,
   					},
   					success: function(){
   						displayResult();
   						$('#msg').val(''); //clears the textarea after submit
   					}
   				});
   			}	
   
   			/* $("form").submit(); 
   			 alert('You press enter key!'); */
   		} 
   	}
   ); 
   
   
   $(document).ready(function(){ //using send button
   	displayResult();
   	/* Send Message	*/	
   		
   		$('#send_msg').on('click', function(){
   			if($('#msg').val() == ""){
   				alert('Please write message first');
   			}else{
   				$msg = $('#msg').val();
   				$id = $('#id').val();
   				$.ajax({
   					type: "POST",
   					url: "send_message.php",
   					data: {
   						msg: $msg,
   						id: $id,
   					},
   					success: function(){
   						displayResult();
   						$('#msg').val(''); //clears the textarea after submit
   					}
   				});
   			}	
   		});
   	/* END */
   	});
   	
   	function displayResult(){
   		$id = $('#id').val();
   		$.ajax({
   			url: 'send_message.php',
   			type: 'POST',
   			async: false,
   			data:{
   				id: $id,
   				res: 1,
   			},
   			success: function(response){
   				$('#result').html(response);
   			}
   		});
   	}
</script>

