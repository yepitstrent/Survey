<?php
    include("survey.php");
?>
<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body onload="get_results()">
    <div>
        <div><h1>RESULTS PAGE</h1></div>
        <div><b>Top Men Answers:</b></div>
        <div id="results_men"></div><br><br>
        <div><b>Top Women Answers:</b></div>
        <div id="results_women"></div>
    </div>
<script>
    function get_results(){
        //alert("in js");

        $.ajax({
            data: {"function" : "get_results_male"},
            url: "survey.php",
            method: "POST", 
            success: function(str) {
                	
	        $("#results_men").html(str); 
            }
        });          
        

        $.ajax({
            data: {"function" : "get_results_women"},
            url: "survey.php",
            method: "POST", 
            success: function(str) {	
	        $("#results_women").html(str); 
            }
        }); 
    }

</script>
</body>
</html>
