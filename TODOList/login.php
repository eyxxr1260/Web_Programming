<?php
$pw = $_POST["PW"];
$USER = $_POST["User"];

$db = mysqli_connect("localhost", "root", "password","s1091607_hw4");
if (!$db) {
    print("X connect the database");
}
// $exist = mysqli_query($db,"SELECT * FROM `accounts` WHERE `UserName` ='$USER' AND `password` =' $pw'");
// if($exist){
//     // $exist_result = mysqli_num_rows($exist);
//     print("Successful user login");

// }

// $wrong = mysqli_query($db,"SELECT * FROM accounts WHERE `UserName` ='$USER' AND `password` !=' $pw'");
// $wrong_result = mysqli_num_rows($wrong);

//print($exist_result);
// if($exist_result!=0){
//     print("Successful user login");
// }
// else if($wrong_result){
//     print("Password is incorrect");
// }
// else{
//     print("This account isn't existed");
// }
//mysqli_free_result($exist); 

$exist = mysqli_query($db, "SELECT * FROM accounts WHERE `UserName`='$USER'");
//https://www.w3schools.com/php/func_mysqli_fetch_assoc.asp  Procedural style
while ($find = mysqli_fetch_assoc($exist)) {//find內有每個row的資料(叫出子元素)
    //https://blog.csdn.net/weixin_31727797/article/details/112954216 好難
    if ($find['password'] == $pw) {
        $result = "find";
    } else if ($find['password'] != $pw) {
        $result = "wrong";
    }
}

if (strcmp($result, "find") == 0) {
    echo "Successful user login";
} else if (strcmp($result, "wrong")==0) {
    echo "Password is incorrect";
} else{
    echo "This account isn't existed";
}

mysqli_close($db);
?>