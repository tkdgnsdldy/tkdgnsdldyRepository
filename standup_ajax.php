<?php 
include('db.php');

if(!$_GET){
  echo "memberInfo delete fail ";
  exit;
}

$seatNum = $_GET['seatNum'];



 
$query="update seat set memberNum=null where seatNum=$seatNum";

  $result = $my->query($query);


if($result){
  echo "1"; // 성공
}else{
   echo "0";  // 실패 
}


?>