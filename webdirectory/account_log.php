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
				
				
				
				$("#form1").submit(function () {
				
				});
				
				
				$("#staffid").bind("focus click",function () {
					var depart = $("#admintype").val();
					var staffname = $("#staffname").val();
					
					if(depart.length == 0)
						alert("Please select the staff's department");
						
					else if(staffname.length < 2)
						alert("Please enter the staff name as it was entered during registration");
						
					else{
						$.post(
							'include/Clientprocessor.php',
							{dpt:depart,sfn:staffname,sid:1},
							function(data){
								$("#staffid").val(data);
								
							}
						);
					
					}
					
				});
				
				$("#admintype").click(function (){
				
					$(".success").hide();
					$(".error").hide();
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
			<li><a href="#">Deactivate Account</a></li>
			<li><a href="#">Delete Accounts</a></li>
			
			<li><a href="publicroom.php">Chat Messenger</a></li>
			<li title="logout"><a href="index.php">Logout</a></li>
		
		</ul>
	
	</div>
	
	<img src="images/homebodbot.png"/>
 
 </div>
 
 <div id="inneright">
 
 <div>
 <h1>Create Staff Login Account</h1>
   <form id="form1" name="form1" method="post" action="include/Clientprocessor.php">
   
   <?php
	
    if(isset($_GET['id'])){
	if($_GET['id'] == 'created')
	{
		echo ' <p class="success"><img src="images/success.png">Congratulations the Account as been created</p>';
	}
	
	if($_GET['id']=='exits'){
		echo '<p class="ui-state-error ui-corner-all error"><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>This staff already as an account</p>';
	}
      }

?>

  
   
   
   
     <table width="585" border="0">
       <tr>
         <td width="163">Department</td>
         <td width="412"><label>
           <select name="admintype" id = "admintype">
					<option value="">--Select--</option>
					<option value="CEO">CEO</option>
					<option value="Administrator">Administrator</option>
					<option value="Creative">Creative</option>
					<option value="Press">Press</option>
					<option value="Account">Account</option>
              </select>
         </label></td>
         </tr>
       <tr>
         <td>Staff name </td>
         <td><label>
         <input type="text" name="staffname" id = "staffname"/>
         </label></td>
         </tr>
       <tr>
         <td>Staff ID </td>
         <td><input type="text" name="staffid" id = "staffid" readonly="true"/></td>
         </tr>
       <tr>
         <td>Username</td>
         <td><label>
         <input type="text" name="username" id = "username"/>
         </label></td>
         </tr>
       <tr>
         <td>Password</td>
         <td><label>
         <input type="password" name="password" id = "password" />
         </label></td>
         </tr>
       <tr>
         <td>&nbsp;</td>
         <td>Enter 3 black characters </td>
       </tr>
       <tr>
         <td>Captcha</td>
         <td>
           <img src="include/captcha.php" /><input type="text" name="captcha"  id ="captcha" size="3" maxlength="3" />
       </td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td><label>
           <input type="submit" name="creatacct" value="Create Account" id="creatacct"/>
           <input type="reset" name="Submit2" value="Reset" id = "resetacct"/>
         </label></td>
         </tr>
     </table>
      </form>
 </div>
 
 </div>
 
 </div>
 
 
 
 <div id="footer">
 
 </div>
 
</body>
</html>
