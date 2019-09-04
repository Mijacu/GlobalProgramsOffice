<?php
    include('session.php');
    $app_sel = $_POST['app_sel'];
    if($app_sel=="all"){
        $result  = mysqli_query($db,"select * from f18_team9.application");
    }else{
        $result  = mysqli_query($db,"select * from f18_team9.application where ap_status='{$app_sel}' ");
    }
    $application=array();
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ // loop to store the data in an associative array.
        array_push($application,$row);
    }
    echo "<table>";
    for($i=0;$i<count($application);$i++){
        $result = mysqli_query($db,"select concat(U_first_name, ' ',U_last_name) AS name from f18_team9.user where u_email = '{$application[$i]['u_email']}' ");
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $name = $row['name'];
        $essay=$application[$i]['ap_essay'];
        $id=$application[$i]["ap_id"];
        $recommendation=array();
        $result = mysqli_query($db,"select r_recommendation_letter from f18_team9.recommendation where ap_id = '{$id}' ");
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ // loop to store the data in an associative array.
            array_push($recommendation,$row);
        }
        echo "<tr><th class='th'> <b> Application Id: ".$id." </b></th><th class='th'>Downloads</th><th class='th'>Actions</th></tr>";
        echo "<tr class='tr'><td class='td'> <b>Name and email: </b></td><td class='td'>".$name."; ".$application[$i]['u_email']."</td><td class='td'><button class='change-status' value='Accepted' name='$id'>Accepted</button></td></tr>";
        echo "<tr class='tr'><td class='td'> <b>Program: </b></td><td class='td'>".$application[$i]['p_name']."</td><td class='td'><button class='change-status' value='Pending' name='$id'>Pending</button></td></tr>";
        echo "<tr class='tr'><td class='td'> <b>Status </b></td><td class='td' id='status_cell".$id."'>".$application[$i]['ap_status']."</td><td class='td'><button class='change-status' value='Rejected' name='$id'>Rejected</button></td></tr>";
        echo "<tr class='tr'><td class='td'> <b>Essay: </b></td><td class='td'> <a href='Download.php?id=$essay'>Download Essay</a></td><td class='td'></td></tr>";
        echo "<tr class='tr'><td class='td'> <b>Recommendation Letter 1: </b></td><td class='td'> <a href='Download.php?id={$recommendation[0]['r_recommendation_letter']}'>Download First Recommendation Letter</a></td><td class='td'></td></tr>";
        echo "<tr class='tr'><td class='td'> <b>Recommendation Letter 2: </b></td><td class='td'> <a href='Download.php?id={$recommendation[1]['r_recommendation_letter']}'>Download Second Recommendation Letter</a></td><td class='td'></td></tr>";
        echo "<tr class='tr'><td class='td'> <b>Video Link: </b></td><td class='td'> <a href='{$application[$i]['ap_video_link']}' target='_blank' >Video Link</a></td><td class='td'></td></tr>";
        echo "<tr class='tr'><td class='td'> <b>LinkedIn Link: </b></td><td class='td'> <a href='{$application[$i]['ap_linkedin__link']}' target='_blank' >LinkedIn Link</a></td><td class='td'></td></tr>";
    }
    echo "</table>";
    echo "<script>
            $(\".change-status\").click(function(){
        console.log(\"Change Status\");
        var status= this.value;
        var ap_id= this.name;
        console.log(status);
        console.log(ap_id);
        $(\"#status_cell\"+ap_id).html(\"\");
        $.post(\"change_status.php\", { status:status,ap_id:ap_id},
            function(data) {
                $(\"#status_cell\"+ap_id).html(data);
            });
    });
    </script>";
?>