<?php 

include('db.php');



// 멤버 로딩  소스


$query="select s.seatNum, m.memberNum , m.name, m.nationality,m.joindate, m.department, m.task, m.state, m.email, m.skypeId, m.innerTelNum, m.phoneNum, m.etc1, m.etc2, s.seatNum from member as m 
join seat as s on m.membernum = s.membernum ; ";

$result = $my -> query($query);

if ($result->num_rows > 0) {
    // output data of each row
    $i = 0;


    while($row = $result->fetch_assoc()) {
    	$i = $row["seatNum"];
    	$arr[$i]['memberNum'] = $row["memberNum"];
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
    echo "데이터가 없습니다.(멤버자리로딩)";
}
// var_dump($arr);
// exit;
 $jsonString = json_encode($arr);


// 멤버 로딩 소스 end


//멤버 등록 데이터  소스

$query="select * from member";

$result = $my -> query($query);

if ($result->num_rows > 0) {
    // output data of each row

 $i= 0;
    while($row = $result->fetch_assoc()) {
    	$allMember[$i]['memberNum'] = $row["memberNum"];
    	$allMember[$i]['name'] = $row["name"];
    	$allMember[$i]['nationality'] =  $row["nationality"];
        $allMember[$i]['joindate'] =  $row["joindate"];
    	$allMember[$i]['department'] =  $row["department"];
    	$allMember[$i]['task']  = $row["task"];
    	$allMember[$i]['state'] = $row["state"];
    	$allMember[$i]['email'] = $row["email"];
    	$allMember[$i]['skypeId'] = $row["skypeId"];
    	$allMember[$i]['innerTelNum']= $row["innerTelNum"];
    	$allMember[$i]['phoneNum']=  $row["phoneNum"];
    	$allMember[$i]['etc1'] = $row["etc1"];
    	$allMember[$i]['etc2'] = $row["etc2"];
    	$i++;
    }
} else {
    echo "데이터가 없습니다.(멤버 등록용)";
}
// echo var_dump($allMember);
// exit;
 $jsonString = json_encode($arr);


 $json_allMember= json_encode($allMember);

 // echo $json_allMember;
 // exit;



//멤버 등록 데이터  소스 끝

?>


<!DOCTYPE html>
<html lang="en">
<head>	
	<meta charset="UTF-8">
	<title>office</title>
	<script src="jquery.min.js"></script>

	 <script>
		$(document).ready(function(){
         

            // 자리로딩용
            var memArr = <?php echo $jsonString?>;

            // 직원 등록용
           
            memNum = <?php echo $json_allMember ? $json_allMember : 'null' ?>;
            console.log(memNum);
            // console.log(memArr[13]['name']);
            	var $allEmploy= $("div.employ");
                $allEmploy.css("background-color","#F6F6F6");
	        	// this.style.backgroundColor="#B2EBF4";	
	     


           $("#sitdownDiv").hide();
	        
           $("div.employ").each(function(index, element){
                  // console.log($(element).attr("data-seat"));
                  // if($(element).attr("data-seat")== )
          
                $(this).append($("<span></span>").text($(this).attr("data-seat"))).append("<div style='display:inline-block;margin-top:-16px'></div>");
             
              
	            var posTop = $(this).position().top; 
	            var posLeft = $(this).position().left+ $(this).width()+6;	     
	        	var memberInfo = $("<table cellspacing='0' class='info_table'></table>");
	        	var memberNum = $(this).attr("data-seat");
                memberInfo.attr("data-seat",memberNum);
                var check = true;
                for(var obj in memArr){
                	
                	
                     if($(this).attr("data-seat")== obj ){
                     	check=false;
                     }
                  }
              
                if(check){
                	$(this).append("<br><span>empty</span><br><br>");
                	$(this).append("<button class='sitdown'>assign</button");
                	console.log("true");
                	return true;
                }
                 
                 var str = memArr[memberNum]['name'].replace("(","<br>(");

                var name = $("<span>").html(str).append("<br>").css("font-weight","700");
                var task = $("<span>").text(memArr[memberNum]['task']).append("<br>");
                var state = $("<span>").text(memArr[memberNum]['state']);

                 // $(this).append(name).append(task).append(state).css("cursor","help");

                 $(this).append("<br>").append(name).append(task).css("cursor","help");
                 
                 if(state.text() == "on duty"){
                    $(this).css("background-color","#B2EBF4");
                 }else if(state.text() == "vacation"){
                       $(this).css("background-color","#FFB2D9");
                 }else if(state.text() == "businessTrip"){
                 	   $(this).css("background-color","#FFC19E");
                 }

              
	        	var tr = $( "<tr>", { class: "name", html: $( "<td>", { text: "name" } ) });
	        	var td = $( "<td>", {  text:  memArr[memberNum]['name'] });
	        	tr.append(td);
	        	memberInfo.append(tr);

	        	var tr = $( "<tr>", { class: "nationality", html: $( "<td>", { text: "nationality" } ) });
	        	var td = $( "<td>", {  text:  memArr[memberNum]['nationality'] });
	        	tr.append(td);
	        	memberInfo.append(tr);	        	

	        	var tr = $( "<tr>", { class: "joindate", html: $( "<td>", { text: "joindate" } ) });
	        	var td = $( "<td>", {  text:  memArr[memberNum]['joindate'] });
	        	tr.append(td);
	        	memberInfo.append(tr);

	        	var tr = $( "<tr>", { class: "department", html: $( "<td>", { text: "department" } ) });
	        	var td = $( "<td>", {  text:  memArr[memberNum]['department'] });
	        	tr.append(td);
	        	memberInfo.append(tr);

	        	var tr = $( "<tr>", { class: "task", html: $( "<td>", { text: "task" } ) });
	        	var td = $( "<td>", {  text:  memArr[memberNum]['task'] });
	        	tr.append(td);
	        	memberInfo.append(tr);

	        	var tr = $( "<tr>", { class: "state", html: $( "<td>", { text: "state" } ) });
	        	var td = $( "<td>", {  text:  memArr[memberNum]['state'] });
	        	tr.append(td);
	        	memberInfo.append(tr);

	        	var tr = $( "<tr>", { class: "email", html: $( "<td>", { text: "email" } ) });
	        	var td = $( "<td>", {  text:  memArr[memberNum]['email'] });
	        	tr.append(td);
	        	memberInfo.append(tr);

	        	var tr = $( "<tr>", { class: "skypeId", html: $( "<td>", { text: "skypeId" } ) });
	        	var td = $( "<td>", {  text:  memArr[memberNum]['skypeId'] });
	        	tr.append(td);
	        	memberInfo.append(tr);

	        	var tr = $( "<tr>", { class: "innerTelNum", html: $( "<td>", { text: "innerTelNum" } ) });
	        	var td = $( "<td>", {  text:  memArr[memberNum]['innerTelNum'] });
	        	tr.append(td);
	        	memberInfo.append(tr);

	        	var tr = $( "<tr>", { class: "phoneNum", html: $( "<td>", { text: "mobileNum" } ) });
	        	var td = $( "<td>", {  text:  memArr[memberNum]['phoneNum'] });
	        	tr.append(td);
	        	memberInfo.append(tr);

	        	var tr = $( "<tr>", { class: "etc1", html: $( "<td>", { text: "etc1" } ) });
	        	var td = $( "<td>", {  text:  memArr[memberNum]['etc1'] });
	        	tr.append(td);
	        	memberInfo.append(tr);

	        	var tr = $( "<tr>", { class: "etc2", html: $( "<td>", { text: "etc2" } ) });
	        	var td = $( "<td>", {  text:  memArr[memberNum]['etc2'] });
	        	tr.append(td);
	        	memberInfo.append(tr);


	        	var button = "<tr><td colspan='2' style='text-align:center'><button class='updateMember'>change</button><button class='standupMember'>delete</button></td></tr>"; 
	        	memberInfo.append(button);






               
               

                // newElement.css("z-index","999");
                memberInfo.css("position","absolute");
               
	        	$("div.office").prepend(memberInfo);	        	
	        	 memberInfo.animate({top:posTop,left:posLeft,height: "toggle"}); 
                 // foreach(obj in memArr){

                 // }
            });
           
            $(".info_table").hide();

			$("#insertMemberDiv").hide();
			// IMD means insertMemberDiv 
		

            //insertMemberbtn 관련    
			$("#closeIMD").click(function(){
				$("#insertMemberDiv").hide();				
			});

            $("#insertMemberBtn").click(showInsertMemberForm);

             //insertMemberbtn 관련 끝 


            // 직원 자리에 앉히는 폼 


            	$("#closeSitdown").click(function(){
			
				$("#sitdownDiv").hide();
			    });
           
            $(document).on('click',"button.sitdown",showSitdownForm);

            $(document).on('click',"table.clone ",function(){
            	    e.stopPropagation();
            });


	        
	        $("div.employ").click(function(){	

                

	        	var num = $(this).attr("data-seat");
	        	var seat = $("table.info_table").filter(function(){
                      if($(this).attr("data-seat") == num){
                      	return true;
                      }
	        	}); 
	        	seat.toggle();


            
	        });

	        $(document).on("click",".info_table",function(){
                   // $(".info_table").hide();
                   // $(this).hide();
	        });
            $(document).on("click","#sendMemberCancle",function(){
                  
                  $(this).parent().parent().parent().remove();
          });


	         $("button.updateMember").click(function(e){
	       
                var parent = $(this).parent().parent().parent(); // table
                parent.hide();
     
                var seatNum = parent.attr("data-seat");
             
                // var  param =  parent.wrap("<form></form>").parent().serialize();
				
				var clone = parent.clone();
				clone.addClass("clone");
				// alert(clone[0].nodeName);
				clone.appendTo("body");
				clone.offset({top: parent.position().top, left: parent.position().left}).show();
                
                
                var tr = clone.find("tr");


              // tr.find("td:last-child").html("<input>").find("input").attr("name",tr.attr("class"));

              for(var i=0; i<tr.length; i++){
 
              
              	 // alert(tr.length);
       				name = tr[i].getAttribute("class");
	                value = $(tr[i]).find("td:last-child").text();
	               
	                if(i<10){
	                	if(i==5){
	                		$(tr[i]).find("td:last-child").html("<select id='selInUpdate'><option value='on duty'>on duty</option><option value='vacation'>vacation</option><option value='businessTrip'>businessTrip</option></select").find("select").attr("name",name);
	                		continue;
	                	}
	                $(tr[i]).find("td:last-child").html("<input>").find("input").attr("name",name).val(value);
	               
	               }else if(i<12){
	               	$(tr[i]).find("td:last-child").html("<textarea>").find("textarea").attr("name",name).val(value);
	               }else{

              	   $(tr[i]).find("td").html("<button id='sendMemberUpdate'>confirm</button><button id='sendMemberCancle'>cancle</button>");
              	  
	               }
             
              } //end for


                


				e.preventDefault();
                e.stopPropagation();

                
	         });
             $(document).on("click","select#selInUpdate",function(){
                    e.stopPropagation();
             });

              $(document).on("click","button#sendMemberUpdate",function(e){
    
              	
              	var form =	$(this).parent().parent().parent().wrap("<form></form>").parent();
              	
               var seatNum = $(this).parent().parent().parent().attr("data-seat");
               seatNum = "&seatNum="+seatNum;
               var param = $(this).parent().parent().parent().wrap("<form></form>").parent().serialize();
              param += seatNum;
            
     

				    $.ajax({
				        type : "POST",  
				        url : "standUpdate_ajax.php",	

				        data : param,	  
				        success  : function(result) {
				             form.remove();
				           document.location.href="/";
				        },   
				    
				        error : function(e){  
				            alert(e.responseText);  
				        }  
				    });  
           

              
              		e.preventDefault();
                    e.stopPropagation();
             });


            //start of standup
	         $("button.standupMember").click(function(e){
                  var parent = $(this).parent().parent().parent(); // table
                  var seatNum = parent.attr("data-seat");
				    $.ajax({
				        type : "GET",  
				        url : "standup_ajax.php?seatNum="+seatNum,				  
				        success  : function(result) {

				             parent.hide();
				             parent.remove();
				             $("div.employ[data-seat='"+ seatNum+"']").html("").append("<span>"+seatNum+"</span><br>").append("<span>empty</span><br><br>").append("<button class='sitdown'>send</button").css("background-color","#F6F6F6").css("cursor","default");

				        },   
				        // beforeSend : showRequest,  
				        error : function(e){  
				            alert("delete fail. "+e.responseText);  
				        }  
				    });  


                e.stopPropagation();
	         });
	         //end for standup

           $("#forPrint").click(function(){      
             $("div.office").css("width","900px").css("height","900px");
              $("div.employ").css("width","70px").css("height","60px");
              $("div.employ-whiteSpace").css("width","70px").css("height","60px");
              $("div.printer").css("width","60px").css("height","60px");
              $("hr").css("width","380px");
              $("div.employ > br").remove();
             $("div.meeting-room").css("width","260px").css("height","107px");
             $("div.inner-room").css("height","200px").css("margin-top","36px").css("width","410px");
             $("button.sitdown").remove();
             $("div.eduTeamfive").css("margin-top","-90px");
             $("div.tangbi-room").css("height","360px").find("hr").css("width","100%");
             $("div.employ span:first-child").remove();
             $("ul#menu li").remove();
             $("ul#menu").append("<li></li>").text("more detail information (skype id,phone number...etc) ->  http://k21office.dothome.co.kr");
             $("body").css("height","1200px");
             $("div.meeting-room img").remove();
             
           });
	       
		});

	function showInsertMemberForm(){
  
       

        var posTop = $(this).position().top; 
	    var posLeft = $(this).position().left+ $(this).width()+20;

		$("#insertMemberDiv").animate({top:posTop, left:posLeft, height:'toggle'});
	
	}	

		function showSitdownForm(){      
        

        var posTop = $(this).parent().position().top; 
	    var posLeft = $(this).parent().position().left+ $(this).width()+50;
  

        var seatNum = $(this).parent().attr("data-seat");
	    $("#seatVal").val(seatNum);


	    var sel = $("#sitdownDiv").find("form").find("select");

	    if(sel.find("option").length != 0 ){
            $("#sitdownDiv").show();
            $("#sitdownDiv").offset({top:posTop,left:posLeft});
	    	return;
	    }
       
        var str ="";
	    for(var i in memNum){
          str = "<option name='memNum' value='"+memNum[i]['memberNum']+"'>"+memNum[i]['name']+"</option>";
          sel.append(str);
	    }
        
        if( $("#sitdownDiv").find("form").find("button").attr('id') != "sitdownBtn") {
	    $("#sitdownDiv").find("form").append("<button id='sitdownBtn'>send</button>");
        }
		
		// $("#sitdownDiv").css("position","absolute").css("background-color","#5CD1E5");
	    $("#sitdownDiv").show();
		$("#sitdownDiv").offset({top:posTop,left:posLeft});
		
	}	
	</script>
	<style>
        body{height:1600px;}
		div.employ { 
			background-color: #F6F6F6;
			display: inline-block;
			width:100px;
			height:100px;
			border: 1px solid black;
			text-align: center;	
			vertical-align: top;
			cursor: default;	
		}

        div.employ-whiteSpace { 
			display: inline-block;
			width:102px;
			height:102px;
			cursor: default;	
		}

		div.office {

			width:1200px;
			margin:0 auto;
			border:1px solid black;
			margin-top: 20px;
		}

		.f-right{
			float:right;
		}
        .clear{
        	clear:both;
        }

        div.tangbi-room{
        	width:300px;
        	height:520px;
        	border:1px solid black;
        	text-align: center;
        }
        div.water-place{
        	width:200px;
        	height: 100px;
        	border:1px solid black;
        	text-align: center;
        }
        div.inner-room{
        	display: inline-block;
        	width:528px;
        	border:1px solid black;
        }
        div.meeting-room{
        	position: relative;
        	top:130px;
            width:458px;
            height:320px;
            border:1px solid black;
            text-align: center;
        }
        #insertMemberTable{
        	 	
        }
        #insertMemberTable td:nth-child(1){
        	font-weight: 700; 
        	padding-right: 20px;  	
        }
        ul#menu { 
        	list-style: none;
 
        }
        ul#menu li {
        	color : white;
        	display: inline;
        	margin-right:40px;
        }
         a:link,a:visited,a:active{
           text-decoration: none;
        }
       
        #menu a{
          color: white;
        }

        #menu {
          padding:6px;
        }
        table.info_table{
        	 background-color:white;
	         color:black;
	         font-weight: 700;
           border-collapse: collapse;
           border:1px solid grey;
	        /* opacity:0.9;*/
        }
        table.info_table tr:nth-child(odd){
          background-color: #F6F6F6;
        }
           table.info_table tr:nth-child(odd){
          background-color: #F6F6F6;
        }
          table.info_table td{
          border:0;
        }

        td {border: 1px solid black; border-collapse: collapse; padding:4px;}

        #sitdownDiv{position: absolute; background-color:#D2D2D2 }
        #closeSitdown{
        	background-color:grey;
        	height:20px; 
        	text-align:right
        }
        #closeSitdown , #closeIMD{cursor: pointer;}
     
        #insertMemberDiv{
				position : absolute;
				background-color : white;
						
        }
        #insertMemberDiv td:first-child{
        	text-align: center;
        }

        #wrapMenu{
          
        }
	</style>
</head>
<body>
<div id="wrapMenu" style="text-align: center; background-color:#AA1211;font-size:26px;">

   <ul id="menu">
   	 <li><a href="insertMemberForm.html">member-insert</a></li>
   	 <li><a href="memberList.php">member-list</a></li>
   	 <li><a href="manual.html">사용법</a></li>
   </ul>
</div>
<button id="insertMemberBtn">register-member</button>
<button id="forPrint">PrintView</button>
<div style="margin-top:20px; width:550px; float:right;margin-right:350px">

	<div style="width:30px; height:30px; background-color:#B2EBF4; display:inline-block"></div> 
	<span style="display:inline-block; margin-top:-50px">on duty</span>
	<div style="width:30px; height:30px; background-color:#FFB2D9; display:inline-block"></div> 
	<span style="display:inline-block">vacation</span>
	<div style="width:30px; height:30px; background-color:#FFC19E; display:inline-block"></div> 
	<span style="display:inline-block">businessTrip</span>
</div>
<div style="clear:both"></div>

		<div class="office">
			<div class="employ" data-seat="1">
			</div>
			<div class="employ" data-seat="2" ></div>
			<div class="employ" data-seat="3" ></div>			
			<div class="tangbi-room f-right">
			 <p> k - 2</p>	
            		<div class="employ" data-seat="4" ></div>
		    		<div class="employ" data-seat="5" ></div><br>
		    		<div class="employ-whiteSpace"></div>
		    		<div class="employ" data-seat="6"></div><br>
		    		<div class="employ" data-seat="7" ></div>
            <div class="employ" data-seat="43" ></div>
            <hr>
            <div style="margin-top:20px"></div>
            <div class="employ" data-seat="44" ></div>
            <div class="employ" data-seat="45" ></div>

			</div>
			<div class="water-place f-right">water machine</div>
			<!-- <div class="clear"></div> -->
		    <br>
			<br>
			<br>
			<div class="employ" data-seat="8" ></div>
			<div class="employ" data-seat="9" ></div>
			<div class="employ" data-seat="10" ></div>
			<div class="employ" data-seat="11" ></div>
			<!-- <div class="employ" data-seat="12" ></div> -->
			<hr style="border: 2px solid black; width:528px;" align="left">
			
			<div class="employ" data-seat="13" ></div>
			<div class="employ" data-seat="14" ></div>
			<div class="employ" data-seat="15" ></div>
			<div class="employ" data-seat="16" ></div>
			<div class="employ" data-seat="17" ></div>
			<br>
			<br>
			<br>

      <div class="employ" data-seat="18" ></div>
      <div class="employ" data-seat="19" ></div>
      <div class="employ" data-seat="20" ></div>
      <div class="employ" data-seat="21" ></div>
      <div class="employ" data-seat="22" ></div>
      <br>
      <br>
      <br>

			<div class="employ" data-seat="23" ></div>
			<div class="employ" data-seat="24" ></div>
			<div class="employ" data-seat="25" ></div>
			<div class="employ" data-seat="26" ></div>
			<div class="employ" data-seat="27" ></div>

			<hr style="border: 2px solid black;width:528px;" align="left">

			<div class="employ" data-seat="28" ></div>
			<div class="employ" data-seat="29" ></div>
			<div class="employ" data-seat="30" ></div>
			<div class="employ" data-seat="31" ></div>
			<div class="employ" data-seat="32" ></div>
		  
		    <br><br><br>

      <div class="printer" style="width:100px; height:100px;border:1px solid black; display:inline-block; text-align:center">printer</div>  
<!-- 			<div class="employ" data-seat="33" ></div> -->
			<div class="employ" data-seat="34" ></div>
			<div class="employ" data-seat="35" ></div>
      <div class="printer" style="width:100px; height:100px;border:1px solid black; display:inline-block;text-align:center">printer</div>  
		    <hr style="border: 2px solid black;width:528px;" align="left">
		    <div class="inner-room">
		    		<div class="employ" data-seat="36" ></div>
		    		<div class="employ" data-seat="37" ></div>
		    		<br><br><br>
		        <div style="width:210px; margin:0 auto" class="eduTeamfive">		
		    		<div class="employ" style="margin-left:54px" data-seat="38" ></div>
		    		<br>
		    		<div class="employ" data-seat="39" ></div>
		    		<div class="employ" data-seat="40" ></div>
		    		<br>
		    		<div class="employ" data-seat="41" ></div>
		    		<div class="employ" data-seat="42" ></div>
		    	</div>

		    </div>
		    <div class="meeting-room f-right">
              meeting-room<br><br>
              <img src="daramMouse.png" alt="" width='458' height="auto">
		    </div>

		</div>

		
		<div id="insertMemberDiv" style="display:none">
			<div id="closeIMD" style="background-color:grey;height:20px; text-align:right">
			
			    close
			  
			</div>
			<div style="text-align:center">
			  <h2> 직원 등록하기 </h2>
			</div>  
			<form id="insertMemberForm" action="insertMember.php" method="post">	
				<table id="insertMemberTable" style="padding:20px">
				    <tr>
				        <td>name</td>
				        <td><input type="text" name="name" /></td>
				    </tr>
				    <tr>
				        <td>nationality</td>
				        <td><input type="text" name="nationality" /></td>
				    </tr>
				    <tr>
				        <td>joindate</td>
				        <td><input type="text" name="joindate" /></td>
				    </tr>
				    <tr>
				        <td>department</td>
				        <td><input type="text" name="department" /></td>
				    </tr>
				    <tr>
				        <td>task</td>
				        <td><input type="text" name="task" /></td>
				    </tr>
				    <tr>
				        <td>state</td>
				        <td>
                          <select name="state" id="memberState">
                          	<option value="on duty">on duty</option>
                          	<option value="vacation">vacation</option>
                          	<option value="businessTrip">businessTrip</option>
                          </select>
				        </td>
				    </tr>
				    <tr>
				        <td>Email</td>
				        <td><input type="text" name="email" /></td>
				    </tr>
				    <tr>
				        <td>Skype</td>
				        <td><input type="text" name="skypeId" /></td>
				    </tr>
				    <tr>
				        <td>innerTelNum(내선)</td>
				        <td><input type="text" name="innerTelNum" /></td>
				    </tr>
				    <tr>
				        <td>mobileNum</td>
				        <td><input type="text" name="phoneNum" /></td>
				    </tr>
				    <tr>
				        <td>etc1</td>
				        <td><textarea name="etc1" id="" cols="30" rows="5"></textarea></td>
				    </tr>
				    <tr>
				        <td>etc2</td>
				        <td><textarea name="etc2" id="" cols="30" rows="5"></textarea></td>
				    </tr>
				        <td></td>
				        <td style="padding-top:20px"><input id="submitMemberBtn" type="submit" name="submit" value="send" style="width:100px" />
				    </tr>
			    </table>
			</form>
		</div>


	<div id="sitdownDiv" style="width:122px">
            <div id="closeSitdown">			
			    close			  
			</div>
		<form action="sitdwon_ajax.php" method="post">
		<input type='hidden' name='seatNum' id="seatVal">
			<select name='memNum' id="sitdownSelect"></select>
		</form>
	</div>
</body>
</html>