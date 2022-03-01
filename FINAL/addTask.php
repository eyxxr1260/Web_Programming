<?php
$USER = $_POST["User"];
$DATE = $_POST["date"];
$FootPrint = $_POST["FootPrint"];
$Cost = $_POST["Cost"];
$DB = mysqli_connect("localhost", "root", "pupu1123yaya","track");
//mysqli_query($DB, "SELECT * FROM `track`");
mysqli_query($DB, "INSERT INTO track(`FootPrint`, `Cost`, `Date`, `UserName`) VALUES ('$FootPrint','$Cost','$DATE','$USER')");
mysqli_close($DB);
?>
