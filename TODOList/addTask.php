<?php
$USER = $_POST["User"];
$DATE = $_POST["newDate"];
$newTask = $_POST["newTask"];
$DB = mysqli_connect("localhost", "root", "password","s1091607_hw4");
mysqli_query($DB, "INSERT INTO todolist(`ToDo`, `date`, `UserName`) VALUES ('$newTask','$DATE','$USER')");
mysqli_close($DB);
?>
