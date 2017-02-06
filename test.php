<?php

 
  $my = new Mysqli('localhost', "k21inc","ekdrms114","k21office");


$query="insert into test1 values (7,'kkk')";
  $query2 = "select * from test1";


  if(mysqli_connect_errno()){
  	echo "try again , error";
  	exit;
  }
  echo "db접속 ok   dd<br>";

  $result = $my->query($query2);

  if($result){
     echo "query result : true  <br> <br>" ;
  }else{
  	echo "query result : false  <br>";
  }

 


  echo var_dump($result);

  $numRows = $result -> num_rows;

  echo "numResultRows = ". $numRows."<br><br>";
  
// result -> num_rows; 
// result -> num_rows; 
//$row = $result -> fetch_row    
 $i =0;
while($i <$numRows){
	$row = $result -> fetch_row();
   echo $row[0]."<br>";
   echo $row[1]."<br>";
   $i++;
}
    $str = "ho'hahahaha'ho'ho";

  if(get_magic_quotes_gpc()){
  	echo "자동슬래쉬 삽입기능이 설정 되어 있습니다.";
  	
  }else {
  	echo "자동슬래쉬 삽입기능이 설정 되어 있지 않습니다.";
  	$str = addslashes($str);
  	echo "$str 애드슬래쉬스 추가값은 =".$str;
  }

  $query4 = "insert into test1 values (10,'".$str."')";

  $result = $my ->query($query4);

  if ($result){
  	echo "insert success";
  }else{
  	echo "insert fail";
  }


$query= "insert into test1 values (?,?);";

$stmt = $my ->prepare($query);
$num = 16;
$str = "stmt 삽입문";
$stmt->bind_param("is",$num, $str);
$stmt->execute();

echo $stmt->affected_rows."hohoho inserted";

echo "<br><br><br> -  ------------------------------------------절취선 <br><br><br>";



$json = '{"type":"textarea","size":8}';
$arr = json_decode($json,true);
print_r($arr);

echo $arr['size'];

var_dump($arr);

echo "<br><br><br> -  ------------------------------------------절취선 <br><br><br>";

$arr = array('fruit1' => 'apple', 'fruit2' => 'banana', 'test' => array('utf8' => 'A가★あ中!@'));
$json = json_encode($arr);
echo $json;


echo "<br><br><br> -  ------------------------------------------절취선 <br><br><br>";

$arr = json_decode($json,true);
print_r($arr);

$arrtest[0] = "sdfasd";

$arrtest[1] = "333";

echo $arrtest[1];

?>