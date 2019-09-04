<?php
    include('session.php');
    $status= $_POST['status'];
    $ap_id=$_POST['ap_id'];
    mysqli_query($db,"UPDATE application SET ap_status='{$status}' WHERE ap_id={$ap_id}");
    echo "$status";
?>