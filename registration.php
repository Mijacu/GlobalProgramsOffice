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
    $dob=mysqli_real_escape_string($db, $_POST['dob']);
    $race=mysqli_real_escape_string($db, $_POST['race']);
    $gpa=mysqli_real_escape_string($db, $_POST['gpa']);
    $classification=mysqli_real_escape_string($db, $_POST['classification']);
    $abroad=mysqli_real_escape_string($db, $_POST['abroad_question']);
    $gender=mysqli_real_escape_string($db, $_POST['gender']);
    if ($password != $password_confirm) {
        echo '<script>
        alert("Passwords do not match.");
        window.location.href="index.html";
        </script>';
    }

    $sql = "SELECT u_email FROM f18_team9.user WHERE u_email = '$email' ";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);
    //echo $count;
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count != 0) {
        echo '<script>
        alert("Email already exist.");
        window.location.href="index.html";
        </script>';
    }else{
        $password = md5($password);
        $sql= "INSERT INTO user VALUES ('$email','$password','$first_name','$last_name','student')";
        if (mysqli_query($db, $sql)) {
            //echo "New record created successfully 1";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
        $sql= "INSERT INTO student VALUES ('$email','$dob','$race','$gpa','$classification','$abroad','$gender')";
        if (mysqli_query($db, $sql)) {
            //echo "New record created successfully 2";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
        echo '<script>
        alert("Account created successfully.");
        window.location.href="index.html";
        </script>';
    }
}
?>
