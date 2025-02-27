<?php

require_once('TCPDF/tcpdf_import.php');
require_once('phpqrcode/qrlib.php');

/*---------------- Sent Mail Start -----------------*/

$studentname = $_POST['studentname'];
$email = $_POST['email'];
$grade = $_POST['grade'];
$phone = $_POST['phone'];
$department = $_POST['department'];
$studentid = $_POST['studentid'];
$comments = $_POST['comments'];

mb_internal_encoding("utf-8");
$to=$email;
$subject=mb_encode_mimeheader("四資迎新報名成功!","utf-8");
$message="
  <p>恭喜您成功報名元智大學2021四資迎新</p>
  <p>以下是您所填的資料，請確認</p>
  <table>
    <tr>
      <td>姓名:</td><td>$studentname</td>
    </tr>
    <tr>
      <td>學號:</td><td>$studentid</td>
    </tr>
    <tr>
      <td>年級:</td><td>$grade</td>
    </tr>
    <tr>
      <td>科系:</td><td>$department</td>
    </tr>
    <tr>
      <td>手機號碼:</td><td>$phone</td>
    </tr>
    <tr>
      <td>特別註明:</td><td>$comments</td>
    </tr>
  </table>
  <img src='http://140.138.77.70/~s1091607/HW2/qrcode/$studentid.png'>
";
$headers="MIME-Version: 1.0\r\n" ;
$headers.="Content-type: text/html; charset=utf-8\r\n";
$headers.="From:".mb_encode_mimeheader("s1091607@mail.yzu.edu.tw" ,"utf-8");
mail($to,$subject,$message,$headers);

/*---------------- Sent Mail End -------------------*/

/*---------------- Print PDF Start -----------------*/
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('cid0jp','', 18); 
$pdf->AddPage();

$studentname = $_POST['studentname'];
$email = $_POST['email'];
$grade = $_POST['grade'];
$department = $_POST['department'];
$phone = $_POST['phone'];
$studentid = $_POST['studentid'];
$comments = $_POST['comments'];

$html = <<<EOF
<table border="1" style="padding:10px">
<tr>
	<td style="background-color:#D7E5DD">年級 : </td>
	<td>$grade</td>
	<td style="background-color:#D7E5DD">科系 : </td>
	<td>$department</td>
</tr>
<tr>
	<td style="background-color:#D7E5DD">姓名 : </td>
	<td>$studentname</td>
	<td style="background-color:#D7E5DD">學號 : </td>
	<td>$studentid</td>
</tr>
<tr>
	<td style="background-color:#D7E5DD">手機號碼 : </td>
	<td colspan="3">$phone</td>
</tr>	
<tr>
	<td style="background-color:#D7E5DD">電子信箱 : </td>
	<td colspan="3">$email</td>
</tr>
<tr>
	<td style="background-color:#D7E5DD">特別備註 : </td>
	<td colspan="3">$comments</td>
</tr>
</table>
EOF;
/*---------------- Print PDF End -------------------*/

$pdf->writeHTML($html);
$pdf->lastPage();
$pdf->Output('/home/s1091607/public_html/HW2/pdf/'.$studentid.'.pdf', 'I');
$pdf->Output('/home/s1091607/public_html/HW2/pdf/'.$studentid.'.pdf', 'F');
QRcode::png('http://140.138.77.70/~s1091607/HW2/pdf/'.$studentid.'.pdf', '/home/s1091607/public_html/HW2/qrcode/'.$studentid.'.png');

