<?php
    $key=$_POST["key"];
    $changeTask=$_POST["changeTask"];
    $changeDate=$_POST["changeDate"];
   
    $db = mysqli_connect( "localhost","root", "password","s1091607_hw4" );
    //https://www.w3schools.com/mysql/mysql_update.asp  UPDATE
    mysqli_query($db,"UPDATE `todolist` SET `ToDo`='$changeTask',`date`='$changeDate' WHERE `ID`='$key'");
    mysqli_close( $db );
?>