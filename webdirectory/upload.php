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
				
				$("#jobname").change(function () {
					//alert("changed");
					var id = $(this).val();
					$('#jid').val(id);
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
			<li><a href="jobbag.php">Job Bag Form</a></li>
			<li><a href="#">Confirm Client Orders</a></li>
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
 
 <div class="smallbox">
 <div class="divhead"><img src="images/uploadjobs.png"></div>
   <form action="include/Clientprocessor.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
     <table width="620" border="0">
       <tr>
         <td width="267">Job name </td>
         <td width="337">
           <select name="jobname" id = "jobname"/>
		   	<option value="">--Select--</option>
			<?php
				$query = "select id, job_name from jobbag where execution = false;--";
				$result = mysql_query($query);
				
				while($record = mysql_fetch_array($result)){
					echo "<option value =$record[0]>$record[1]</option>";
				}
			?>
		   </select>         </td>
       </tr>
       <tr>
         <td>Job ID </td>
         <td><label>
           <input type="text" name="jid" id = "jid"/>
         </label></td>
       </tr>
       <tr>
         <td>Upload small size </td>
         <td><label>
           <input type="file" name="smallimage" />
         </label></td>
       </tr>
       <tr>
         <td>Upload Large size </td>
         <td><label>
           <input type="file" name="largeimage" />
         </label></td>
       </tr>
       <tr>
         <td>Upload zip form </td>
         <td><label>
           <input type="file" name="zipfile" />
         </label></td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>
           <input type="submit" name="uploadbutton" value="Submit" id="uploadbutton"/>
           <input type="reset" name="Submit2" value="Reset" id = "uploadreset"/>         </td>
       </tr>
     </table>
    </form>
	</div>
	
 </div>
 
</div>
 
 
 
 <div id="footer">
 
 </div>
 <div id = "dialog"></div>
 
 <?php
 	if(isset($_GET['id'])){
		echo "<script type = 'text/javascript'>";
	
		echo "alert('Job successfully uploaded');";	
		echo "</script>";
	}
 ?>
 
</body>
</html>
