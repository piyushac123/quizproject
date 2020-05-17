<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <!--css library-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../others/y.css"> 
        <style>
            .btn1{
                text-decoration: none;
                color:white;

            }
            .btn1:hover{
                text-decoration: none;
                color:white;
            }
            table,tr,th,td{
                border:1px solid black;
            }
        </style>
    </head>
    <body>
        <?php
            $con = mysqli_connect('localhost','root','','NewQUIZ');
            if (!$con) {
                die('Could not connect: ' . mysqli_error($con));
            }
        
            $sql1="select participant_id,Score from Participant where registration_id = (select registration_id from Registration where Flag=1)";
            $result1 = mysqli_query($con,$sql1);
            $val1="";
            $val2="";
            $arr = array();
            $cnt=0;
            while($row1 = mysqli_fetch_array($result1)){
                $val1 = $row1['participant_id'];
                $val2 = $row1['Score'];
                $arr1 = array($val1,$val2);
                array_push($arr,$arr1);
            }
//            for($i=0;$i<count($arr);$i++){
//                echo $arr[$i][0]." ".$arr[$i][1]."<br>";
//            }
            
        ?>
        <p class="head">
            Quiz Results
        </p>
        <button type="button" class="btn btn-secondary" style="float:right;margin-top:-60px;margin-right:20px;">
            <a href="../Quiz/logout.php">
                <acronym title="SIGN OUT" class="btn1">
                        <?php
                            $sql = "select Email from Registration where Flag=1";
                            $result = mysqli_query($con,$sql);
                            $value = "";
                            while($row = mysqli_fetch_array($result)){
                                $value = $row['Email'];
                            }
                            echo $value;
                        ?>
            </acronym></a>
        </button>
        <div class="box" align="center">
            <div class="box1">Congratulations!!!</div><br>
            <div class="box2">You scored <?php echo $arr[count($arr)-1][1];?>/6 <br>
            Answers correct:<?php echo $arr[count($arr)-1][1];?> <br>
                Answers incorect:<?php echo 6-($arr[count($arr)-1][1]);?></div><br>
        </div>
        <?php
            $sql = "select participant_id,Topic,Questions,Answer from Participant where registration_id = (select registration_id from Registration where Flag=1)";
             $result = mysqli_query($con,$sql);
             $topic = "";
            $questions = "";
            $answer = "";
             while($row = mysqli_fetch_array($result)){
                $topic = $row['Topic'];
                 $questions = $row['Questions'];
                 $answer = $row['Answer'];
             }
            echo '<center><b style="font-size:18px;">Your Topic:'.$topic."</b></center>";
            $q = array();
            foreach(explode("|",$questions) as $rec){
                array_push($q,$rec);
            }
            $a = array();
            foreach(explode("|",$answer) as $rec){
                array_push($a,$rec);
            }
//            for($i=0;$i<count($a);$i++){
//                echo $a[$i]." ";
//            }
//        echo "<br>";
        
            $dat = file_get_contents('../Quiz/Questions/'.$topic.'.txt');
            $cnt1=0;
            
            $tempallInfo = array();
            foreach(explode("\n",$dat) as $rec){
                    $arr2 = array();
                    foreach(explode("|",$rec) as $rec1){
                        array_push($arr2,$rec1);
                        //echo $rec1."\n";
                    }
                if($arr2[0] == $q[0] ||$arr2[0] == $q[1] ||$arr2[0] == $q[2] ||$arr2[0] == $q[3] ||$arr2[0] == $q[4] ||$arr2[0] == $q[5]){
                        $cnt1++;
                        array_push($tempallInfo,$arr2);
                    }
            }
//            for($i=0;$i<count($tempallInfo);$i++){
//                for($j=0;$j<count($tempallInfo[$i]);$j++){
//                    echo $tempallInfo[$i][$j]." ";
//                }
//                echo "<br>";
//            }
            //$allInfo = array();
            echo "<br><center><table><tr><th>Q.no.</th><th>Question</th><th>Answer</th><th>Response</th></tr>";
            for($i=0;$i<count($q);$i++){
                for($j=0;$j<count($tempallInfo);$j++){
                    if($q[$i] == $tempallInfo[$j][0]){
                        echo "<tr><td>".($i+1)."</td><td>".$tempallInfo[$j][1]."</td><td>".$tempallInfo[$j][6]."</td><td>".$a[$i]."</td></tr>";
                        break;
                    }
                }
            }
            echo "</table></center>";
//             for($i=0;$i<count($allInfo);$i++){
//                for($j=0;$j<count($allInfo[$i]);$j++){
//                    echo $allInfo[$i][$j]." ";
//                }
//                echo "<br>";
//            }           
        
//            echo "<br><table><tr><th>Q.no.</th><th>Question</th><th>Answer</th><th>Response</th></tr>";
//            for($i=0;$i<count($allInfo);$i++){
//                echo "<tr><td>".($i+1)."</td><td>".$allInfo[$i][1]."</td><td>".allInfo[$i][6]."</td><td>".$a[$i]."</td></tr>";
//            }
//            echo "</table><br>";
            
        ?>
        <div class="try1 box2">
            <a href ="../Quiz/quizHome.php" class="try"> Want to give a second try?</a>            
        </div>
        <div id="footer" style="background: linear-gradient(to right,#403B4A,#E7E9BB);color:white">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <ul style="list-style-type:none">
                            <p>Overview</p>
                            <li><a href="../Home/index.html" class="link">Homepage</a></li>
                            <li><a href="../Signup/signup.html" class="link">Sign Up</a></li>
                            <li><a href="../Login/login.html" class="link">Login</a></li>
                            <li><a href="../Quiz/quizHome.php" class="link">Quiz</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <p style="text-indent:50px">Contact us</p>
                        <br><br>
                        <!-- Add font awesome icons -->
                        <a href="http://facebook.com/" target="_blank" class="fa fa-facebook"  style="text-decoration:none"></a>
                        <a href="http://twitter.com/" target="_blank" class="fa fa-twitter" style="text-decoration:none"></a>
                        <a href="https://plus.google.com/" target="_blank" class="fa fa-google" style="text-decoration:none"></a>
                        <a href="https://in.linkedin.com/" target="_blank" class="fa fa-linkedin" style="text-decoration:none"></a>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <ul style="list-style-type:none">
                            <p>Project By</p>
                            <li>Piyush(4220)</li>
                            <li>Prathamesh(4221)</li>
<!--
                            <li>Nachiket</li>
                            <li>Geet</li>
-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php mysqli_close($con);?>
    </body>
</html>