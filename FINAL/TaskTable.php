<!-- <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="Reg-text.css"> -->
        <!-- <script>            
                function ToAdd()
                {
                    var FootPrint=$("#newFootPrint").val();
                    var Cost=$("#newCost").val();
                    //var User = $("#User").val(); 
                    //var date=document.getElementById("date").value;
                    var date= $("#newDate").val(); 
                    $.ajax({
                        url: "addTask.php",
                        data: {
                            User:User,
                            date:date,
                            FootPrint:FootPrint,
                            Cost:Cost
                        },
                        type: "POST",
                        datatype: "html",
                        success: function(VALUE ) {
                            alert("New task was successfully been added");
                            TaskTable();
                        }
                    });
                }
        </script>
    </head> -->
<?php
    $User=$_POST["User"];
    $db = mysqli_connect( "localhost" ,"root", "pupu1123yaya","track") ;
    //mysqli_select_db($db,"hw4" );
    $find=mysqli_query($db,"SELECT * FROM `track` WHERE `UserName`='$User'");
    
    print(
    '<table border="1" style="text-align: center";width="700px" id="ToDoLists"><tr>'.
    '<td>編號</td>'.
    '<td>食衣住行地點</td>'.
    '<td>消費金額</td>'.
    '<td>日期</td>'.
    '<td>編輯</td>'.
    '<td>刪除</td><tr>');
    
    $n=0;
    while ($exist = mysqli_fetch_assoc($find))
    {  
        $FootPrint=$exist['FootPrint'];//<p id="kkk" style="color:red">
        $Cost=$exist['Cost'];
        $FootPrint_date=$exist['Date'];
        $FootPrint_id_edit='id="'.$exist['ID'].'E"';
        $FootPrint_id_delete='id="'.$exist['ID'].'D"';
        print('<tr><td><p>'.++$n.'</p></td>'.
                    '<td><p>'.$FootPrint.'</p></td>'.
                    '<td><p>'.$Cost.'</p></td>'.
                    '<td><p>'.$FootPrint_date.'</p></td>'.
                    '<td>'.
                        '<input type="button"'.
                        ' class="btn" '.
                        $FootPrint_id_edit.
                        ' value="Edit" '.
                        'onclick="ToEdit()"'.
                        ' />'.
                    '</td>'.
                    '<td>'.
                        '<input type="button" '.
                        'class="btn" '.
                        $FootPrint_id_delete.
                        ' value="Clear"'.
                        ' onclick="ToDelete()"'.
                        '/>'.
                    '</td>'.
                    '</tr>');
    }
    print("</table>");
    mysqli_close( $db );
?>
<!-- </html> -->
