<?php
    $key=$_POST["key"];
    $db = mysqli_connect( "localhost" , "root", "password","track"  );
    mysqli_query($db,"DELETE FROM `track` WHERE `ID`='$key'");
    mysqli_close( $db );
?>
