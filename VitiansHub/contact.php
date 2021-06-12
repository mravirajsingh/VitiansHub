

<!DOCTYPE html>
<html>
   <head>
      <title>VitiansHub</title>
   </head>
   <style>
      input[type=email],input[type=file],input[type="text"], textarea {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      }
      input[type=submit] {
      width: 100%;
      background-color: #11898d;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      }
      button[type=submit]:hover {
      background-color: #1a645a;
      }
      div {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
      height: 800px;
      }
      body{
      background-color: #aa9b9b;
      }
   </style>
   <body>
      <?php
         if(isset($_POST['sendmail'])) {
         require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
         require '/usr/share/php/libphp-phpmailer/class.smtp.php';
         require 'credential.php';
         $mail = new PHPMailer;
         $mail->setFrom(EMAIL, 'Contact form');
         $mail->addAddress(EMAIL);
         $mail->Subject = $_POST['subject'];
         $mail->Body = "
         <html>
         <head>
         
         </head>
         <body>
         <div style='height:210px;'>
         <table width='800' border='1' cellspacing='0' cellpadding='8' bordercolor='#CCCCCC'>
         <tr>
         <td colspan='2' bgcolor='yellow'><strong>Applicant Details</strong></td>
         </tr>
         <tr>
         <td width='168' ><strong>Name</strong></td>
         <td width='290' >".$_POST['name']."</td>
         </tr>
         <tr><td ><strong>Subject</strong></td>
         <td >".$_POST['email']."</td>
         </tr>
         <tr>
         <td ><strong>Message</strong></td>
         <td >".$_POST['message']."</td>
         </tr>
         </table>
         </div>
         </body>
         </html>";
         $mail->AltBody = $_POST['message'];
         for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) {
         $mail->addStringAttachment(file_get_contents($_FILES['file']['tmp_name'][$i]),
         $_FILES['file']['name'][$i]); // Optional name
         }
         $mail->IsSMTP();
         $mail->SMTPSecure = 'ssl';
         $mail->Host = 'ssl://smtp.gmail.com';
         $mail->SMTPAuth = true;
         $mail->Port = 465;
         $mail->Username = EMAIL;
         $mail->Password = PASS;
         if(!$mail->send()) {
         echo 'Email is not sent.';
         echo 'Email error: ' . $mail->ErrorInfo;
         } else {
         echo 'Email has been sent.';
         }
         }
         ?>
      <div style="margin:auto;width:50%;">
         <h1 class="text-center">Contact us</h1>
         <span style="float: right;">
         <a   href="index.php">Login Page</a>
         </span><br>
         <hr>
         <form role="form" method="post" enctype="multipart/form-data">   
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" maxlength="50">
            <br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" maxlength="50">
            <br><br>
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" placeholder="Your Subjet Here" maxlength="50">
            <br><br>
            <label for="name">Message:</label>
            <textarea type="textarea" id="message" name="message" placeholder="Your Message Here" maxlength="6000" rows="4"></textarea>
            <br><br><label for="name">Your Id Card:</label>
            <input name="file[]" multiple="multiple" type="file" id="file">
            <br>
            <input type="submit" name="sendmail" value="Send Mail">
         </form>
      </div>
   </body>
</html>

