<?php
session_start();
$name= $_GET['name'];
$email= $_GET['email'];
$subject= $_GET['subject'];
$messege= $_GET['messege'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<!-- <div><?php echo $name ;?></div>
<div><?php echo $email ;?></div>
<div><?php  echo $subject ;?></div>
<div><?php echo $messege ;?></div> -->
<!-- <div>
Received Data: {{ $data }}
</div> -->
</body>
</html>