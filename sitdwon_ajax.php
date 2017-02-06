<?php 
include('db.php');

if(!$_POST){
  echo "회원 등록에 필요한 정보를 입력해주세요.";
  exit;
}

$seatNum = $_POST['seatNum'];
$memNum = $_POST['memNum'];

echo $seatNum.$memNum;

 
$query="update seat set memberNum=$memNum where seatNum=$seatNum";



  $result = $my->query($query);




if($result){
  echo "회원등록 완료";
}else{
   echo "회원등록 실패";
}

echo "<meta http-equiv='refresh' content='0; url=index.php'>";
?>