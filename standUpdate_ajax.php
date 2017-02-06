<?php 
include('db.php');

if(!$_POST){
  echo "memberInfo update fail ";
  exit;
}

$seatNum = $_POST['seatNum'];
$name = $_POST['name'];
$nationality = $_POST['nationality'];
$joindate = date("Y-m-d", strtotime( $_POST['joindate']));
$department = $_POST['department'];
$task = $_POST['task'];
$state = $_POST['state'];
$email = $_POST['email'];
$skypeId = $_POST['skypeId'];
$innerTelNum = $_POST['innerTelNum'];
$phoneNum = $_POST['phoneNum'];
$etc1= $_POST['etc1'];
$etc2= $_POST['etc2'];


$query = "select memberNum from seat where seatNum =$seatNum " ;

 
  $result = $my->query($query);

   $row = $result->fetch_assoc();

   $memNum = $row['memberNum'];

 

$query2 = "update member set name='$name',nationality='$nationality',joindate='$joindate',department='$department',task='$task',state='$state',email='$email',skypeId='$skypeId',innerTelNum='$innerTelNum',phoneNum='$phoneNum',etc1='$etc1',etc2='$etc2' where memberNum=$memNum";

  $res = $my->query($query2);


if($res){
  echo "update success"; // 성공
}else{
   // echo "0";  // 실패 
	echo "update fail";
}


?>