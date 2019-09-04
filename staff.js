$(document).ready(function(){
    let attr={name:"          <div id=\"nameSelection\" class=\"container-col2 option\">\n" +
    "                        <label><b>Name</b></label>\n" +
    "                        <select name=\"name\" class='attribute'>\n" +
    "                            <option value=\"fullName\" selected>Full Name</option>\n" +
    "                            <option value=\"firsName\">First Name</option>\n" +
    "                            <option value=\"lastName\">Last Name</option>\n" +
    "                        </select>\n" +
    "                    </div>",
    dob:"                    <div id=\"DobSelection\" class=\"container-col2 option\">\n" +
    "                        <label><b>Date of Birth</b></label>\n" +
        "                        <select name=\"dob\" class='attribute'>\n" +
        "                            <option value=\"all\" selected>Date of Birth</option>\n" +
        "                        </select>\n" +
    "                    </div>",
    gender:"                    <div id=\"genderSelection\" class=\"container-col2 option\">\n" +
    "                        <label><b>Gender</b></label>\n" +
    "                        <select name=\"gender\" class='attribute'>\n" +
    "                            <option value=\"all\">All</option>\n" +
    "                            <option value=\"M\">Male</option>\n" +
    "                            <option value=\"F\">Female</option>\n" +
    "                        </select>\n" +
    "                    </div>",
        race:"                    <div id=\"raceSelection\" class=\"container-col2 option\">\n" +
        "                        <label><b>Race</b></label>\n" +
        "                        <select name=\"race\" class='attribute'>\n" +
        "                            <option value=\"all\">All</option>\n" +
            "                        <option value=\"hispanic\">Hispanic or Latino</option>\n" +
            "                        <option value=\"americanIndian\">American Indian or Alaska Native</option>\n" +
        "                            <option value=\"asian\">Asian</option>\n" +
        "                            <option value=\"africanAmerican\">Black or African American</option>\n" +
        "                            <option value=\"nativeHawaiian\">Native Hawaiian or Other Pacific Islander</option>\n" +
        "                            <option value=\"white\">White</option>\n" +
        "                        </select>\n" +
        "                    </div>",
    gpa:"                    <div id=\"gpaSelection\" class=\"container-col2 option\">\n" +
    "                        <div class=\"container-row2\"><label><b>GPA</b></label>\n" +
        "                        <select name=\"comparator\" class='attribute'>\n" +
        "                            <option value=\"all\">All</option>\n" +
        "                            <option value=\"equal\"> = </option>\n" +
        "                            <option value=\"greater\"> > </option>\n" +
        "                            <option value=\"greaterEqual\"> >= </option>\n" +
        "                            <option value=\"less\"> < </option>\n" +
        "                            <option value=\"lessEqual\"> <= </option>\n" +
        "                        </select>\n" +
        "                    </div>\n" +
    "                        <input id=\"gpaNumber\" type=\"number\" name=\"gpa\" min=\"0\" max=\"4\" step=\".01\" value=\"3\">\n" +
    "                    </div>",
    classification:"                    <div id=\"classificationSelection\" class=\"container-col2 option\">\n" +
    "                        <label><b>Classification</b></label>\n" +
    "                        <select name=\"classification\" class='attribute'>\n" +
        "                            <option value=\"all\">All</option>\n" +
        "                            <option value=\"freshman\">Freshman</option>\n" +
    "                            <option value=\"sophomore\">Sophomore</option>\n" +
    "                            <option value=\"junior\">Junior</option>\n" +
    "                            <option value=\"senior\">Senior</option>\n" +
    "                            <option value=\"graduate\">Graduate</option>\n" +
    "                        </select>\n" +
    "                    </div>",
        abroad_question:"                    <div id=\"abroadSelection\" class=\"container-col2 option\">\n" +
    "                        <label><b>Have you been abroad?</b></label>\n" +
    "                        <select name=\"abroad\" class='attribute'>\n" +
            "                            <option value=\"all\">All</option>\n" +
            "                            <option value=\"Y\">Yes</option>\n" +
    "                            <option value=\"N\">No</option>\n" +
    "                        </select>\n" +
    "                    </div>"};
    var colToAdd;
    var app_sel;
    //Nav Bar
    $(".nav-button").click(function(){
        console.log("nav-button");
        $(".nav-button").removeClass("active");
        $(this).addClass("active");
    });
    $(".home-button").click(function(){
        console.log(".home-button");
        invisible();
        $(".nav-button").removeClass("active");
        $("#nav-home").addClass("active");
        $("#home").removeClass("invisible");
    });
    $(".reports-button").click(function(){
        console.log(".reports-button");
        invisible();
        $(".nav-button").removeClass("active");
        $("#nav-reports").addClass("active");
        $("#reports").removeClass("invisible");
    });
    $(".applications-button").click(function(){
        console.log(".apllications-button");
        invisible();
        $(".nav-button").removeClass("active");
        $("#nav-applications").addClass("active");
        $("#applications").removeClass("invisible");
    });
    $(".manage-button").click(function(){
        console.log(".apllications-button");
        invisible();
        $(".nav-button").removeClass("active");
        $("#nav-manage").addClass("active");
        $("#manage").removeClass("invisible");
    });
    $("#show-app").click(function(){
        console.log("show-app");
        app_sel=document.getElementById("select_applications").value;
        console.log(app_sel);
        $("#app-content").html("");
        $.post("show-applications.php", { app_sel:app_sel},
            function(data) {
                $("#app-content").html(data);
            });
    });

    $("#new-col").click(function(){
        console.log("#new-col");
        colToAdd=document.getElementById("columnToAdd").value;
        console.log(document.getElementById("columnToAdd"));
        if(colToAdd=="choose"){
            console.log("return");
            return;
        }
        console.log(colToAdd);
        console.log(attr[colToAdd]);
        $("#choose").prop("selected",true);
        $("#"+colToAdd).prop("disabled",true);
        $("#attributes").append(attr[colToAdd]);
    });

    $("#new-report").click(function(){
        console.log("#new-report");
        console.log( $("#attributes").html());
        if ( $("#attributes").html()==""){
            console.log("return");
            return;
        }
        var programs=[];
        var programsJSON;
        var names=[];
        var namesJSON;
        var values=[];
        var valuesJSON;
        var gpa=0;
        var attributes=document.getElementsByClassName("attribute");

        programs=$("#programToAdd").val();
        programsJSON = JSON.stringify(programs);
        console.log(programsJSON);

        console.log(attributes);
        for(var i=0;i<attributes.length;i++){
            if(attributes[i].name=="comparator"){
                gpa=$("#gpaNumber").val();
            }
            console.log(attributes[i].name);
            console.log(attributes[i].value);
            names.push(attributes[i].name);
            values.push(attributes[i].value);
        }
        namesJSON = JSON.stringify(names);
        valuesJSON = JSON.stringify(values);
        console.log(namesJSON);
        console.log(valuesJSON);
        console.log(gpa);

        $.post("reports.php", { programs:programsJSON,names:namesJSON,values:valuesJSON, gpa:gpa},
            function(data) {
                //alert(data);
                //console.log(data);
                var index=data.indexOf("<table>");
                console.log(index);
                var csv=data.substring(0,index);
                csv = 'data:text/csv;charset=utf-8,' + csv;
                console.log(csv);
                var table=data.substring(index);
                console.log(table);
                var encode = encodeURI(csv);

                var link = document.createElement('a');
                link.setAttribute('href', encode);
                link.setAttribute('download', "Report.csv");
                link.click();
                $('#finalReport').html(table);
                //$('#reportsForm')[0].reset();
            });
    });
    $(".relation").click(function(){
        console.log(".relation");
        console.log(this.id);
        //invisible_manage();
        $(".relation").removeClass("select");
        $(".action").removeClass("select");
        $(this).addClass("select");
        $(".content").addClass("invisible");
        $("#manage-box-row2-item1").addClass("invisible");
        $("#manage-box-row2-item2").addClass("invisible");
        $("#manage-box-row2-item3").addClass("invisible");
        if(this.id=="manage-box-row1-item1"){
            $("#manage-box-row2-item1").removeClass("invisible");
            $("#manage-box-row2-item2").removeClass("invisible");
        }else if(this.id=="manage-box-row1-item2"){
            $("#manage-box-row2-item1").removeClass("invisible");
            $("#manage-box-row2-item2").removeClass("invisible");
            $("#manage-box-row2-item3").removeClass("invisible");
        }else if(this.id=="manage-box-row1-item3"){
            $("#manage-box-row2-item2").removeClass("invisible");
        }
    });
    $(".action").click(function(){
        console.log(".action");
        console.log(this.id);
        $(".action").removeClass("select");
        $(this).addClass("select");
        $(".content").addClass("invisible");
        if($("#manage-box-row1-item1").hasClass("select") && this.id=="manage-box-row2-item1"){
            $("#add-user").removeClass("invisible");
        }else if($("#manage-box-row1-item1").hasClass("select") && this.id=="manage-box-row2-item2"){
            $("#delete-user").removeClass("invisible");
        }else if($("#manage-box-row1-item1").hasClass("select") && this.id=="manage-box-row2-item3"){
            $("#edit-user").removeClass("invisible");
        }else if($("#manage-box-row1-item2").hasClass("select") && this.id=="manage-box-row2-item1"){
            $("#add-program").removeClass("invisible");
        }else if($("#manage-box-row1-item2").hasClass("select") && this.id=="manage-box-row2-item2"){
            $("#delete-program").removeClass("invisible");
        }else if($("#manage-box-row1-item2").hasClass("select") && this.id=="manage-box-row2-item3"){
            $("#edit-program").removeClass("invisible");
        }else if($("#manage-box-row1-item3").hasClass("select") && this.id=="manage-box-row2-item1"){
            $("#add-application").removeClass("invisible");
        }else if($("#manage-box-row1-item3").hasClass("select") && this.id=="manage-box-row2-item2"){
            $("#delete-application").removeClass("invisible");
        }else if($("#manage-box-row1-item3").hasClass("select") && this.id=="manage-box-row2-item3"){
            $("#edit-application").removeClass("invisible");
        }
    });
    $(".deleteUser").click(function(){
        console.log("Delete User");
        var email= this.value;
        var id= this.name;
        console.log(email);
        var r = confirm("Do you really want to delete user "+email+"?");
        if (r == true) {
            $.post("delete_user.php", { email:email,name:name},
                function(data) {
                    $("#user"+id).remove();
                });
        }
    });
    $(".deleteProgram").click(function(){
        console.log("Delete Program");
        var programName= this.value;
        var id= this.name;
        console.log(programName);
        var r = confirm("Do you really want to delete program: "+programName+"?");
        if (r == true) {
            $.post("delete_program.php", { programName:programName},
                function(data) {
                    console.log(programName);
                    $("#pro"+id).remove();
                });
        }
    });
    $(".editProgram").click(function(){
        console.log("Edit Program");
        var programName= this.value;
        $("#programsList").addClass("invisible");
        $("#programsEdition").removeClass("invisible");
        $.post("create_program_form.php", { programName:programName},
            function(data) {
                $("#programsEdition").html(data);
            });
    });
    $(".deleteApplication").click(function(){
        console.log("Delete Application");
        var key= this.value;
        var id= this.name;
        console.log(id);
        var r = confirm("Do you really want to delete this Application?");
        if (r == true) {
            $.post("delete_applications.php", { key:key},
                function(data) {
                    $("#app"+id).remove();
                });
        }
    });
    function invisible(){
        console.log("invisible");
        var ids=["#home","#reports","#applications","#manage"];
        for(var i in ids){
            $(ids[i]).addClass("invisible");
        }
    }
});