<!-- <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="Reg-text.css"> -->
        <!-- <script>             
            function ToDelete()
            {
                var key= $(event.target)[0].id;
                key = key.substring(0, key.length - 1);
                $.ajax({
                    url: "deleteTask.php",
                    data: {
                        key:key
                    },
                    type: "POST",
                    datatype: "html",
                    success: function( VALUE ) {
                        alert("This task has already been deleted!");
                        TaskTable();
                    }
                }); 
            }
            function ToEdit()
            {
                var key= $(event.target)[0].id;
                key = key.substring(0, key.length - 1);
                document.getElementById("editList").innerHTML=
                '<form id="editList" style="text-align: center">'+'<p>'+
                    '<input type="text"'+
                        'id="changeTask" '+
                        'class="newInputStyle"  '+
                        'required '+
                    '/> '+
                //----------------------------------    
                    '<input type="date" '+
                        'class="newInputStyle" '+
                        'id="changeDate" '+
                        'required '+
                    '/>'+
                //-----------------------------------
                    '<input type="button"'+
                        ' id="newBtnStyle" '+
                        'onclick="EditList('+key+')" '+
                        'value="Confirm"'+
                    '/></p>'+
                '</form>';
            }

            function EditList(key)//KEY是清單指定欄位的編號
            {
                var changeDate = $("#changeDate").val();
                var changeTask = $("#changeTask").val();
                $.ajax({
                    url: "editTask.php",
                    data: {
                        key:key,
                        changeTask:changeTask,
                        changeDate:changeDate
                    },
                    type: "POST",
                    datatype: "html",
                    success: function( VALUE ) {
                        alert("This task has successfully been edited!");
                        TaskTable();
                    }
                }); 
            }
        </script>
    </head> -->
<?php
    $User=$_POST["User"];
    $db = mysqli_connect( "localhost" ,"root", "password","s1091607_hw4") ;
    $find=mysqli_query($db,"SELECT * FROM `todolist` WHERE `UserName`='$User'");
    
    print('<table  style="text-align: center";width="500px" id="ToDoLists"><tr>'.
    '<td>代辦事項</td>'.
    '<td>日期</td>'.
    '<td>編輯</td>'.
    '<td>刪除</td><tr>');
    while ($exist = mysqli_fetch_assoc($find))
    {
        date_default_timezone_set("Asia/Taipei");//調時差
        if(strcmp($exist['date'],date("Y-m-d"))!=0)
        {
            $changeColor='style="color:black"><p><font size="4">';
        }
        else if(strcmp($exist['date'],date("Y-m-d"))==0)
        {  
            $changeColor='style="color:red"><p><font size="5">';
        }
       //當天日期要做完的事情要改成紅色
        $to_do_list=$exist['ToDo'];//<p id="kkk" style="color:red">
        $to_do_date=$exist['date'];
        //$to_do_id_edit='id="'.$exist['ID'];
        // $to_do_id_delete='id="'.$exist['ID'];
        $to_do_id_edit='id="'.$exist['ID'].'E"';
        $to_do_id_delete='id="'.$exist['ID'].'D"';
        print('<tr>'.
            '<td '.$changeColor.$to_do_list.'</p></font></td>'.
            '<td '.$changeColor.$to_do_date.'</p></font></td>'.
        '<td>'.
            '<input type="button"'.
                ' class="btn" '.
                $to_do_id_edit.
                ' value="Edit" '.
                'onclick="ToEdit()"'.
            '/>'.
        '</td>'.
        '<td>'.
            '<input type="button"'.
                ' class="btn" '.
                $to_do_id_delete.
                ' value="Clear" '.
                'onclick="ToDelete()"'.
            '/>'.
        '</td>'.
           '</tr>');
    }
    print("</table>");
    mysqli_close( $db );
?>
<!-- </html> -->