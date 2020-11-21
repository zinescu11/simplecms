<?php
$name = stripslashes(htmlspecialchars(strip_tags($_GET['name'])));
$email = stripslashes(htmlspecialchars(strip_tags($_GET['email'])));
$message = stripslashes(htmlspecialchars(strip_tags($_GET['message'])));
$text = 'Name: '.$name.', E-mail: '.$email.', Message: '.$message;
mail('iamslamduck@gmail.com', 'Message from the website', $text);
echo 'OK';
?>