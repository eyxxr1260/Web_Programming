<?php
$pw = $_POST["PW"];
$USER = $_POST["User"];
$db = mysqli_connect("localhost", "root", "pupu1123yaya","track");
//mysqli_select_db($db, "hw4");
$find = mysqli_query($db, "SELECT * FROM accounts");
$result = "No repeat account";
//https://www.w3schools.com/php/func_mysqli_fetch_assoc.asp  Procedural style
while ($exit = mysqli_fetch_assoc($find)) {
    if ($exit['UserName'] == $USER) {
        $result = "repeat account";
        echo $result;
        break;
    }
}
if (strcmp($result, "No repeat account") == 0) {
    mysqli_query($db, "INSERT INTO `accounts`(`UserName`, `password`) VALUES ('$USER','$pw')");
    echo $result;
}

mysqli_close($db);
?>