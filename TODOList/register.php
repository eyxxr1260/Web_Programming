<?php
$pw = $_POST["PW"];
$USER = $_POST["User"];
$db = mysqli_connect("localhost", "root", "password","s1091607_hw4");
$find = mysqli_query($db, "SELECT * FROM accounts");
$result = "No repeat account";
//https://www.w3schools.com/php/func_mysqli_fetch_assoc.asp  Procedural style
while ($exit = mysqli_fetch_assoc($find)) {//好難ㄛ
    if ($exit['UserName'] == $USER) {
        // echo "此帳號已有人註冊";
        $result = "repeat account";
        echo $result;
        break;
    }
}
//print("此帳號已有人註冊");
if (strcmp($result, "No repeat account") == 0) {
    mysqli_query($db, "INSERT INTO `accounts`(`UserName`, `password`) VALUES ('$USER','$pw')");
    echo $result;
}
mysqli_close($db);
?>