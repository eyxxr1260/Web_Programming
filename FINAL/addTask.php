<?php
$USER = $_POST["User"];
$DATE = $_POST["date"];
$FootPrint = $_POST["FootPrint"];
$Cost = $_POST["Cost"];
$DB = mysqli_connect("localhost", "root", "password","track");
//mysqli_query($DB, "SELECT * FROM `track`");
mysqli_query($DB, "INSERT INTO track(`FootPrint`, `Cost`, `Date`, `UserName`) VALUES ('$FootPrint','$Cost','$DATE','$USER')");
mysqli_close($DB);
?>
