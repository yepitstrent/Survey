

<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php
    include("survey.php");
    
?>
</head>
<body onload="get_survey()">
    <div>
        <div>
            <h1>SURVEY: BETTER HELP</h1>
        </div>
        <div>
            <form method="post" action="form.php">
                <div id="form"></div>
                <!--<input type="radio" name="test" value="TEST0">TESTING<br>
                <input type="radio" name="test" value="TEST1">TESTING<br>-->

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>


<script>
    
    function get_survey(){
        //alert("in js");

        $.ajax({
            data: {"function" : "get_survey"},
            url: "survey.php",
            method: "POST", 
            success: function(str) {	
	        $("#form").html(str); 
            }
        });            
    }
</script>

</body>
</html>
