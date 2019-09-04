<?php
include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $myemail = mysqli_real_escape_string($db,$_POST['email']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);
    $mypassword =md5($mypassword);
    $sql = "SELECT u_email FROM f18_team9.user WHERE u_email = '$myemail' and U_password = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //$active = $row['active'];

    $count = mysqli_num_rows($result);
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count == 1) {
        //session_register("myusername");
        $sql = "SELECT * FROM f18_team9.user WHERE u_email = '$myemail' and U_password = '$mypassword'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $_SESSION['login_user'] = $myemail;
        $_SESSION['type'] = $row['u_type_user'];
        if($_SESSION['type']=="staff" || $_SESSION['type']=="faculty"){
            header("location: welcome_staff.php");
        }else if($_SESSION['type']=="student"){
            header("location: welcome_student.php");
        }
    }else {
        echo '<script>
        alert("Invalid Username/Password");
        window.location.href="index.html";
        </script>';
    }
}
?>

