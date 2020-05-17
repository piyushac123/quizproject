<?php
            $con = mysqli_connect('localhost','root','','NewQUIZ');
            if (!$con) {
                die('Could not connect: ' . mysqli_error($con));
            }
            if(isset($_POST['signup'])){
                $name= "'".$_POST['name']."'";
                $email= "'".$_POST['email']."'";
                $username= "'".$_POST['username']."'";
                $password= "'".$_POST['password']."'";
        
                $sqlupdate="UPDATE `Registration` SET `flag`=0 WHERE 1";
                    if ($con->query($sqlupdate) === FALSE) {
                    echo "Error: " . $sqlupdate . "<br>" . $con->error;
                    }
                
                $sql="INSERT INTO Registration (`Name`,`Email`, `Username`,`Password`,`Flag`)
                VALUES ($name,$email,$username,$password,1)";

                if ($con->query($sql) === FALSE) {
                    echo "Error: " . $sql . "<br>" . $con->error;
                }
                else{
                   ?>
                    <script>
                        location.replace("http://localhost/NewQUIZ/Quiz/quizHome.php");
                    </script>
                    <?php 
                }
            }
            mysqli_close($con);
?>
<!--ALTER TABLE tablename AUTO_INCREMENT = 1-->