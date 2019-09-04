<?php
    if($_SESSION['type'] !="student"){
        header("location: index.html");
    }

    $result = mysqli_query($db,"select u_email,concat(U_first_name, ' ',U_last_name) AS name from f18_team9.user where u_email = '$user_check' ");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $name = $row['name'];

    $result  = mysqli_query($db,"select COUNT(ap_id) AS number from f18_team9.application where u_email = '$user_check' ");
    $row = mysqli_fetch_array($result ,MYSQLI_ASSOC);
    $number = $row['number'];

    $result  = mysqli_query($db,"select * from f18_team9.application where u_email = '$user_check' ");
    $application=array();
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ // loop to store the data in an associative array.
        array_push($application,$row);
    }

    $result  = mysqli_query($db,"select * from f18_team9.program ");
    $programs=array();
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ // loop to store the data in an associative array.
        array_push($programs,$row);
    }

?>