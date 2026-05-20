<?php
/* =========================
FILE: contact.php
========================= */

if(isset($_POST['submit'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $to = "pahanweerasuriya07@gmail.com";

  $subject = "Portfolio Contact Message";

  $txt = "Name: ".$name."\n".
         "Email: ".$email."\n\n".
         "Message:\n".$message;

  $headers = "From: ".$email;

  mail($to,$subject,$txt,$headers);

  echo "Message Sent Successfully!";
}

?>