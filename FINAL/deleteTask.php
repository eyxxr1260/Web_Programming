<?php
    $key=$_POST["key"];
    $db = mysqli_connect( "localhost" , "root", "pupu1123yaya","track"  );
    mysqli_query($db,"DELETE FROM `track` WHERE `ID`='$key'");
    mysqli_close( $db );
?>
