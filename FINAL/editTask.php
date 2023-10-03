<?php
    $key=$_POST["key"];
    $changeFootPrint=$_POST["changeFootPrint"];
    $changeCost=$_POST["changeCost"];
    $changeDate=$_POST["changeDate"];
    $db = mysqli_connect( "localhost","root", "password","track" );
    mysqli_query($db,"UPDATE `track` SET `FootPrint`='$changeFootPrint',`Cost`='$changeCost',`Date`='$changeDate' WHERE `ID`='$key'");
    mysqli_close( $db );
?>
