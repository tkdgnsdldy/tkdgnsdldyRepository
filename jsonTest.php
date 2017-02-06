<?php
// header('Content-Type: application/json');

$my = new Mysqli('localhost', "k21inc","ekdrms114","k21office");

  $query = "select * from test1";


  if(mysqli_connect_errno()){
  	echo "try again , error";
  	exit;
  }
  echo "db접속 ok   dd<br>";

  $result = $my->query($query);

  if($result){
     echo "query result : true  <br> <br>" ;
  }else{
  	echo "query result : false  <br>";
  }

  $numRows = $result -> num_rows;

  echo "numResultRows = ". $numRows."<br><br>";

 $i =0;
 $json = array();
while($i <$numRows){
	$row = $result -> fetch_row();
   // echo $row[0]."<br>";
   // echo $row[1]."<br>";

   $json[$row[0]] = $row[1];
   $i++;
}


?>