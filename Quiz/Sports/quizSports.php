<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <TITLE>QUIZ GAME</TITLE>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../quiz.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </HEAD>
    <BODY>
        <?php
            $cnt = 0;
            $arr = array();
        
            $dat = file_get_contents('../Questions/Sports.txt');
                $cntline = 0;
                foreach(explode("\n",$dat) as $rec){
                    $cntline++;
                }
            
            while($cnt < 6){
                
                $num = rand(1,$cntline-1);
                $flag = 1;
                //echo $num;
                for($i=0;$i<count($arr);$i++){
                    if($num == $arr[$i]){
                        $flag=0;
                        break;
                    }
                }
                if($flag == 1){
                    array_push($arr,$num);
                    $cnt++;
                }
            }
//            for($i=0;$i<count($arr);$i++){
//                echo $arr[$i]." ";    
//            }
//            echo "<br>";
        
            $cnt1=0;
            $allInfo = array();
            $tempallInfo = array();
            //while($cnt1<6){
                foreach(explode("\n",$dat) as $rec){
                    $arr1 = array();
                    foreach(explode("|",$rec) as $rec1){
                        array_push($arr1,$rec1);
                        //echo $rec1."\n";
                    }
                    if($arr1[0] == $arr[0] ||$arr1[0] == $arr[1] ||$arr1[0] == $arr[2] ||$arr1[0] == $arr[3] ||$arr1[0] == $arr[4] ||$arr1[0] == $arr[5]){
                        $cnt1++;
                        array_push($tempallInfo,$arr1);
                    }
                }
                //echo "------------".$cnt1."-------------<br>";
            //}
            for($i=0;$i<count($arr);$i++){
                for($j=0;$j<count($tempallInfo);$j++){
                    if($arr[$i] == $tempallInfo[$j][0]){
                        array_push($allInfo,$tempallInfo[$j]);
                        break;
                    }
                }
            }
        
//            for($i=0;$i<count($allInfo);$i++){
//                for($j=0;$j<count($allInfo[$i]);$j++){
//                    echo $allInfo[$i][$j]." ";
//                }
//                echo "<br>";
//            }
        for($i=0;$i<6;$i++){
            file_put_contents('answer.txt',$arr[$i]."|".$allInfo[$i][6]."\n",FILE_APPEND);
        }
            
        ?>
        <div class="container-fluid bg-primary">
            <div class="row">
                <div class="col-sm-12">
                    <span class="title">Let the Game Begins</span>
                </div>
            </div>
        </div>
        <hr>
        <div class="container-fluid ">
            <div class="row">
                <span class=" col-lg-6 col-sm-12">
                        <button id="myBtn"type="button" class="btn btn-primary">
                            <span class="size2">Questions</span>
                        </button>
                        <!-- The Modal -->
                        <div id="myModal" class="modal text-center">

                          <!-- Modal content -->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h2 style="text-align: center;">QUESTIONS</h2>
                              <span class="close">&times;</span>
                            </div>
                            <div class="modal-body">
                              <ul class="txt"> 
                                  <li id="ques1" class="quesnum active1">1</li>
                                  <li id="ques2" class="quesnum">2</li>
                                  <li id="ques3" class="quesnum">3</li>
                                  <li id="ques4" class="quesnum">4</li>
                                  <li id="ques5" class="quesnum">5</li>
                                  <li id="ques6" class="quesnum">6</li>
                              </ul>
                            </div>
<!--
                            <div class="modal-footer">
                                <p>-------------------&times;&times;&times;-------------------</p>
                            </div>
-->
                          </div>
                        </div>
                    <p id="demo"></p>
                </span>
                <span class="col-lg-6 col-sm-12">
                    <span class="alert alert-primary but1">
                        <p id="timer"></p>
                    </span>
                </span>
            </div>
        </div>
        <hr>
        <form  id="myForm" method="post" action="submitSports.php" class="link1">
        <div id="section1">
        <div class="jumbotron link1">
            <h2>1] <?php echo $allInfo[0][1]?></h2>
        </div>
        <hr>
        
            <div><input type="radio" name="option1" value="<?php echo $allInfo[0][2]?>" onclick="fun1()"> A: <?php echo $allInfo[0][2]."."?></div><hr>
            <div><input type="radio" name="option1" value="<?php echo $allInfo[0][3]?>" onclick="fun2()"> B: <?php echo $allInfo[0][3]."."?></div><hr>
            <div><input type="radio" name="option1" value="<?php echo $allInfo[0][4]?>" onclick="fun3()"> C: <?php echo $allInfo[0][4]."."?></div><hr>
            <div><input type="radio" name="option1" value="<?php echo $allInfo[0][5]?>" onclick="fun4()"> D: <?php echo $allInfo[0][5]."."?></div>
        <hr>
        <div></div><div></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-sm-0">
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="first1" class="size3">
                        First
                    </span>
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span class="disabled">
                        Previous
                    </span>
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="next1" class="size3">
                        Next
                    </span>
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="last1" class="size3">
                        Last
                    </span>
                </div>
            </div>
        </div>
        </div>
        <div id="section2">
        <div class="jumbotron link1">
            <h2>2] <?php echo $allInfo[1][1]?></h2>
        </div>
        <hr>
            <div><input type="radio" name="option2" value="<?php echo $allInfo[1][2]?>" onclick="fun1()"> A: <?php echo $allInfo[1][2]."."?></div><hr>
            <div><input type="radio" name="option2" value="<?php echo $allInfo[1][3]?>" onclick="fun2()"> B: <?php echo $allInfo[1][3]."."?></div><hr>
            <div><input type="radio" name="option2" value="<?php echo $allInfo[1][4]?>" onclick="fun3()"> C: <?php echo $allInfo[1][4]."."?></div><hr>
            <div><input type="radio" name="option2" value="<?php echo $allInfo[1][5]?>" onclick="fun4()"> D: <?php echo $allInfo[1][5]."."?></div>
        <hr>
        <div></div><div></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-sm-0">
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="first2" class="size3">
                        First
                    </span>
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="pre2" class="size3">
                        Previous
                    </span>
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="next2" class="size3">
                        Next
                    </span>
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="last2" class="size3">
                        Last
                    </span>
                </div>
            </div>
        </div>
        </div>
        <div id="section3">
        <div class="jumbotron link1">
            <h2>3] <?php echo $allInfo[2][1]?></h2>
        </div>
        <hr>
            <div><input type="radio" name="option3" value="<?php echo $allInfo[2][2]?>" onclick="fun1()"> A: <?php echo $allInfo[2][2]."."?></div><hr>
            <div><input type="radio" name="option3" value="<?php echo $allInfo[2][3]?>" onclick="fun2()"> B: <?php echo $allInfo[2][3]."."?></div><hr>
            <div><input type="radio" name="option3" value="<?php echo $allInfo[2][4]?>" onclick="fun3()"> C: <?php echo $allInfo[2][4]."."?></div><hr>
            <div><input type="radio" name="option3" value="<?php echo $allInfo[2][5]?>" onclick="fun4()"> D: <?php echo $allInfo[2][5]."."?></div>
        <hr>
        <div></div><div></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-sm-0">
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="first3" class="size3">
                        First
                    </span>
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="pre3" class="size3">
                        Previous
                    </span>
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="next3" class="size3">
                        Next
                    </span>
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="last3" class="size3">
                        Last
                    </span>
                </div>
            </div>
        </div>
        </div>
        <div id="section4">
        <div class="jumbotron link1">
            <h2>4] <?php echo $allInfo[3][1]?></h2>
        </div>
        <hr>
            <div><input type="radio" name="option4" value="<?php echo $allInfo[3][2]?>" onclick="fun1()"> A: <?php echo $allInfo[3][2]."."?></div><hr>
            <div><input type="radio" name="option4" value="<?php echo $allInfo[3][3]?>" onclick="fun2()"> B: <?php echo $allInfo[3][3]."."?></div><hr>
            <div><input type="radio" name="option4" value="<?php echo $allInfo[3][4]?>" onclick="fun3()"> C: <?php echo $allInfo[3][4]."."?></div><hr>
            <div><input type="radio" name="option4" value="<?php echo $allInfo[3][5]?>" onclick="fun4()"> D: <?php echo $allInfo[3][5]."."?></div>
        <hr>
        <div></div><div></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-sm-0">
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="first4" class="size3">
                        First
                    </span>
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="pre4" class="size3">
                        Previous
                    </span>
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="next4" class="size3">
                        Next
                    </span>
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="last4" class="size3">
                        Last
                    </span>
                </div>
            </div>
        </div>
        </div>
        <div id="section5">
        <div class="jumbotron link1">
            <h2>5] <?php echo $allInfo[4][1]?></h2>
        </div>
        <hr>
            <div><input type="radio" name="option5" value="<?php echo $allInfo[4][2]?>" onclick="fun1()"> A: <?php echo $allInfo[4][2]."."?></div><hr>
            <div><input type="radio" name="option5" value="<?php echo $allInfo[4][3]?>" onclick="fun2()"> B: <?php echo $allInfo[4][3]."."?></div><hr>
            <div><input type="radio" name="option5" value="<?php echo $allInfo[4][4]?>" onclick="fun3()"> C: <?php echo $allInfo[4][4]."."?></div><hr>
            <div><input type="radio" name="option5" value="<?php echo $allInfo[4][5]?>" onclick="fun4()"> D: <?php echo $allInfo[4][5]."."?></div>
        <hr>
        <div></div><div></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-sm-0">
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="first5" class="size3">
                        First
                    </span>
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="pre5" class="size3">
                        Previous
                    </span>
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="next5" class="size3">
                        Next
                    </span>
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="last5" class="size3">
                        Last
                    </span>
                </div>
            </div>
        </div>
        </div>
        <div id="section6">
        <div class="jumbotron link1">
            <h2>6] <?php echo $allInfo[5][1]?></h2>
        </div>
        <hr>
            <div><input type="radio" name="option6" value="<?php echo $allInfo[5][2]?>" onclick="fun1()"> A: <?php echo $allInfo[5][2]."."?></div><hr>
            <div><input type="radio" name="option6" value="<?php echo $allInfo[5][3]?>" onclick="fun2()"> B: <?php echo $allInfo[5][3]."."?></div><hr>
            <div><input type="radio" name="option6" value="<?php echo $allInfo[5][4]?>" onclick="fun3()"> C: <?php echo $allInfo[5][4]."."?></div><hr>
            <div><input type="radio" name="option6" value="<?php echo $allInfo[5][5]?>" onclick="fun4()"> D: <?php echo $allInfo[5][5]."."?></div>
        <hr>
        <div></div><div></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-sm-0">
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="first6" class="size3">
                        First
                    </span>
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="pre6" class="size3">
                        Previous
                    </span>
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span class="disabled">
                        Next
                    </span>
                </div>
                <div class="col-lg-1 col-sm-12">
                    <span id="last6" class="size3">
                        Last
                    </span>
                </div>
            </div>
        </div>
        </div>
        <hr>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-sm-0">
                </div>
                <div class="col-lg-2 col-sm-12 justify-content-center">
                    <input name="submit" type="submit" value="SUBMIT">
                </div>
            </div>
        </div>
        </form>
        <hr>
<!--        <script src="../../others/allnew.js"></script>-->
        <script src="../quiz.js"></script>
        <script>
            document.getElementById('timer').innerHTML =
 05 + ":" + 00;
startTimer();

function startTimer() {
  var presentTime = document.getElementById('timer').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59){m=m-1}
  if(m==0&&s==0){alert('Quiz submitted automatically.');
        //window.location.href="#";
         document.forms['myForm'].submit();
   }
  
  document.getElementById('timer').innerHTML = m + ":" + s;
  setTimeout(startTimer, 1000);
}
function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
}
            $(document).ready(function(){
               $("#section1").show();
                $("#section2").hide();
                $("#section3").hide();
                $("#section4").hide();
                $("#section5").hide();
                $("#section6").hide();
            });
            $(document).ready(function(){
                $("#ques1,#first1,#first2,#first3,#first4,#first5,#first6,#pre2").click(function(){
                    $("#section1").show();
                    $("#section2").hide();
                    $("#section3").hide();
                    $("#section4").hide();
                    $("#section5").hide();
                    $("#section6").hide();
                });
                $("#ques2,#next1,#pre3").click(function(){
                    $("#section2").show();
                    $("#section1").hide();
                    $("#section3").hide();
                    $("#section4").hide();
                    $("#section5").hide();
                    $("#section6").hide();
                });
                $("#ques3,#next2,#pre4").click(function(){
                    $("#section3").show();
                    $("#section2").hide();
                    $("#section1").hide();
                    $("#section4").hide();
                    $("#section5").hide();
                    $("#section6").hide();
                });
                $("#ques4,#next3,#pre5").click(function(){
                    $("#section4").show();
                    $("#section2").hide();
                    $("#section3").hide();
                    $("#section1").hide();
                    $("#section5").hide();
                    $("#section6").hide();
                });
                $("#ques5,#next4,#pre6").click(function(){
                    $("#section5").show();
                    $("#section2").hide();
                    $("#section3").hide();
                    $("#section4").hide();
                    $("#section1").hide();
                    $("#section6").hide();
                });
                $("#ques6,#last1,#last2,#last3,#last4,#last5,#last6,#next5").click(function(){
                    $("#section6").show();
                    $("#section2").hide();
                    $("#section3").hide();
                    $("#section4").hide();
                    $("#section5").hide();
                    $("#section1").hide();
                });
            });
        </script>
   </BODY>
</HTML>