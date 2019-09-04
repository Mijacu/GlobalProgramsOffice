<?php
include('session.php');
$email= $_POST['email'];
mysqli_query($db,"DELETE FROM user WHERE u_email='{$email}'");
?>