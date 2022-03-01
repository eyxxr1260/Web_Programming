<?php
header("Access-Control-Allow-Origin: *");
$dist = $_POST["dist"];
$date = $_POST["date"];
$context  = stream_context_create(array('http' => array('header' => 'Accept: application/json')));
$url = "https://covid-19.nchc.org.tw/api/covid19?CK=covid-19@nchc.org.tw&querydata=5001&limited=全部縣市" ;
$xml = file_get_contents($url, false, $context);
$xml = json_decode($xml);
#print_r($xml);
print ("<p class='distshow'>縣市:$dist</p>");
print ("<table class='tableshow table table-hover'><tr><td>公布時間</td><td>行政區</td><td>性別</td><td>年齡</td></tr>");
$number=0;
//$a=array(0,0,0,0,0,0,0,0,0,0,0,0,0);
foreach ($xml as $key)
{

     $d = $key->{"a03"};
     $time=$key->{"a02"};
    date_default_timezone_set("Asia/Taipei");
    if((strcmp($time,$date))==0 and (strcmp($d,$dist))==0){ 
        $dists=$key->{"a04"};
        $sex = $key->{"a05"};
        $age = $key->{"a07"};  
        print ("<tr><td>$time</td><td>$dists</td><td>$sex</td><td>$age</td></tr>");
        $number+=1;
    }
    /*$city = array("台北市","新北市","桃園市","基隆市","宜蘭縣","連江縣","新竹市","新竹縣","苗栗縣","台中市","南投縣","彰化縣","雲林縣","嘉義縣","台南市","高雄市","屏東縣","澎湖縣","台東縣","花蓮縣","台東縣");
    if((strcmp($time,$date))==0){ 
        for($i=0;$i<20;$i++){
            if((strcmp($d,$city[$i]))==0){
                $a[$i]++;
            }
        }
        
    }  */
}
if($age==""){
    print("<script>alert('病例+0喔')</script>");  

}
print ("<tr><td>總數:</td><td> </td><td> </td><td>$number</td></tr>");
print ("</table>");
/*function array_merge_more($city,$a){

    // 检查参数是否正确
    if(!$city || !is_array($city) || !$a || !is_array($a) || count($city)!=count($a)){
        return array();
    }

    // 一维数组中最大长度
    $max_len = 0;

    // 整理数据，把所有一维数组转重新索引
    for($j=0,$len=count($a); $j<$len; $j++){
        $a[$j] = array_values($a[$j]);

        if(count($a[$j])>$max_len){
            $max_len = count($a[$j]);
        }
    }

    // 合拼数据
    $result = array()k;

    for($k=0; $k<$max_len; $k++){
        $tmp = array();
        foreach($city as $m=>$n){
            if(isset($a[$m][$j])){
                $tmp[$n] = $arrs[$m][$j];
            }
        }
        $result[] = $tmp;
    }

    return $result;

}
// Open a file in write mode ('w')
$fp = fopen('./temp.csv', 'w');
  
// Loop through file pointer and a line
foreach ($result as $res) {
    fputcsv($fp, $res);
}
fclose($fp);
$temp = fopen("./temp.csv", "w")*/

$row = 1;
if (($handle = fopen("./points.csv", "r")) !== FALSE) {
    print ("<br><p class='distshow'>$dist 快篩站</p>");
    echo '<center><table border="1" class="size table table-hover">';

    
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        
        $num = count($data);    
        if ($row == 1) {
            echo '<thead><tr>';
        }else{
            echo '<tr>';
        }
        
        
        for ($c=0; $c < $num; $c++) {
            //echo $data[$c] . "<br />\n";
            if(empty($data[$c])) {
               $value = "&nbsp;";
            }else{
               $value = $data[$c];
            }
            if ($row == 1) {
                echo '<th class="thshow">'.$value.'</th>';
            }else{
                if((strcmp($value,$dist))==0){
                    echo '<td class="tdshow">'.$data[0].'</td>'.'<td class="tdshow">'.$data[1].'</td>'.'<td class="tdshow">'.$data[2].'</td>';
                }
                
            }
        }
       
        if ($row == 1) {
            echo '</tr></thead><tbody>';
        }else{
            echo '</tr>';
        }
        $row++;
    }
   
    echo '</tbody></table></center>';
    fclose($handle);
}
/*echo json_encode($temp)*/
?>

<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load("current", { 'packages': ["corechart"] });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var temp = <?php echo json_encode($temp); ?>;
        
        /*var city = [
          "台北市",
          "桃園市",
          "新北市",
          "高雄市",
          "台南市",
          "台中市",
          "台東縣",
          "花蓮縣",
          "宜蘭縣",
          "苗栗縣",
          "彰化縣",
          "南投縣",
          "境外移入",
        ];*/
        /*var data = google.visualization.arrayToDataTable([
          ["縣市", "確診數"],
          //["台北市", 1],
        ]);
        for (var i = 0; i < 13; i++) {
           for(var j=0;j<2;j++){
              if(j==0){
              data[i].push(city[i]);
              }
              else{
               data[i].push(a[i]);
              }
           }
           console.log(a[i]);
        }*/
        var data = new google.visualization.DataTable(temp);
       /*data.addColumn('string', '縣市');
       data.addColumn('number', 'Populartiy');
       //data.addRows(12);
       for (var i = 0; i<13; i++) {
           /*for(var j=0;j<2;j++){
               if(j==0){
                data.setCell(i,j,city[i]);
               }
               else{
                data.setCell(i,j,a[i]);
               }
            
           }
           data.addColumn([city[i],a[i]]);
       }*/

       console.log(data)
        var options = {
          title: "當日確診縣市",
        };

        var chart = new google.visualization.PieChart(document.getElementById("piechart"));

        chart.draw(data, options);
      }
    </script> -->
    
