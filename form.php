<?php
    $servername = "localhost";
    $username = "bh_user";
    $password = "password";
    $dbname = "betterhelp";
 
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $gender = "";

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "select q.id from questions as q where name = 'What is your gender?'";

    $result = mysqli_query($conn, $sql);
    $entries = mysqli_num_rows($result); 
        
    if ($entries > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $gender = $_POST[$id];
            //echo var_dump($gender);
            if($gender == NULL) {
                break;
            }        
        }
    } 
 
    $sql = "select q.id, q.answ_type from questions as q where sid = 1";

    $result = mysqli_query($conn, $sql);
  
    $entries = mysqli_num_rows($result); 
        
    if ($entries > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $state = $row['answ_type'];
            switch($state){
                case 0: { 
                    $id = $row['id'];
                    $answer = $_POST[$id];
                   
                    if($answer != NULL){
                        $sql = "insert into entries (aid, answer, gender) values (".$row['id'].", '".$answer."', '".$gender."')";
                        if (mysqli_query($conn, $sql)) {
//                            echo "New record created successfully";
                        } else {
//                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    } 
                    break;
                }
                case 1: { 
                    $id = $row['id'];
                    $answer = $_POST[$id];

                    $N = count($answer);
 
                    //echo("You selected $N boxes: ");
                    for($i=0; $i < $N; $i++)
                    {
                        //echo($answer[$i] . " ");
                        $sql = "insert into entries (aid, answer, gender) values (".$row['id'].", '".$answer[$i]."', '".$gender."')";
                        if (mysqli_query($conn, $sql)) {
//                            echo "New record created successfully<br>";
                        } else {
//                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    }
  
                    break;
                } 
            }           

             
        }
    }
 
    mysqli_close($conn);    

    //$action = $_POST['test'];
//echo var_dump($action);


?>

<html>
<head></head>
<body>
    <h1>Survey Completed: Thank you!</h1>
    <a href="index.php">CLICK</a>
</body>
</html>
