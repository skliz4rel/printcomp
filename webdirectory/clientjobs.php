<?php
    session_start();
    
    include("include/Utility.php");
    
    $externalobj = new Utility();
    
    $externalobj->securityCheck();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ideen-Verbindeen E-Management System</title>

        <link type ="text/css" rel="stylesheet" href="css/style.css" media="all"/>
		<link type="text/css" rel="stylesheet" href="css/css/ui-lightness/jquery-ui-1.7.3.custom.css" media="all">
		<script type="text/javascript" src="js/js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="js/js/jquery-ui-1.7.3.custom.min.js"></script>
		<script type="text/javascript" src="js/jqFancyTransitions.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				
				var dialog = {
					title:'Details',
					position:[550,20],
					autoOpen:false,
					width:400,
					height:200,
					modal:true,
					hide:'explode'
				};
				
				$("#dialog").dialog(dialog);
				
				$("#thedate1").datepicker();  $("#thedate2").datepicker();  $("#thedate3").datepicker();
				
				$('#thedate1').hide(); $("#thedate2").hide(); $('#thedate3').hide();  $("#unpaid").hide(); $("#paid").hide(); $("#clientdet").hide();
				
				//This is going to hide the error message
				$(".e1").hide(); $(".e2").hide();$(".e3").hide();
				
				$("#link li a:first").mouseover(function () {
				//alert("asdfsdf");
				
					$("#link li:first").css("background","url(images/a-after.png) no-repeat");
				});
				
				$("#link li a:first").mouseout(function () {
				//alert("asdfsdf");
				
					$("#link li:first").css("background","url(images/a.png) no-repeat");
				});
				
				$("#link li a:eq(1)").mouseover(function () {
				//alert("asdfsdf");
				
					$("#link li:eq(1)").css("background","url(images/a-after.png) no-repeat");
				});
				
				$("#link li a:eq(1)").mouseout(function () {
				//alert("asdfsdf");
				
					$("#link li:eq(1)").css("background","url(images/a.png) no-repeat");
				});
				
				
				
				$("#link li a:eq(2)").mouseover(function () {
				//alert("asdfsdf");
				
					$("#link li:eq(2)").css("background","url(images/a-after.png) no-repeat");
				});
				
				$("#link li a:eq(2)").mouseover(function () {
				//alert("asdfsdf");
				
					$("#link li:eq(2)").css("background","url(images/a.png) no-repeat");
				});
				
				
				
				$("#link li a:eq(3)").mouseover(function () {
				//alert("asdfsdf");
				
					$("#link li:eq(3)").css("background","url(images/a-after.png) no-repeat");
				});
				$("#link li a:eq(3)").mouseout(function () {
				//alert("asdfsdf");
				
					$("#link li:eq(3)").css("background","url(images/a.png) no-repeat");
				});
				
				
				
				$("#link li a:eq(4)").mouseover(function () {
				//alert("asdfsdf");
				
					$("#link li:eq(4)").css("background","url(images/a-after.png) no-repeat");
				});
				$("#link li a:eq(4)").mouseout(function () {
				//alert("asdfsdf");
				
					$("#link li:eq(4)").css("background","url(images/a.png) no-repeat");
				});
				
				
				
				$("#link li a:eq(5)").mouseover(function () {
				//alert("asdfsdf");
				
					$("#link li:eq(5)").css("background","url(images/a-after.png) no-repeat");
				});
				
				$("#link li a:eq(5)").mouseout(function () {
				//alert("asdfsdf");
				
					$("#link li:eq(5)").css("background","url(images/a.png) no-repeat");
				});
				
				
				
				
				$("#link li a:eq(6)").mouseover(function () {
				//alert("asdfsdf");
				
					$("#link li:eq(6)").css("background","url(images/a-after.png) no-repeat");
				});				
				$("#link li a:eq(6)").mouseout(function () {
				//alert("asdfsdf");
				
					$("#link li:eq(6)").css("background","url(images/a.png) no-repeat");
				});
				
				
				$("#link li a:eq(7)").mouseover(function () {
				//alert("asdfsdf");
				
					$("#link li:eq(7)").css("background","url(images/a-after.png) no-repeat");
				});
				$("#link li a:eq(7)").mouseout(function () {
				//alert("asdfsdf");
				
					$("#link li:eq(7)").css("background","url(images/a.png) no-repeat");
				});
				
				$("#unpaidopt").change(function () {
					var value = $(this).val();
					if(value == ''){
						$('.e1').slideDown('slow');
						$('#thedate1').hide();
					}
					else if(value == 'All'){
						$('#thedate1').hide();
						$('.e1').hide();
					}
					else{
						$('#thedate1').show('slow');
						$('.e1').hide();
						$("#showresult").html('');
					}
				});
				
				$("#paidopt").change(function () {
					var value = $(this).val();
					if(value == ''){
						$('.e2').slideDown('slide');
						$('#thedate2').hide();
					}
					else if(value == 'All'){
						$('#thedate2').hide();
						$('.e2').hide();
					}
					else{
						$('#thedate2').show('slow');
						$('.e2').hide();
					}
				});
				
				$("#clientopt").change(function (){
					var value = $(this).val();
					if(value == ''){
						$('.e3').slideDown('slow');
						$('#thedate3').hide();
					}
					else if(value == 'All'){
						$('#thedate3').hide();
						$('.e3').hide();
					}
					else {
						$('#thedate3').show('slow');
						$('.e3').hide();
					}
				});	
				
				
				$("#unpaidbut").click(function () {
					var option  = $("#unpaidopt").val();
					if(option == '')
						$('.e1').slideDown('slow');
					else if(option == 'All'){
						$('.e1').hide();
											
					$.post(
						"include/Clientprocessor.php",
						{unpaidbut:1,option:option},
						function (data){
							//alert(data);
							$("#showresult").html(data);
						}
					);
					
				  }
				  else{
				  		//This is when date is selected 
							var date = $('#thedate1').val();  alert(date);
				  }
				});
				
				$("#paidbut").click(function() {
							var option  = $("#paidopt").val();
					if(option == '')
						$('.e2').slideDown('slow');
					else if(option == 'All'){
						$('.e2').hide();  
					$.post(
						"include/Clientprocessor.php",
						{paidbut:1,option:option},
						function (data){
							//alert(data);
							$("#showresult").html(data);
						}
					);
					
				  }
				  else{
				  		//This is when date is selected 
						var date = $('#thedate2').val();  alert(date);
				  }
				});
				
				$("#clientdetbut").bind("click",function () {
					var option = $("#clientopt").val();
					if(option == '')
						$('.e3').slideDown('slow');
					else if(option == 'All'){
						$('.e3').hide();  $('#showresult').html('');   var cid = $("#cid").val(); 
					$.post(
						"include/Clientprocessor.php",
						{clientviewbut:1,option:option,cid:cid},
						function (data){
							//alert(data);
							$("#showresult").html(data);
						}
					);
					
				  }
				  else{
				  		//This is when the user select a button
						var date = $('#thedate3').val(); // alert(date);
						var cid = $("#cid").val();
				  }
				  
				});
				
				
				$("#a").click(function (){
					//alert("asdfdsfsdf");
					$("#unpaid").slideDown("slow");
					$("#paid").hide("slow");
					$("#clientdet").hide("slow");
					$('#showresult').html('');
				});
				
				$("#b").click(function (){
					$("#paid").slideDown("slow");
					$("#unpaid").hide("slow");
					$("#clientdet").hide("slow");
					$('#showresult').html('');
				});
				
				$("#c").click(function (){
					$("#clientdet").slideDown("slow");
					$("#unpaid").hide("slow");
					$("#paid").hide("slow");
					$('#showresult').html('');
				});
				
				$(".fullview").live("click",function (){
					var v = $(this).attr("title");
					$("#dialog").html(v);
					$("#dialog").dialog("open");
				});
				
			});
			
		</script>
</head>

<style type="text/css">
#cid{
	width:60px;
}
</style>

<body>

 <div id ="header"></div>
 
 <div id="animation">
 	<div id = "inneranimation">
	
	</div>
 </div>
 
<div id="homebody">
 
 <div id = "innerleft">
 	<img src="images/hombodtop.png"/>
 	<div>
	
		<ul id = "link">		
			<li title="home"><a href="home.php" >Home</a></li>
			<li><a href="jobbag.php">Job Bag Form</a></li>
			<li><a href="clientjobs.php">Display Client Jobs</a></li>
			<li><a href="upload.php">Upload Client Jobs</a></li>
			<li><a href="#">Job Gallery</a></li>
			<li><a href="invoice.php">Invoice</a></li>
			<li><a href="publicroom.php">Chat Messenger</a></li>
			<li title="logout"><a href="include/logout.php">Logout</a></li>
		
		</ul>
	</div>
	
	<img src="images/homebodbot.png"/>
 
 </div>
 
 <div id="inneright">
 
 <div id = "topmenu">
 <p>
 <label class="linkbox" id = "a">View Unpaid Jobs</label> <label  class="linkbox" id = "b">View Unexecuted Paid jobs View</label> 
 
 
 
 <label  class="linkbox" id = "c">View Unexecuted Paid Jobs based on Clients
 </label>
 </p>
 </div>
 
 <br/>
 <div id="unpaid" class="smallbox">
 <div class = "divhead">Display Unpaid Jobs</div>
   <table width="820" border="0">
     <tr>
       <td><strong>Select</strong> </td>
       <td>
         <select name="unpaidopt" id = "unpaidopt">
		 <option value="">--Select--</option>
		 <option value="All">All Unpaid Jobs</option>
		 <option value="bydate">Unpaid Jobs by date</option>
         </select>
         <br />
     <label class="ui-state-error ui-corner-all e1"><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
  Make Selection </label></td>
       <td><label>
         <input type="text" name="thedate" id="thedate1"/>
       </label></td>
       <td>
         <input type="submit" name="unpaidbut" value="Generate" id = "unpaidbut"/>
       </td>
       </tr>
   </table>
 </div>
 
 <div id="paid" class="smallbox">
 <div class = "divhead">Display Unexecuted Paid Jobs</div>
 
  <table width="820" border="0">
     <tr>
       <td><strong>Select </strong></td>
       <td>
         <select name="paidopt" id = "paidopt">
		 <option value="">--Select--</option>
		 <option value="All">All Unpaid Jobs</option>
		 <option value="bydate">Unpaid Jobs by date</option>
         </select>
         <br />
     <label  class="ui-state-error ui-corner-all e2">  <span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
Make Selection </label></td>
       <td><label>
         <input type="text" name="thedate1" id="thedate2"/>
       </label></td>
       <td>
         <input type="submit" name="paidbut" value="Generate" id = "paidbut"/>
       </td>
       </tr>
   </table>
 </div>
 
 
 <div id = "clientdet" class="smallbox">
 <div class = "divhead">Display Unexecuted Paid Jobs For Specific Clients</div>
 
 <table width="829" border=0>
 <tr>
 <td width="69"><strong>Select</strong> </td><td width="140">
   
   <select name="clientopt" id="clientopt">
   <option value="">--Select--</option>
   <option value="All">All</option>
   <option value="By date">By date</option>
   </select>
  <label  class="ui-state-error ui-corner-all e3"><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
 Make Selection   </label> 
 </td>
 <td width="214"><input type="text" name="thedate12" id="thedate3"/></td>
 <td width="129"><strong>Client ID</strong></td>
 <td width="74"><label>
   <input type="text" name="cid" id="cid" />
   </label></td>
 <td width="177"><input type="button" name="clientdetbut" id="clientdetbut" value="Generate"/></td>
 </tr>
 </table>
 
 </div>
 
 <div id="showresult" >
 	
 </div>
 
 </div>
 
 </div>
 
 
 
 <div id="footer">
 
 </div>
 
 <div id ="dialog"></div>
</body>
</html>