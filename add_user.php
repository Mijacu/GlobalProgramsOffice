<?php
include("config.php");
session_start();
//register user
if($_SERVER["REQUEST_METHOD"] == "POST") {
    //initialize variables
    //get inputs from form
    $email=mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['psw']);
    $password_confirm = mysqli_real_escape_string($db, $_POST['psw-repeat']);
    $first_name = mysqli_real_escape_string($db, $_POST['firstname']);
    $last_name = mysqli_real_escape_string($db, $_POST['lastname']);
    $type=mysqli_real_escape_string($db, $_POST['type']);

    if ($password != $password_confirm) {
        echo '<script>
        alert("Passwords do not match");
        window.location.href="welcome_staff.php";
        </script>';
    }else{
        $sql = "SELECT u_email FROM f18_team9.user WHERE u_email = '$email' ";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);
        //echo $count;
        // If result matched $myusername and $mypassword, table row must be 1 row
        if($count != 0) {
            echo '<script>
        alert("User '.$email.' already exist.");
        window.location.href="welcome_staff.php";
        </script>';
        }else{
            $password = md5($password);
            $sql= "INSERT INTO user VALUES ('$email','$password','$first_name','$last_name','{$type}')";
            if (mysqli_query($db, $sql)) {
                //echo "New record created successfully 1";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($db);
            }
            if($type=="faculty"){
                $sql= "INSERT INTO faculty VALUES ('$email')";
            }else if($type=="staff"){
                $sql= "INSERT INTO staff VALUES ('$email')";

            }
            if (mysqli_query($db, $sql)) {
                //echo "New record created successfully 2";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($db);
            }
        }
        echo '<script>
        alert("User '.$email.' registered.");
        window.location.href="welcome_staff.php";
        </script>';
    }
}
?>
