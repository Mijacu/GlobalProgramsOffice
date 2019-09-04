<?php
include('session.php');
include('student_info.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Global Program Office</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css" >
    <link rel="stylesheet" type="text/css" href="student.css" >
    <link rel="icon" href="//cdn.utep.edu/images/favicon.ico" type="image/x-icon" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="student_application.js"></script>

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
        <li><a id="nav-application" class="application-button nav-button button">Apply</a></li>
        <li><a id="nav-programs" class="programs-button nav-button button">Programs</a></li>
        <li id="sign_up" class="right-side" ><a class="button" href="logout.php">Log out</a></li>
    </ul>
</nav>
<div class="container-col">

        <div class="item-2">
            <main>
                <div id="home" class="container-col2">
                    <p style='font-size: 200%'> <b>Welcome student: </b><?php echo $name;?></p>
                    <p style='font-size: 200%'> <b>Number of applications submited: </b><?php echo $number;?></p>
                    <p style='font-size: 200%'> <b>Applications:</b> </p>
                    <?php
                    for($i=0;$i<count($application);$i++){
                        echo "<p style='font-size: 25px'> <b>".($i+1).".- Application to program: </b>".$application[$i]['p_name']."</p>";
                        echo "<p style='font-size: 25px'> <b>Status: </b>".$application[$i]['ap_status']."</p>";
                    }?>
                </div>
                <div id="application"  class="invisible container-row2">
                    <form id="regForm" enctype="multipart/form-data" method="post" action="application.php">

                        <h1>Apply to a program :</h1>

                        <!-- One "tab" for each step in the form: -->
                        <div class="tab"><h2>Programs</h2>
                            <select name="programs" class="select-app" required>
                                <option value="Global & Regional Sustainable Engineering">Global & Regional Sustainable Engineering</option>
                                <option value="Natural Resource Development for Communities Program">Natural Resource Development for Communities Program</option>
                                <option value="Leading Sustainable Infrastructure Solutions">Leading Sustainable Infrastructure Solutions</option>
                                <option value="Faculty Led Program on Smart Cities at the Czech Technical University">Faculty Led Program on Smart Cities at the Czech Technical University</option>
                                <option value="U.S. – Mexico Interdisciplinary Research Collaboration for Smart Cities">U.S. – Mexico Interdisciplinary Research Collaboration for Smart Cities</option>
                                <option value="U.S. - Canada Collaborative Research On Combustion Of Metals">U.S. - Canada Collaborative Research On Combustion Of Metals</option>
                            </select>
                        </div>

                        <div class="tab"><h2>Essay</h2>
                            <input name="essay" type="file" class="input-app" required/>
                        </div>

                        <div class="tab"><h2>Recommendations forms</h2>
                            <input name="rec1" type="file" class="input-app" required/>
                            <input name="rec2" type="file" class="input-app" required/>
                        </div>

                        <div class="tab"><h2>Video and LinkedIn links</h2>
                            <p><input name="video" placeholder="Video Link" class="input-app" required></p>
                            <p><input name="linkedin" placeholder="LinkedIn Link" class="input-app" required></p>
                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button" id="prevBtn" class="button-app" onclick="nextPrev(-1)">Previous</button>
                                <button type="button" id="nextBtn" class="button-app" onclick="nextPrev(1)">Next</button>
                            </div>
                        </div>

                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>

                    </form>
                </div>
                <div id="programs" class="invisible container-col2">
                    <?php
                    echo "<table>";
                    for($i=0;$i<count($programs);$i++){
                        echo "<tr><th class='th'><b>Program name: </b>".$programs[$i]['p_name']."</th></tr>";
                        echo "<tr class='tr'><td class='td'> <b>Description: </b>".$programs[$i]['p_description']."</td></tr>";
                        echo "<tr class='tr'><td class='td'> <b>Cost: </b>".$programs[$i]['p_cost']."</td></tr>";
                        echo "<tr class='tr'><td class='td'> <b>Funding: </b>".$programs[$i]['p_funding']."</td></tr>";
                        echo "<tr class='tr'><td class='td'> <b>Location: </b>".$programs[$i]['p_location']."</td></tr>";
                        echo "<tr class='tr'><td class='td'> <b>Scholarship: </b>".$programs[$i]['p_scholarship']."</td></tr>";
                    }
                    echo "</table>";
                    ?>
                </div>
            </main>
    </div>
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
</div>
<script type="text/javascript" src="student.js"></script>
</body>
</html>


