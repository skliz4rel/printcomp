<?php
    session_start();
    
    include("include/Utility.php");
    
    $externalobj = new Utility();
    
    $externalobj->securityCheck();
	
	$externalobj->doConnect(); //make connection
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
				
				$(".text").hide();
				
				$("#table").hide();
				
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
				
				$("#clientname").change(function () {
					var id = $(this).val();
				//alert(id);
					$("#clientid").val(id);
					
					$.post(
						'include/Clientprocessor.php',
						{getjobs:1,id:id},
						function (data){
							$('#jobs').hide();
							$('.text').show();
							$(data).insertAfter('.after');
						}
					);
				});
				
				$("#jobs").live("change",function (){
					var id = $('#jobs').val();
					alert(id);
					$('#jid').val(id);
				});
				
				$("#forgot").click(function(){
					$("#table").show('slide');
				});
				
				$("#jid").bind("click focus",function (){
				var id = $('#jobs').val();
				$(this).val(id);
				});
				
				$("#pay").click(function (){
					var jid = $('#jid').val();
					$.post(
						'include/Clientprocessor.php',
						{jid:jid},
						function(data){
							$("#pay").val(data);
						}
					);
				});
				
			});
			
		</script>
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
			<li><a href="#">Make Payment</a></li>
			<li><a href="jobpaymenthistory.php">Payment History</a></li>
			<li><a href="reciept.php">Reciept</a></li>
			<li><a href="publicroom.php">Chat Messenger</a></li>
			<li><a href="include/logout.php">Logout</a></li>
		</ul>
	
	</div>
	
	<img src="images/homebodbot.png"/>
 
 </div>
 
 <div id="inneright">
 	<h3>Client Payment</h3>
 	<form id="form1" name="form1" method="post" action="include/Clientprocessor.php?staffid=<?php echo $_SESSION['iden1028staffid'];?>">
 	  <table width="534" border="0" id = "table">
        <tr>
          <td width="176" height="32">Client name </td>
          <td width="348"><label>
            <select name="clientname" id = "clientname">
			<option value="">--Select--</option>
			<?php
				$query= "select id,name from client;--";
				
				$result = mysql_query($query);
				
				while($record = mysql_fetch_array($result))				
					echo "<option value=$record[0]>{$record[1]}</option>";
			
			?>
            </select>
          </label></td>
        </tr>
        <tr>
          <td>Client ID </td>
          <td><label>
            <input type="text" name="clientid" id= "clientid"/>
          </label></td>
        </tr>
        <tr>
          <td><label class='text'>Select Job </label></td>
          <td><label class='after'></label></td>
        </tr>
      </table>
	  
      <p id = "forgot" color='blue'><strong> Forgot My JobID</strong></p>
      <table width="546" border="0">
        <tr>
          <td width="180">Job ID </td>
          <td width="356"><input type="text" name="jid" id = 'jid' /></td>
        </tr>
        <tr>
          <td>Payment</td>
          <td><input type="text" name="pay" id = 'pay'/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="makepay" value="Submit" id= "makepay"/>
          <input type="reset" name="Submit2" value="Reset" id="makepayreset"/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </form>
 	<p>&nbsp;</p>
 </div>
 
 </div>
 
 
 
 <div id="footer">
 
 </div>
 
</body>
</html>
