<?php 	
$db = new mysqli("localhost","k21inc","ekdrms114","k21office");

 if($db->errno){
 	echo "db 접속 실패";
 }

 $query = "select * from member";

 $res = $db -> query($query);

   $num = $res->num_rows;

   echo $num;

   echo "영향받은 행수 " . $db->affected_rows."행 <br>";

   for ($i=0; $i <$num ; $i++) { 
     $row = $res->fetch_assoc();

     echo "$row[memberNum]";
   } 

   $double = "943.112";

   echo "<br>".doubleval($double);
?>