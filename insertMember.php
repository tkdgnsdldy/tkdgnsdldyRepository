


<?php 
include('db.php');

if(!$_POST){
  echo "회원 등록에 필요한 정보를 입력해주세요.";
  exit;
}

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


 
$query="insert into member (name,nationality,joindate,department,task,state,email,skypeId,innerTelNum,phoneNum,etc1,etc2) values ('$name','$nationality','$joindate','$department','$task','$state','$email','$skypeId','$innerTelNum','$phoneNum','$etc1','$etc1')";

  $result = $my->query($query);


if($result){
  echo "회원등록 완료";
}else{
   echo "회원등록 실패";
}

echo "<meta http-equiv='refresh' content='0; url=index.php'>";
?>
