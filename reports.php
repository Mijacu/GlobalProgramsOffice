<?php
    include('session.php');


    $namesSQL=array("p_name", "ap_status", "ap_year");          //New name in joined table
    $columns=array("p_name", "ap_status", "ap_year");           //Select this columns
    $tuples=array();
    $progCond=array();
    $conditions=array();
    //print_r($_POST);
    $programs = $_POST['programs'];
    $names = $_POST['names'];
    $values = $_POST['values'];
    $gpa= $_POST['gpa'];
    $titlesArr=array("#","Program","Status","Year");
    $programsArr=json_decode($programs);
    $namesArr=json_decode($names);
    $valuesArr=json_decode($values);

    for($i=0;$i<count($namesArr);$i++){
        switch ($namesArr[$i]) {
            case "name":
                if($valuesArr[$i]=="fullName"){
                    array_push($columns,"concat(u_first_name, ' ',u_last_name) AS name");
                    array_push($namesSQL,"name");
                    array_push($titlesArr,"Name");
                }else if($valuesArr[$i]=="firsName"){
                    array_push($columns,"u_first_name");
                    array_push($namesSQL,"u_first_name");
                    array_push($titlesArr,"First Name");
                }
                else if($valuesArr[$i]=="lastName"){
                    array_push($columns,"u_last_name");
                    array_push($namesSQL,"u_last_name");
                    array_push($titlesArr,"Last Name");
                }
                break;
            case "dob":
                array_push($columns,"s_dob");
                array_push($namesSQL,"s_dob");
                array_push($titlesArr,"DoB");
                break;
            case "gender":
                array_push($columns,"s_gender");
                array_push($namesSQL,"s_gender");
                array_push($titlesArr,"Gender");
                if($valuesArr[$i]=="M"){
                    array_push($conditions," s_gender='M'");
                }else if($valuesArr[$i]=="F"){
                    array_push($conditions," s_gender='F'");
                }
                break;
            case "race":
                array_push($columns,"s_race");
                array_push($namesSQL,"s_race");
                array_push($titlesArr,"Race");
                if($valuesArr[$i]=="hispanic"){
                    array_push($conditions," s_race='hispanic'");
                }else if($valuesArr[$i]=="americanIndian"){
                    array_push($conditions," s_race='americanIndian'");
                }else if($valuesArr[$i]=="asian"){
                    array_push($conditions," s_race='asian'");
                }else if($valuesArr[$i]=="africanAmerican"){
                    array_push($conditions," s_race='africanAmerican'");
                }else if($valuesArr[$i]=="nativeHawaiian"){
                    array_push($conditions," s_race='nativeHawaiian'");
                }else if($valuesArr[$i]=="white"){
                    array_push($conditions," s_race='white'");
                }
                break;
            case "comparator":
                array_push($columns,"s_gpa");
                array_push($namesSQL,"s_gpa");
                array_push($titlesArr,"GPA");
                if($valuesArr[$i]=="equal"){
                    array_push($conditions," s_gpa='$gpa'");
                }else if($valuesArr[$i]=="greater"){
                    array_push($conditions," s_gpa>'$gpa'");
                }else if($valuesArr[$i]=="greaterEqual"){
                    array_push($conditions," s_gpa>='$gpa'");
                }else if($valuesArr[$i]=="less"){
                    array_push($conditions," s_gpa<'$gpa'");
                }else if($valuesArr[$i]=="lessEqual"){
                    array_push($conditions," s_gpa<='$gpa'");
                }
                break;
            case "classification":
                array_push($columns,"s_classification");
                array_push($namesSQL,"s_classification");
                array_push($titlesArr,"Classification");
                if($valuesArr[$i]=="freshman"){
                    array_push($conditions," s_classification='freshman'");
                }else if($valuesArr[$i]=="sophomore"){
                    array_push($conditions," s_classification='sophomore'");
                }else if($valuesArr[$i]=="junior"){
                    array_push($conditions," s_classification='junior'");
                }else if($valuesArr[$i]=="senior"){
                    array_push($conditions," s_classification='senior'");
                }else if($valuesArr[$i]=="graduate"){
                    array_push($conditions," s_classification='graduate'");
                }
                break;
            case "abroad":
                array_push($columns,"s_has_been_abroad");
                array_push($namesSQL,"s_has_been_abroad");
                array_push($titlesArr,"Abroad");
                if($valuesArr[$i]=="Y"){
                    array_push($conditions," s_has_been_abroad='Y'");
                }else if($valuesArr[$i]=="N"){
                    array_push($conditions," s_has_been_abroad='N'");
                }
                break;
        }
    }

    for($i=0;$i<count($programsArr);$i++){
        switch ($programsArr[$i]) {
            case "Global & Regional Sustainable Engineering":
                array_push($progCond," p_name='Global & Regional Sustainable Engineering'");
                break;
            case "Natural Resource Development for Communities Program":
                array_push($progCond," p_name='Natural Resource Development for Communities Program'");
                break;
            case "Leading Sustainable Infrastructure Solutions":
                array_push($progCond," p_name='Leading Sustainable Infrastructure Solutions'");
                break;
            case "Faculty Led Program on Smart Cities at the Czech Technical University":
                array_push($progCond," p_name='Faculty Led Program on Smart Cities at the Czech Technical University'");
                break;
            case "U.S. – Mexico Interdisciplinary Research Collaboration for Smart Cities":
                array_push($progCond," p_name='U.S. – Mexico Interdisciplinary Research Collaboration for Smart Cities'");
                break;
            case "U.S. - Canada Collaborative Research On Combustion Of Metals":
                array_push($progCond," p_name='U.S. - Canada Collaborative Research On Combustion Of Metals'");
                break;
        }
    }

    //print_r($columns);
    $sql = "SELECT ";
    for($i=0;$i<count($columns);$i++){
        //echo $i;
        if($i>0){
            $sql.=", ";
        }
        $sql.=$columns[$i];
    }
    $sql .=" FROM f18_team9.user JOIN f18_team9.student ON user.u_email=student.u_email JOIN f18_team9.application ON student.u_email=application.u_email";

    if(count($conditions)>0 || count($progCond)>0){
        $sql.=" WHERE";
        if(count($progCond)>0){
            $sql.=" (";
            for($i=0;$i<count($progCond);$i++){
                if($i>0){
                    $sql.=" OR";
                }
                $sql.=$progCond[$i];
            }
            $sql.=" )";
        }
        for($i=0;$i<count($conditions);$i++){
            if($i>0 || count($progCond)>0){
                $sql.=" AND";
            }
            $sql.=$conditions[$i];
        }
    }
    //echo "<br>".$sql."<br>";
    //print_r($sql);
    $result = mysqli_query($db,$sql);
    //print_r($result);

    $index=0;
    $output = fopen('php://output', 'w');
    fputcsv($output, $titlesArr);
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ // loop to store the data in an associative array.
        fputcsv($output, array_merge(array($index+1), $row));
        $tuples[$index] = $row;
        $index++;
    }
    // Create Table

    echo "<table><tr>";
    for($i=0;$i<count($titlesArr);$i++){
        echo "<th class='th'>".$titlesArr[$i]."</th>";
    }
    echo "</tr>";
    for($i=0;$i<count($tuples);$i++){
        echo "<tr class='tr'>";
        echo "<td class='td'>".($i+1)."</td>";
        for($j=0;$j<count($columns);$j++) {
            echo "<td class='td'>" . $tuples[$i][$namesSQL[$j]] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

?>