<?php
include("config.php");
session_start();
//register user
if($_SERVER["REQUEST_METHOD"] == "POST") {
    //initialize variables
    //get inputs from form
    $originalName=mysqli_real_escape_string($db, $_POST['originalName']);
    $name=mysqli_real_escape_string($db, $_POST['name']);
    $description= mysqli_real_escape_string($db, $_POST['description']);
    $cost= mysqli_real_escape_string($db, $_POST['cost']);
    $funding = mysqli_real_escape_string($db, $_POST['funding']);
    $location = mysqli_real_escape_string($db, $_POST['location']);
    $scholarship=mysqli_real_escape_string($db, $_POST['scholarship']);

    $sql = "SELECT p_name FROM f18_team9.program WHERE p_name= '$originalName' ";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);
    //echo $count;
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count == 0) {
        echo '<script>
        alert("Program doesn\'t exist.");
        window.location.href="welcome_staff.php";
        </script>';
    }else if($count==1){
        $sql = "UPDATE program SET p_name = '$name', p_description = '$description', p_cost = '$cost', p_funding = '$funding', p_location = '$location',p_scholarship = '$scholarship' WHERE p_name = '$originalName'";
        if (mysqli_query($db, $sql)) {
            //echo "New record created successfully 1";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    }
    echo '<script>
        alert("Program '.$name.' was edited.");
        window.location.href="welcome_staff.php";
        </script>';

}
?>
