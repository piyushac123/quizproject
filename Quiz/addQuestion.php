<?php
    if($_POST['addQuestion']){
        $topic=$_POST['topic'];
        $ques=$_POST['question'];
        $ans=$_POST['answer'];
        $option1=$_POST['option1'];
        $option2=$_POST['option2'];
        $option3=$_POST['option3'];
        $option4=$_POST['option4'];
        
        if(file_exists("Questions/".$topic.".txt")){
            $arr = array();

            $dat = file_get_contents("Questions/".$topic.".txt");
            $str=0;
            #explode - split
            #FILTER_SANITIZE_FULL_SPECIAL_CHARS - remove special characters
            foreach(explode("\n",$dat) as $rec){
                $str++;
            }
            //echo $str."\n";
            file_put_contents('Questions/'.$topic.'.txt',$str."|".$ques."|".$option1."|".$option2."|".$option3."|".$option4."|".$ans."\n",FILE_APPEND);
            //echo "1";
        }
        else{
            file_put_contents('Questions/'.$topic.'.txt',"1|".$ques."|".$option1."|".$option2."|".$option3."|".$option4."|".$ans."\n",FILE_APPEND);
            //echo "2";
        }
        
    }
?>