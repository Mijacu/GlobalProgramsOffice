<?php
include('session.php');
$key= $_POST['key'];
mysqli_query($db,"DELETE FROM application WHERE ap_id='{$key}'");
?>