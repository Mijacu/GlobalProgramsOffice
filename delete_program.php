<?php
include('session.php');
$programName= $_POST['programName'];
mysqli_query($db,"DELETE FROM program WHERE p_name='{$programName}'");
?>