<?php
include('includes/config.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    mysqli_query($conn,
    "INSERT INTO messages (name,email,subject,message)
    VALUES ('$name','$email','$subject','$message')");

    echo "<script>alert('Message Sent Successfully');window.location='contact.php';</script>";
}
?>