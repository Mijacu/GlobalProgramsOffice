
<?php
include('session.php');
include('staff_info.php');
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Global Program Office</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css" >
        <link rel="stylesheet" type="text/css" href="staff.css" >
        <link rel="icon" href="//cdn.utep.edu/images/favicon.ico" type="image/x-icon" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="staff.js"></script>
    </head>

    <body>
    <div id="header">
        <div class="utepHeading">
            <a href="https://www.utep.edu/">
                <img  alt="UTEP" src="Images/UTEP.png" title="UTEP"/>
            </a>
        </div>
        <div class="collegeHeading">
            <h1><a href="https://www.utep.edu/engineering/ " id="college-title">college of engineering</a></h1>
        </div>
    </div>


    <nav class="sticky">
        <ul>
            <li><a id="nav-home" class="home-button active nav-button button">Home</a></li>
            <li><a id="nav-reports" class="reports-button nav-button button">Reports</a></li>
            <li><a id="nav-applications" class="applications-button nav-button button">Applications</a></li>
            <li><a id="nav-manage" class="manage-button nav-button button">Manage</a></li>
            <li id="log_out" class="right-side" ><a class="button" href="logout.php">Log out</a></li>
        </ul>
    </nav>
    <main>
        <div id="home">
            <p style='font-size: 200%'><b>Welcome staff member: </b><?php echo $name;?></p>
            <p style='font-size: 200%'> <b>Number of applications received: </b><?php echo $numberApp;?></p>
            <p style='font-size: 200%'> <b>Number of pending applications: </b><?php echo $pending;?></p>
        </div>
        <div id="reports" class="invisible">
            <h1 class="title">Reports</h1>
            <div class="container-col2 option">
                <label><b>Select Program:</b></label>
                <select id="programToAdd" class="program" multiple="multiple">
                    <option value="Global & Regional Sustainable Engineering">Global & Regional Sustainable Engineering</option>
                    <option value="Natural Resource Development for Communities Program">Natural Resource Development for Communities Program</option>
                    <option value="Leading Sustainable Infrastructure Solutions">Leading Sustainable Infrastructure Solutions</option>
                    <option value="Faculty Led Program on Smart Cities at the Czech Technical University">Faculty Led Program on Smart Cities at the Czech Technical University</option>
                    <option value="U.S. – Mexico Interdisciplinary Research Collaboration for Smart Cities">U.S. – Mexico Interdisciplinary Research Collaboration for Smart Cities</option>
                    <option value="U.S. - Canada Collaborative Research On Combustion Of Metals">U.S. - Canada Collaborative Research On Combustion Of Metals</option>
                </select>

                <label><b>Select Column:</b></label>
                <select id="columnToAdd" name="Info">
                    <option id="choose" value="choose" selected>Choose</option>
                    <option id="name" value="name">Name</option>
                    <option id="dob" value="dob">DoB</option>
                    <option id="gender" value="gender">Gender</option>
                    <option id="race" value="race">Race</option>
                    <option id="gpa" value="gpa">GPA</option>
                    <option id="classification" value="classification">Classification</option>
                    <option id="abroad_question" value="abroad_question">Have you been abroad?</option>
                </select>
                <input id="new-col" type="button" value="Add Column">
            </div>

            <form id="reportsForm" action = "reports.php" method = "post">
                <h2 >Columns on Report:</h2>
                <div id="attributes" class="container-row2" ></div>
                <input id="new-report" type="button" value="Generate Report">
            </form>
            <div id="finalReport" class="container-col2"> </div>
        </div>
        <div id="applications" class="invisible container-col2">
                <label><b>Applications:</b></label>
                <select id="select_applications" name="app_sel">
                    <option value="all" selected>All</option>
                    <option value="accepted">Accepted</option>
                    <option value="pending">Pending</option>
                    <option value="rejected">Rejected</option>
                </select>
                <button id="show-app">Show Applications</button>

            <div id="app-content">

            </div>

        </div>

        <div id="manage" class="invisible container-col2">
            <div id="manage-box" class="box">
                <div id="manage-box-row1" class="box">
                    <div id="manage-box-row1-item1" class="box relation select">
                        Users
                    </div>
                    <div id="manage-box-row1-item2" class="box relation">
                        Programs
                    </div>
                    <div id="manage-box-row1-item3" class="box relation">
                        Applications
                    </div>
                </div>
                <div id="manage-box-row2" class="box">
                    <div id="manage-box-row2-item1" class="box action">
                        Add
                    </div>
                    <div id="manage-box-row2-item2" class="box action">
                        Delete
                    </div>
                    <div id="manage-box-row2-item3" class="box action invisible">
                        Edit
                    </div>
                </div>
                <div id="manage-box-row3" class="box">
                    <div id="add-user" class="content invisible">
                        <form action="add_user.php" method="post">
                            <h1>Add New User</h1>
                            <hr class="hr1">

                            <label class="input-label"><b>Email</b></label><br>
                            <input type="text" placeholder="Enter Email" name="email" required>
                            <br>

                            <label class="input-label"><b>Password</b></label><br>
                            <input type="password" placeholder="Enter Password" name="psw" required>
                            <br>

                            <label class="input-label"><b>Repeat Password</b></label><br>
                            <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
                            <br>

                            <label class="input-label"><b>First Name</b></label><br>
                            <input type="text" placeholder="Enter First Name" name="firstname" required>
                            <br>

                            <label class="input-label"><b>Last Name</b></label><br>
                            <input type="text" placeholder="Enter Last Name" name="lastname" required>
                            <br>

                            <label><b>Type of User</b></label><br>
                            <select name="type" required>
                                <option value="faculty">Faculty</option>
                                <option value="staff">Staff</option>
                            </select>
                            <br>

                            <button type="submit" class="button_signForm signupbtn">Add User</button>
                        </form>
                    </div>
                    <div id="delete-user" class="content invisible">
                        <h1>Delete Users</h1>
                        <hr class="hr1">
                        <?php
                        echo "<table>";
                        echo "<tr><th class='th'>Name</th><th class='th'>Email</th><th class='th'>Type</th><th class='th'>Action</th></tr>";
                        for($i=0;$i<count($users);$i++){
                            $email=$users[$i]['u_email'];
                            $name=$users[$i]['name'];
                            echo "<tr class='tr' id='user$i'><td class='td'>".$name."</td><td class='td'>".$email."</td><td class='td'>".$users[$i]['u_type_user']."</td><td class='td'><button class='deleteUser' value='$email' name='$i'>Delete</button></td></tr>";
                        }
                        echo "</table>";
                        ?>
                    </div>
                    <div id="edit-user" class="content invisible">

                    </div>



                    <div id="add-program" class="content invisible">
                        <form action="add_program.php" method="post">
                            <h1>Add New Program</h1>
                            <hr class="hr1">

                            <label class="input-label"><b>Program Name</b></label><br>
                            <input type="text" placeholder="Enter Name" name="name" maxlength="255" required>
                            <br>

                            <label class="input-label"><b>Description</b></label><br>
                            <textarea name="description" rows="10" cols="30" maxlength="255" required>Program Description:</textarea>
                            <br>

                            <label class="input-label"><b>Cost</b></label><br>
                            <input type="number" name="cost" min="0" max="9999" step=".01" value="0" required>
                            <br>

                            <label class="input-label"><b>Funding</b></label><br>
                            <input type="text" placeholder="Enter Funding" name="funding" maxlength="15" required>
                            <br>

                            <label class="input-label"><b>Location</b></label><br>
                            <input type="text" placeholder="Enter Location" name="location" maxlength="30" required>
                            <br>

                            <label class="input-label"><b>Scholarship</b></label><br>
                            <input type="text" placeholder="Enter Scholarship" name="scholarship" maxlength="30" required>
                            <br>

                            <button type="submit" class="button_signForm signupbtn">Add Program</button>
                        </form>
                    </div>
                    <div id="delete-program" class="content invisible">
                        <h1>Delete Programs</h1>
                        <hr class="hr1">
                        <?php
                        echo "<table>";
                        echo "<tr><th class='th'>Program</th><th class='th'>Action</th></tr>";
                        for($i=0;$i<count($programs);$i++){
                            $programName=$programs[$i]['p_name'];
                            echo "<tr class='tr' id='pro$i'><td class='td'>".$programName."</td><td class='td'><button class='deleteProgram' value='$programName' name='$i'>Delete</button></td></tr>";
                        }
                        echo "</table>";
                        ?>
                    </div>
                    <div id="edit-program" class="content invisible">
                        <div id="programsList">
                            <h1>Edit Programs</h1>
                            <hr class="hr1">
                            <?php
                            echo "<table>";
                            echo "<tr><th class='th'>Program</th><th class='th'>Action</th></tr>";
                            for($i=0;$i<count($programs);$i++){
                                $programName=$programs[$i]['p_name'];
                                echo "<tr class='tr' id='proEdit$i'><td class='td'>".$programName."</td><td class='td'><button class='editProgram' value='$programName' name='$i'>Edit</button></td></tr>";
                            }
                            echo "</table>";
                            ?>
                        </div>
                        <div id="programsEdition" class="invisible">

                        </div>
                    </div>



                    <div id="add-application" class="content invisible">

                    </div>
                    <div id="delete-application" class="content invisible">
                        <?php
                        echo "<table>";
                        echo "<tr><th class='th'>Name</th><th class='th'>Email</th><th class='th'>Program</th><th class='th'>Action</th></tr>";
                        for($i=0;$i<count($applications);$i++){
                            $email=$applications[$i]['u_email'];
                            $name=$applicationsNames[$i]['name'];
                            $appName=$applications[$i]['p_name'];
                            $id=$applications[$i]['ap_id'];
                            echo "<tr class='tr' id='app$i'><td class='td'>".$name."</td><td class='td'>".$email."</td><td class='td'>".$appName."</td><td class='td'><button class='deleteApplication' value='$id' name='$i'>Delete</button></td></tr>";
                        }
                        echo "</table>";
                        ?>
                    </div>
                    <div id="edit-application" class="content invisible">

                    </div>
            </div>
        </div>
    </main>


    <footer>
        <div id="website-link">
            <a href="https://www.utep.edu/engineering/global%20programs/index.html" target="_blank">Global Programs Website</a>
        </div>
        <div>
            <a href="https://www.facebook.com/UTEPEngineeringGlobalPrograms/" target="_blank"><i class="fab fa-facebook-f "></i></a>
            <a href="https://twitter.com/utep_globaleng" target="_blank"><i class="fab fa-twitter "></i></a>
            <a href="https://www.youtube.com/channel/UCQ3W_h1eRT-ywrSZQOPs4ZQ" target="_blank"><i class="fab fa-youtube "></i></a>
            <a href="https://www.instagram.com/eng_global_programs/?hl=bg" target="_blank"><i class="fab fa-instagram "></i></a>
        </div>
    </footer>

    </body>
    </html>