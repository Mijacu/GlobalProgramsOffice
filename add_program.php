<?php
include("config.php");
session_start();
//register user
if($_SERVER["REQUEST_METHOD"] == "POST") {
    //initialize variables
    //get inputs from form
    $name=mysqli_real_escape_string($db, $_POST['name']);
    $description= mysqli_real_escape_string($db, $_POST['description']);
    $cost= mysqli_real_escape_string($db, $_POST['cost']);
    $funding = mysqli_real_escape_string($db, $_POST['funding']);
    $location = mysqli_real_escape_string($db, $_POST['location']);
    $scholarship=mysqli_real_escape_string($db, $_POST['scholarship']);

    $sql = "SELECT p_name FROM f18_team9.program WHERE p_name= '$name' ";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);
    //echo $count;
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count != 0) {
        echo '<script>
        alert("Program ".$name." already exist.");
        window.location.href="welcome_staff.php";
        </script>';
    }else{
        $sql= "INSERT INTO program VALUES ('$name','$description','$cost','$funding','{$location}','{$scholarship}')";
        if (mysqli_query($db, $sql)) {
            //echo "New record created successfully 1";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    }
    echo '<script>
        alert("Program '.$name.' registered.");
        window.location.href="welcome_staff.php";
        </script>';

}
?>
