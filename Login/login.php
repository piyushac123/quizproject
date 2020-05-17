<?php
            $con = mysqli_connect('localhost','root','','NewQUIZ');
            if (!$con) {
                die('Could not connect: ' . mysqli_error($con));
            }
            if(isset($_POST['signin'])){
                $username= $_POST['username'];
                $password= $_POST['password'];
                
                $sql="select Username,Password from Registration";
                $result = mysqli_query($con,$sql);
                $flag=0;
                //echo $username." ".$password."<br>";
                while($row = mysqli_fetch_array($result)){
                    if($row['Username']==$username && $row['Password']==$password){
                        $flag=1;
                            $sql1="UPDATE `Registration` SET `flag`=1 WHERE Username='".$username."' AND Password='".$password."'";
                         $result1 = mysqli_query($con,$sql1);
                         $sqlupdate="UPDATE `Registration` SET `flag`=0 WHERE Username<>'".$username."' AND Password<>'".$password."'";
                         $result2 = mysqli_query($con,$sqlupdate);
                        ?>
                        <script>
                            alert("Logged In Successfully");
                            location.replace("http://localhost/NewQUIZ/Quiz/quizHome.php");
                        </script>
                        <?php
                           break;
                        }
                    //echo $row['Username']." ".$row['Password']."<br>";
                    }
                if($flag!=1){
                    ?>
                    <script>
                    alert("Match not found");
                    window.history.go(-1);
                    </script>
                <?php
                }
            }
                
            mysqli_close($con);
?>
<!--ALTER TABLE tablename AUTO_INCREMENT = 1-->
