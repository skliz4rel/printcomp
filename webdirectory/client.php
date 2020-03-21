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
					autoOpen:false,
					height:200,
					width:300,
					title:"Client Details Stored",
					position: ["center","center"],
					modal:true
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
				
			
			});
			
		</script>
		
		
	<style type="text/css" rel="stylesheet" media="all">	
		
	</style>
</head>

<body>

<div id = "dialog"></div>

<?php
	
	if(isset($_GET["id"])){
            $id = $_GET['id'];  $name = $_GET['name'];
            
		echo "<script type = 'text/javascript'>";
		echo "$(document).ready( function () {";
		echo "
                        var info = '<?php echo \'<br/>Client id :- \'.$id.\'<br/>Client name :- $name\'; ?>';
                        
			$('#dialog').html(info);
		";
		
		echo "$('#dialog').dialog('open');";
	
		echo "});";
		echo "</script>";
	}

?>

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
			<li><a href="staff.php">Staff</a></li>
			<li><a href="account_log.php">Users Accounts</a></li>
			<li><a href="accountant.php">Accountant</a></li>
			<li><a href="press.php">Press</a></li>
			<li><a href="creative.php">Creative</a></li>
			<li><a href="publicroom.php">Chat Messenger</a></li>
			<li title="logout"><a href="index.php">Logout</a></li>
		
		</ul>
	
	</div>
	
	<img src="images/homebodbot.png"/>
 
 </div>
 
 <div id="inneright">
 
   <form id="form1" name="form1" method="post" action="include/Clientprocessor.php">
     <table width="573" border="0">
       <tr>
         <td width="170">Name</td>
         <td width="393"><label>
           <input type="text" name="name" id="name"/>
         </label></td>
       </tr>
       <tr>
         <td>Phone number </td>
         <td><label>
           <input type="text" name="phone" id="phone"/>
         </label></td>
       </tr>
       <tr>
         <td> Home Address </td>
         <td><label>
           <input type="text" name="home" id = "home" />
         </label></td>
       </tr>
       <tr>
         <td>Company name </td>
         <td><label>
           <input type="text" name="company" id = "company"/>
         </label></td>
       </tr>
	   
	   <tr>
         <td>Company Address </td>
         <td><label>
           <input type="text" name="comp_address" id = "comp_address"/>
         </label></td>
       </tr>
	   <tr>
         <td>Official Phone </td>
         <td><label>
           <input type="text" name="comp_phone" id = "comp_phone"/>
         </label></td>
       </tr>
       <tr>
         <td>Website</td>
         <td><label>
           <input type="text" name="website" id="website"/>
         </label></td>
       </tr>
       <tr>
         <td> Email Address</td>
         <td><label>
           <input type="text" name="email" id="email"/>
         </label></td>
       </tr>
       <tr>
         <td>Referer</td>
         <td><input type="text" name="referer" id = "referer"></td>
       </tr>
      
       <tr>
         <td>&nbsp;</td>
         <td>Enter 3 black characters </td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td><img src="include/captcha.php" />&nbsp;<input type="text" id="captcha" name="captcha" /></td>
       </tr>
       
       <tr>
         <td>&nbsp;</td>
         <td>
           <input type="submit" name="clientbutton" value="Create client" id="clientbutton"/>
           <input type="reset" name="Submit2" value="Reset" id="resetclient"/>
     </td>
       </tr>
     </table>
    </form> 
 </div>
 
</div>
 
 
 
 <div id="footer">
 
 </div>
 
</body>
</html>
