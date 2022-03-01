<?php
$pw = $_POST["PW"];
$USER = $_POST["User"];

$db = mysqli_connect("localhost", "root", "pupu1123yaya","track");
if (!$db) {
    print("X connect the database");
}


$exist = mysqli_query($db, "SELECT * FROM accounts WHERE `UserName`='$USER'");
//https://www.w3schools.com/php/func_mysqli_fetch_assoc.asp  Procedural style
while ($find = mysqli_fetch_assoc($exist)) {
    if ($find['password'] == $pw) {
        $result = "find";
    } else if ($find['password'] != $pw) {
        $result = "wrong";
    }
}

switch ($result) {
    case "find":
        echo "Successful user login";
        break;
    case "wrong":
        echo "Password is incorrect";
        break;
    default:
        echo "This account isn't existed";
}

mysqli_close($db);
?>