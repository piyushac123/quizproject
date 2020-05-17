<?php
    $con = mysqli_connect('localhost','root','','NewQUIZ');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    if(isset($_POST['submit'])){
        $opt1=$_POST['option1'];
        $opt2=$_POST['option2'];
        $opt3=$_POST['option3'];
        $opt4=$_POST['option4'];
        $opt5=$_POST['option5'];
        $opt6=$_POST['option6'];

        $opt = array($opt1,$opt2,$opt3,$opt4,$opt5,$opt6);

        //echo $opt1."<br>".$opt2."<br>".$opt3."<br>".$opt4."<br>".$opt5."<br>".$opt6."<br>";

        $dat = file_get_contents('answer.txt');

        $score = 0;
        $cnt = 0;
        $question = array();

        foreach(explode("\n",$dat) as $rec){
            $arr = array();
          foreach(explode("|",$rec) as $rec1){
              array_push($arr,$rec1);
          }
            array_push($question,$arr[0]);
            //echo $arr[0]." ".$arr[1]."<br>";
            if($opt[$cnt] == $arr[1]){
                $score++;
            }
            $cnt++;
            if($cnt == 6){
                break;
            }
        }
    echo $cnt." ".$score;
        unlink('answer.txt');
//        for($i=0;$i<count($question);$i++){
//            echo $question[$i]." ";
//        }
//        echo "<br>";
        $ques = "'".$question[0]."|".$question[1]."|".$question[2]."|".$question[3]."|".$question[4]."|".$question[5]."'";
        $ans = "'".$opt[0]."|".$opt[1]."|".$opt[2]."|".$opt[3]."|".$opt[4]."|".$opt[5]."'";
        echo $ques."<br>";
        
        $sql1="select registration_id from Registration where Flag=1";
        $result1 = mysqli_query($con,$sql1);
        $value1="";
        while($row1 = mysqli_fetch_array($result1)){
            $value1 = $row1['registration_id'];
        }
        //echo $value1,$topic,$pname,$college,$deg,$branch;
        $sql="INSERT INTO Participant(`registration_id`,`Participation_date`,`Topic`,`Score`,`Questions`,`Answer`) VALUES ($value1,LOCALTIME(),'Politics',$score,$ques,$ans)";

        if ($con->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        else{

        ?>
        <script>
            alert("Successfully completed your Quiz");
            location.replace("http://localhost/NewQUIZ/Leaderboard/result.php");
        </script>
        <?php 
        }
    }
    mysqli_close($con);
?>