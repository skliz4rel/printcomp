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
		<script type="text/javascript" src="json.js"></script>
		<script type="text/javascript" src="js/js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="js/js/jquery-ui-1.7.3.custom.min.js"></script>
		<script type="text/javascript" src="js/jqFancyTransitions.js"></script>
		<script type="text/javascript">	
                    
                   
			$(document).ready(function(){		
	
			$("#date").datepicker(); $("#date1").datepicker(); 
				
				var dialog = {
					autoOpen:false,
					position:[500,500],
					modal:true,
					title:'Information',
					hide:'explode'
				};
				
				$("#dialog").dialog(dialog);
				
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
				
				
				$("#name").mouseout(function (){
					var value = $(this).val();
					
					if(value.length > 2){
						$.post(
							'include/Clientprocessor.php',
							{getId:1,thename:value},
							function(data){
								$('#cid').val(data);
							}
						);
					}
				});
				
				
				$("#cid").bind("focus bind click mouseover",function (){
				var value = $("#name").val();
					if(value.length > 2){
						$.post(
							'include/Clientprocessor.php',
							{getId:1,thename:value},
							function(data){
								$('#cid').val(data);
							}
						);
					}
				});
				
				$("#jobtype").change(function () {
					
					var value =  $(this).val();
				
					$.post(
						"include/Clientprocessor.php",
						{getCost:1,value:value},
						function(data){
							$("#cost").val(data);
						}
					);
				});
				
				
			
				
				$("#totalcost").bind("focus click",function(){
				
						var q = parseInt(document.form1.quantity.value);
						
					var unitcost = parseInt(document.form1.cost.value);
				
				
						$("#totalcost").val(unitcost*q);
				});
				
				$("#jobname").click(function (){
					alert("Please ensure that the date is correct if not \nThis would cause imperfection when the software is generating report\n on the date of storage of this job");
				});
			});
			
		</script>
		
		
	<style type="text/css" rel="stylesheet" media="all">	
		
	</style>
</head>

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
			<li><a href="#">Job Bag Form</a></li>
			<li><a href="#">Confirm Client Orders</a></li>
			<li><a href="#">Upload Client Jobs</a></li>
			<li><a href="#">Job Gallery</a></li>
			<li><a href="publicroom.php">Chat Messenger</a></li>
			<li title="logout"><a href="include/logout.php">Logout</a></li>
		
		</ul>
	
	</div>
	
	<img src="images/homebodbot.png"/>
 
 </div>
 
 <div id="inneright">
   <form id="form1" name="form1" method="post" action="include/Clientprocessor.php">
     <table width="545" border="0">
       <tr>
         <td width="209">Client Name </td>
         <td width="326">
           <input type="text" name="name" id = "name" />
         Optional</td>
       </tr>
       <tr>
         <td>Client ID </td>
         <td><input type="text" name="cid" id = "cid" /></td>
       </tr>
	   
	   <tr>
         <td>Today's Date</td>
         <td><input type="text" name="date1" id = "date1" /></td>
       </tr>
	   
       <tr>
         <td>Job Name </td>
         <td><input type="text" name="jobname" id="jobname"/></td>
       </tr>
       <tr>
         <td>Job Size </td>
         <td><input type="text" name="jobsize" /></td>
       </tr>
      
       <tr>
         <td>Job Colour schemme</td>
         <td><input type="text" name="color" id = "color"/></td>
       </tr>
	   
	    <tr>
         <td>Job Type </td>
         <td><label>
           <select name="jobtype" id = "jobtype">
		   <option value="">--Select--</option>
		   <?php
		   	$object = simplexml_load_file("include/pricelist.xml");
			
			foreach($object as $string => $value){
				
				$string = str_replace("_"," ",$string);
				
				echo "<option value = '$string'>$string</option>";
			}
		   
		   ?>
		   
		  
           </select>
         </label></td>
       </tr>
	    <tr>
         <td>Unit Cost</td>
         <td><input type="text" name="cost" id="cost"/></td>
       </tr>
	   
	     <tr>
         <td>Quantity</td>
         <td><input type="text" name="quantity" id = "quantity"/></td>
       </tr>
	   
	    <tr>
         <td>TotalCost</td>
         <td><input type="text" name="totalcost" id="totalcost"/></td>
       </tr>
	   
	 
	   
       <tr>
         <td>Execution Interval </td>
         <td><label>
           <select name="interval" id = "interval">
		   <option value="">--Select--</option>
		   <option value="1 wk">1 wk</option>
		   <option value="2 wk">2 wk</option>
           </select>
         </label></td>
       </tr>
       <tr>
         <td>Delivery Date </td>
         <td><input type="text" name="date" id = "date"/></td>
       </tr>
       <tr>
         <td>Details</td>
         <td><label>
           <textarea name="details" id="details"></textarea>
         </label></td>
       </tr>
      
       <tr>
         <td>&nbsp;</td>
         <td>Enter 3 black characters </td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>
           <img src="include/captcha.php"><input type="text" name="captcha" id = "captcha" size="3" maxlength="3"/>
         </td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>
           <input type="submit" name="jobbutton" value="Submit" id="jobbutton"/>
           <input type="reset" name="Submit2" value="Reset" id="jobreset"/>
         </td>
       </tr>
     </table>
    </form>
 </div>
 
 </div>
 
 
 
 <div id="footer">
 
 </div>
 
 <div id = "dialog"></div>
 
 <?php
 
 	if(isset($_GET['id']) and $_GET['id'] == 'success')
	{
		echo "<script type ='text/javascript'>";
		echo "$(document).ready( function () {";
		echo "$('#dialog').html('Job Information Successfully loaded');";
		echo "$('#dialog').dialog('open');";
		echo "});";
		echo "</script>";
	}
 ?>
 
</body>
</html>
