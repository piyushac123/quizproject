<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <TITLE>QUIZ</TITLE>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="quiz.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <style>
            body{
                 background: linear-gradient(to right,#403B4A,#E7E9BB);
                font-family: 'Molengo', Georgia, Times, serif;
            }
        </style>
    </HEAD>
    <BODY>
        <?php
            $con = mysqli_connect('localhost','root','','NewQUIZ');
            if (!$con) {
                die('Could not connect: ' . mysqli_error($con));
            }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-3 head">Quiz Time!</div>
                <div class="col-lg-3"></div>
                <div class="col-lg-2" style="margin-top: 100px;text-decoration:none;">
                    <button type="button" class="btn btn-secondary">
                        <a href="logout.php"><acronym title="SIGN OUT" class=" btn1">
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
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <a href="Bollywood/quizBollywood.php">
                        <img src="../images/bollywood.jpeg" alt="Bollywood" style="cursor:pointer;height:400px;width:350px;margin-top:100px;">
                    </a>
                    <div class="head1">Bollywood Dhamaka</div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <a href="Politics/quizPolitics.php">
                        <img src="../images/politics.jpg" alt="Politics" style="cursor:pointer;height:400px;width:350px;margin-top:100px;">
                    </a>
                    <div class="head1">Political India</div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <a href="Sports/quizSports.php">
                        <img src="../images/sports.jpeg" alt="Sports" style="cursor:pointer;height:400px;width:350px;margin-top:100px;">
                    </a>
                    <div class="head1">Let the Game Begins</div>
                </div>
            </div>
        </div>
        <?php
            mysqli_close($con);
        ?>
    </BODY>
</HTML>