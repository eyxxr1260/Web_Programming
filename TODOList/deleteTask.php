<?php
    $key=$_POST["key"];
    $DB = mysqli_connect( "localhost" , "root", "password","s1091607_hw4" );
    mysqli_query($DB,"DELETE FROM `todolist` WHERE `ID`='$key'");
    //echo "This task has already canceled!";
    mysqli_close( $DB );
?>
