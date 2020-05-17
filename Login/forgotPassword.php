<?php
            $con = mysqli_connect('localhost','root','','NewQUIZ');
            if (!$con) {
                die('Could not connect: ' . mysqli_error($con));
            }
            if(isset($_POST['chgpass'])){
                $email= $_POST['email'];
                $password= $_POST['nPassword'];
                
                $sql="select Email from Registration";
                        $result = mysqli_query($con,$sql);
                        $flag=0;
                        while($row = mysqli_fetch_array($result)){
                            if($row['Email']==$email){
                                $flag=1;
                                    $sqlupdate="UPDATE `Registration` SET `Password`='".$password."' WHERE Email='".$email."'";
                            if ($con->query($sqlupdate) === FALSE) {
                                echo "Error: " . $sqlupdate . "<br>" . $con->error;
                            }
                            else{
                                ?>
                                <script>
                                    alert("Password Updated Successfully");
                                    location.replace("http://localhost/NewQUIZ/Login/login.html");
                                </script>
                                <?php
                                    break;
                                }
                            }
                        }
                
                    if($flag!=1){?>
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