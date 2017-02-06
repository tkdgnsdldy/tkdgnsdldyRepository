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
    echo "데이터가 없습니다.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        
        table{
         border-collapse: collapse;
         text-align: center;        
        }
        td {
            border: 1px solid grey; 
            padding:4px; 
            text-decoration: ; 
        }

        tr:nth-child(even){
          background-color:#E4E4E4
        }

        tr:first-child {
            background-color: #191919;
            color:white;
        }

    </style>
</head>
<body>
<div style="margin-left:700px; margin-top:20px">
  <a href="index.php">홈가기</></a>
</div>

        <div style="margin:0 auto; width:99%;margin-top:30px">
           <table cellspacing="0" style="width:100%">
               <tr>
                   <td>이름</td>
                   <td>국적</td>
                   <td>입사일</td>
                   <td>소속</td>
                   <td>업무</td>
                   <td>상태</td>
                   <td>이메일</td>
                   <td>스카이프</td>
                   <td>전화번호(내선)</td>
                   <td>휴대폰번호</td>
                   <td>기타1</td>
                   <td>기타2</td>
               </tr>
           
           <?php 
                   for($i=0; $i < $result->num_rows; $i++){
                     echo "<tr>";
                     foreach ($arr[$i] as $val){
                        echo "<td>".$val."</td>";
                     }
                     echo "</tr>";
                   }
                
           ?>
           </table>
        </div>   
</body>
</html>