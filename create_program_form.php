<?php
include("config.php");
session_start();
//register user
if($_SERVER["REQUEST_METHOD"] == "POST") {
    //initialize variables
    //get inputs from form
    $programName= $_POST['programName'];

    $sql = "SELECT * FROM f18_team9.program WHERE p_name= '$programName' ";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);
    //echo $count;
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count == 0) {

    }else if($count==1){
        $name=mysqli_real_escape_string($db, $row['p_name']);
        $description= mysqli_real_escape_string($db, $row['p_description']);
        $cost= mysqli_real_escape_string($db, $row['p_cost']);
        $funding = mysqli_real_escape_string($db, $row['p_funding']);
        $location = mysqli_real_escape_string($db, $row['p_location']);
        $scholarship=mysqli_real_escape_string($db, $row['p_scholarship']);
        if (mysqli_query($db, $sql)) {
            //echo "New record created successfully 1";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
        echo "         <form action=\"edit_program.php\" method=\"post\">
                            <h1>Add New Program</h1>
                            <hr class=\"hr1\">
                            <label class=\"input - label\"><b>Original Program Name</b></label><br>
                            <input type=\"text\" name=\"originalName\" maxlength=\"255\" value='$name' readonly>
                            <br>
                            <label class=\"input-label\"><b>Program Name</b></label><br>
                            <input type=\"text\" placeholder=\"Enter Name\" name=\"name\" maxlength=\"255\" value='$name'required>
                            <br>

                            <label class=\"input-label\"><b>Description</b></label><br>
                            <textarea name=\"description\" rows=\"10\" cols=\"30\" maxlength=\"255\" required>$description</textarea>
                            <br>

                            <label class=\"input-label\"><b>Cost</b></label><br>
                            <input type=\"number\" name=\"cost\" min=\"0\" max=\"9999\" step=\".01\" value='$cost' required>
                            <br>

                            <label class=\"input-label\"><b>Funding</b></label><br>
                            <input type=\"text\" placeholder=\"Enter Funding\" name=\"funding\" maxlength=\"15\" value='$funding'required>
                            <br>

                            <label class=\"input-label\"><b>Location</b></label><br>
                            <input type=\"text\" placeholder=\"Enter Location\" name=\"location\" maxlength=\"30\" value='$location'required>
                            <br>

                            <label class=\"input-label\"><b>Scholarship</b></label><br>
                            <input type=\"text\" placeholder=\"Enter Scholarship\" name=\"scholarship\" maxlength=\"30\" value='$scholarship'required>
                            <br>

                            <button type=\"submit\" class=\"button_signForm signupbtn\">Edit Program</button>
                        </form>";
    }
}
?>