<?php
    $con = mysqli_connect('localhost','root','','NewQUIZ');
            if (!$con) {
                die('Could not connect: ' . mysqli_error($con));
            }
    $sql4="UPDATE `Registration` SET `Flag`=0 WHERE Flag=1";
    $result4 = mysqli_query($con,$sql4);
?>
<script>
    alert("Logged Out Successfully");
    location.replace("http://localhost/NewQUIZ/Home/index.html");
</script>
<?php
mysqli_close($con);
?>