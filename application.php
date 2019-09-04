<?php
include('session.php');
$ap_essay;
$r_recommendation_letter_1;
$r_recommendation_letter_2;
$program;
$video;
$linkedin;
//echo "-1"."<br>";
ini_set('memory_limit', '25M');
ini_set('upload_max_filesize', '64M');
ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');
ini_set('max_execution_time', '300');
ini_set('max_input_time', '1000');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    //echo "4"."<br>";
    //initialize variables
    //get inputs from form
    $program = mysqli_real_escape_string($db, $_POST['programs']);
    $video = mysqli_real_escape_string($db, $_POST['video']);
    $linkedin = mysqli_real_escape_string($db, $_POST['linkedin']);
}
$email=$_SESSION['login_user'];

if (count($_FILES) > 0) {
    //echo "0"."<br>";
    //Essay
    if (is_uploaded_file($_FILES['essay']['tmp_name'])) {
        //echo "1"."<br>";
        $data = addslashes(file_get_contents($_FILES['essay']['tmp_name']));
        $name = $_FILES["essay"]["name"];
        $type = $_FILES['essay']['type'];
        $tmpName  = $_FILES['essay']['tmp_name'];

        $sql = "INSERT INTO upload(up_id,up_data,up_filename,up_filetype) VALUES(0, '{$data}','{$name}','{$type}')";
        mysqli_query($db, $sql) or die("<b>Error:</b> Problem on upload table for Essay Insert<br/>" . mysqli_error($db));

        $sql = "SELECT MAX(up_id) AS num FROM upload";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $ap_essay=$row["num"];
    }

    //Application
    $sql= "INSERT INTO application VALUES ('{$email}','{$program}',0,'Pending',{$ap_essay},'{$video}','{$linkedin}','2018')";
    mysqli_query($db, $sql) or die("<b>Error:</b> Problem inserting application<br/>" . mysqli_error($db));

    $sql = "SELECT MAX(ap_id) AS ap_id FROM application";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $ap_id=$row["ap_id"];

    //Recommendation 1
    if (is_uploaded_file($_FILES['rec1']['tmp_name'])) {
        //echo "2"."<br>";
        $data = addslashes(file_get_contents($_FILES['rec1']['tmp_name']));
        $name = $_FILES["rec1"]["name"];
        $type = $_FILES['rec1']['type'];
        $tmpName  = $_FILES['rec1']['tmp_name'];

        $sql = "INSERT INTO upload(up_id,up_data,up_filename,up_filetype) VALUES(0, '{$data}','{$name}','{$type}')";
        mysqli_query($db, $sql) or die("<b>Error:</b> Problem on upload table for recommendation 1 Insert<br/>" . mysqli_error($db));

        $sql = "SELECT MAX(up_id) AS num FROM upload";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $r_recommendation_letter_1=$row["num"];
    }
    //echo $ap_id;
    $sql= "INSERT INTO recommendation VALUES ('$email','faculty1',$ap_id,$r_recommendation_letter_1)";
    mysqli_query($db, $sql) or die("<b>Error:</b> Problem inserting reccomendation letter 1<br/>" . mysqli_error($db));

    //Recommendation 2
    if (is_uploaded_file($_FILES['rec2']['tmp_name'])) {
        //echo "3"."<br>";
        $data = addslashes(file_get_contents($_FILES['rec2']['tmp_name']));
        $name = $_FILES["rec2"]["name"];
        $type = $_FILES['rec2']['type'];
        $tmpName  = $_FILES['rec2']['tmp_name'];


        $sql = "INSERT INTO upload(up_id,up_data,up_filename,up_filetype) VALUES(0, '{$data}','{$name}','{$type}')";
        mysqli_query($db, $sql) or die("<b>Error:</b> Problem on upload table for recommendation 2 Insert<br/>" . mysqli_error($db));

        $sql = "SELECT MAX(up_id) AS num FROM upload";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $r_recommendation_letter_2=$row["num"];
    }

    $sql= "INSERT INTO recommendation VALUES ('$email','faculty1',$ap_id,$r_recommendation_letter_2)";
    mysqli_query($db, $sql) or die("<b>Error:</b> Problem inserting reccomendation letter 2<br/>" . mysqli_error($db));

}

echo '<script>
        alert("Application Uploaded Correctly. Thank You!");
        window.location.href="welcome_student.php";
    </script>';

?>