<?php
if($_SESSION['type'] !="staff"){
    header("location: index.html");
}
$result = mysqli_query($db,"select u_email,concat(U_first_name, ' ',U_last_name) AS name from f18_team9.user where u_email = '$user_check' ");
$row = mysqli_fetch_array($result ,MYSQLI_ASSOC);
$name = $row['name'];

$result  = mysqli_query($db,"select COUNT(ap_id) AS number from f18_team9.application");
$row = mysqli_fetch_array($result ,MYSQLI_ASSOC);
$numberApp = $row['number'];

$result  = mysqli_query($db,"select COUNT(ap_id) AS number from f18_team9.application where ap_status = 'pending' ");
$row = mysqli_fetch_array($result ,MYSQLI_ASSOC);
$pending = $row['number'];

$result  = mysqli_query($db,"select *,concat(U_first_name, ' ',U_last_name) AS name from f18_team9.user ");
$users=array();
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ // loop to store the data in an associative array.
    array_push($users,$row);
}

$result  = mysqli_query($db,"select * from f18_team9.program ");
$programs=array();
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ // loop to store the data in an associative array.
    array_push($programs,$row);
}

$result  = mysqli_query($db,"select * from f18_team9.application");
$applications=array();
$applicationsNames=array();
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ // loop to store the data in an associative array.
    array_push($applications,$row);
    $result2  = mysqli_query($db,"select concat(U_first_name, ' ',U_last_name) AS name from f18_team9.user WHERE u_email='{$row['u_email']}'");
    $row2 = mysqli_fetch_array($result2 ,MYSQLI_ASSOC);
    array_push($applicationsNames,$row2);
}
?>