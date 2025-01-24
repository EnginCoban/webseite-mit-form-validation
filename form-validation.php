<?php 
$name = $_POST['name'] ;
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
$headers = $email;
mail('enginstgt@hotmail.de',$subject,$message,$headers);
?>