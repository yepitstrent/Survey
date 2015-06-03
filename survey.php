<?php


    $action = $_POST['function'];
    switch($action){
        case 'get_survey' : echo get_bh_survey(); break;
        case 'get_results_male' : echo get_bh_results_men();  break;
        case 'get_results_women' : echo get_bh_results_women(); break;

    }

    function get_bh_results_women(){
        $servername = "localhost";
        $username = "bh_user";
        $password = "password";
        $dbname = "betterhelp";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $ret = "";
        $question = array();
        $answer = array();
        $totals = array(); 
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } 

        $sql = "select * from questions";
        $result = mysqli_query($conn, $sql);
  
        $entries = mysqli_num_rows($result);
        if($entries > 0){
            while($row = mysqli_fetch_assoc($result)) {
                //$ret = $ret.$row['name']."<br>";
                array_push($question, $row['name']);
//echo var_dump($question)."<br>";

                $sql = "select * from answers where qid = ".$row['id'];
                $inner_result = mysqli_query($conn, $sql);
                $entries = mysqli_num_rows($inner_result);

                if($entries > 0){
                    while($inner_row = mysqli_fetch_assoc($inner_result)){
                 

                        $sql = "select answer, count(gender) as count from entries where aid = ".$inner_row['id'].
                               " and gender = 'Female' group by answer order by count desc;";
                        $final_results = mysqli_query($conn, $sql);
                        $entries = mysqli_num_rows($final_results);

                        if($entries > 0){

                            $first = 0;
                            while($final_row = mysqli_fetch_assoc($final_results)){

                                if($first == 0){
                                    array_push($answer, $final_row['answer']);
                                    array_push($totals, $final_row['count']);
                                    //$answer = $final_row['answer'];     
                                    $first = 1;
                                }
                            }//3rd while
                        }

                    }//2nd while
                }

            }//1st while

        } 
        mysqli_close($conn);   
 
        $iterator = new MultipleIterator ();
        $iterator->attachIterator (new ArrayIterator ($question));
        $iterator->attachIterator (new ArrayIterator ($answer));
        $iterator->attachIterator (new ArrayIterator ($totals));

        foreach ($iterator as $item)
        {
            $ret = $ret.$item[0]."<br>ANSWER:".$item [1]."<br>TOTAL:".$item[2]."<br><br>";    
        }

        return $ret;

     }



    function get_bh_results_men(){

        $servername = "localhost";
        $username = "bh_user";
        $password = "password";
        $dbname = "betterhelp";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $ret = "";
        $question = array();
        $answer = array();
        $totals = array(); 
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } 

        $sql = "select * from questions";
        $result = mysqli_query($conn, $sql);
  
        $entries = mysqli_num_rows($result);
        if($entries > 0){
            while($row = mysqli_fetch_assoc($result)) {
                //$ret = $ret.$row['name']."<br>";
                array_push($question, $row['name']);
//echo var_dump($question)."<br>";

                $sql = "select * from answers where qid = ".$row['id'];
                $inner_result = mysqli_query($conn, $sql);
                $entries = mysqli_num_rows($inner_result);

                if($entries > 0){
                    while($inner_row = mysqli_fetch_assoc($inner_result)){
                 

                        $sql = "select answer, count(gender) as count from entries where aid = ".$inner_row['id'].
                               " and gender = 'Male' group by answer order by count desc;";
                        $final_results = mysqli_query($conn, $sql);
                        $entries = mysqli_num_rows($final_results);

                        if($entries > 0){

                            $first = 0;
                            while($final_row = mysqli_fetch_assoc($final_results)){

                                if($first == 0){
                                    array_push($answer, $final_row['answer']);
                                    array_push($totals, $final_row['count']);
                                    //$answer = $final_row['answer'];     
                                    $first = 1;
                                }
                            }//3rd while
                        }

                    }//2nd while
                }

            }//1st while

        } 
        mysqli_close($conn);   
 
        $iterator = new MultipleIterator ();
        $iterator->attachIterator (new ArrayIterator ($question));
        $iterator->attachIterator (new ArrayIterator ($answer));
        $iterator->attachIterator (new ArrayIterator ($totals));

        foreach ($iterator as $item)
        {
            $ret = $ret.$item[0]."<br>ANSWER:".$item [1]."<br>TOTAL:".$item[2]."<br><br>";    
        }

        return $ret;
     }

    function get_bh_survey(){
        $servername = "localhost";
        $username = "bh_user";
        $password = "password";
        $dbname = "betterhelp";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } 
        $sql = "select * from questions as q order by order_of";

        $result = mysqli_query($conn, $sql);
  
        $entries = mysqli_num_rows($result); 
        
        if ($entries > 0) {
            $ret = "";
            $i = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $i++;
                $ret = $ret.$i.". ".$row['name']."<br>";

                //GET THE ANSWERS TO THE SURVEY QUESTIONS
                $sql = "select * from answers where qid = ".$row['id']." order by order_of";

                $inner_result =  mysqli_query($conn, $sql);
                $entries = mysqli_num_rows($result); 
                if ($entries > 0){
                    $state = $row['answ_type'];
                    while($inner_row = mysqli_fetch_assoc($inner_result) ){
                         //0 = Radio
                         //1 = Checkbox
                         switch($state){
                             case 0: $ret = $ret."<input type=\"radio\" name=\"".$row['id']."\" value=\"".$inner_row['name']."\">".$inner_row['name']."<br>"; 
                                 break;
                             case 1: $ret = $ret."<input type=\"checkbox\" name=\"".$row['id']."[]\" value=\"".$inner_row['name']."\">".$inner_row['name']."<br>";                                 break;
                         }
                    }
                    $ret = $ret."<br>";
                }
            }
        }
        mysqli_close($conn);    

        return $ret;
    }

 
?>
