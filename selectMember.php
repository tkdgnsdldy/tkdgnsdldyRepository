


<?php 
header('Content-Type: text/html;charset=utf-8');  
// header("Content-Type:application/json");

include('db.php');


 
$query="select * from member";

$result = $my -> query($query);

if ($result->num_rows > 0) {
    // output data of each row
    $i = 0;

    while($row = $result->fetch_assoc()) {
        // echo "이름: " . $row["name"]. " - 국적: " . $row["nationality"]. " - 부서: " . $row["department"]. "- 업무 " . $row["task"]. " - 상태: " . $row["state"]. " - 이메일: " . $row["email"]. " - 스카이프아이디: " . $row["skypeId"]. " - 내선번호: " . $row["innerTelNum"]. " - 핸드폰번호: " . $row["phoneNum"]. " - 기타1: " . $row["etc1"]. " - 기타2: " . $row["etc2"]."<br><br>";
    
    	$arr[$i]['name'] = $row["name"];
    	$arr[$i]['nationality'] =  $row["nationality"];
        $arr[$i]['joindate'] =  $row["joindate"];
    	$arr[$i]['department'] =  $row["department"];
    	$arr[$i]['task']  = $row["task"];
    	$arr[$i]['state'] = $row["state"];
    	$arr[$i]['email'] = $row["email"];
    	$arr[$i]['skypeId'] = $row["skypeId"];
    	$arr[$i]['innerTelNum']= $row["innerTelNum"];
    	$arr[$i]['phoneNum']=  $row["phoneNum"];
    	$arr[$i]['etc1'] = $row["etc1"];
    	$arr[$i]['etc2'] = $row["etc2"];
    	$i++;
    }
} else {
    echo "0 results";
}


  
// 3, 4 최종 결과 데이터를 JSON 스트링으로 변환 후 출력
echo json_encode($arr,JSON_UNESCAPED_UNICODE);

?>
