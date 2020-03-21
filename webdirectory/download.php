<?php
    session_start();
    
    include("include/Utility.php");
    
    $externalobj = new Utility();
    
    $externalobj->securityCheck();
	
	$externalobj->doConnect();
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
				
				$("#client").change(function (){
					var value = $(this).val();
					
					if(value.length >0){
						$.post(
							"include/Clientprocessor.php",
							{getUnprintedjob:1,cid:value},
							function(data){
								$("#jobs").html(data);
							}
						);
					}
				});
				
				$("#downloadbut").click(function (){
					var id = $("#jobs").val();
					//alert(id);
					$.post(
						"include/Clientprocessor.php",
						{getDownloadlink:1,jobid:id},
						function (data){
							$("#download").html(data);
						}
					);
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
		
			<li><a href="home.php" >Home</a></li>
			
			<li><a href="download.php">Download Client Job</a></li>
			
			
			<li><a href="include/logout.php">Logout</a></li>
		
	  </ul>
	
	
	</div>
	
	<img src="images/homebodbot.png"/>
 
 </div>
 
 <div id="inneright">
 
 <div>
 <form>
 	<table width="516" border="0">
      <tr>
        <td width="169">Select Client </td>
        <td width="331"><label>
          <select name="client" id = "client">
		  <option value="">--Select--</option>
		  <?php
		  	$query = "select id,name from client;--";
			$result = mysql_query($query);
			
			$id = mysql_num_rows($result);
			
			if($id){
			
				while($record = mysql_fetch_array($result)){
					echo "<option value =$record[0]>$record[1]</option>";
				}
			}
		  
		  ?>
		  
          </select>
        </label></td>
      </tr>
      <tr>
        <td>Executed Paid Jobs </td>
        <td><label>
          <select name="jobs" id = "jobs">
          </select>
        </label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input type="button" name="Submit" value="Submit" id ="downloadbut"/>
          <input type="reset" name="Submit2" value="Reset" id = "clearbut"/>
        </label></td>
      </tr>
    </table>
 	</form>
 </div>
 
 <div id = "download">
 
 </div>
 
 
 </div>
 
 </div>
 
 
 
 <div id="footer">
 
 </div>
 
</body>
</html>
