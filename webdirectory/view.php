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
		var content = null;
		
			$(document).ready(function(){
				
				$(".error").hide();
				
				var dialog = {
					autoOpen: false,
					title:"Print Box",
					height:550,
					width:700,
					modal:true,
					position:["center","center"],
					hide:"explode",
					buttons: {
						"Print": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 	
					}				
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
				
				$("#viewbutton").click(function () {
					//alert("here clicked");
					var staffid = $("#id").val();
					if(staffid.length < 1){
						$('.error').slideDown("slow");
					}
					else
					$.post(
						"include/Mainprocessor.php",
						{viewbut:1,id:staffid},
						function(data){
						content = data;
							$("#viewdetails").html(data);
							
						}
					);
				});
				
				$("#printdetails").click(function () {
					
				
					if(content.length < 3){
						$(".error").text("Enter an id and display the details");
						$(".error").slideDown('slow');
					}
					else{
					$("#dialog").html(content);
					$("#dialog").dialog("open");
					
					}
				
				});
				
				
				$("#id").focus(function () {
					$('.error').hide();
				});
			});
			
		</script>
		
		
	<style type="text/css" rel="stylesheet" media="all">	
		
	</style>
</head>

<body>
<div id = "dialog"></div>
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
           <li title="home"><a href="#" >Main Menu</a></li>
           <li><a href="view.php">View Staff Details</a></li>
           <li><a href="editstaff.php">Edit Staff Details</a></li>
           <li><a href="view.php">Print Staff Details</a></li>
           <li><a href="paystaff.php">Staff Payment</a></li>
           <li><a href="publicroom.php">Chat Messenger</a></li>
           <li title="logout"><a href="index.php">Logout</a></li>
         </ul>
	
	</div>
	
	<img src="images/homebodbot.png"/>
 
 </div>
 
 <div id="inneright">
 
 <div id = 'view'>
   <form id="form1" name="form1" method="post" action="">
     <table width="757" border="0">
       
       <tr>
         <td width="93" height="88">Staff ID </td>
         <td width="317"><label>
           <input type="text" name="id" id = "id"/>
         </label>
           <br />
		   
           <div class="ui-widget error">
			<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
				<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
				<strong>Enter a staff id</strong>
			</div>
		</div>
</td>
         <td width="333"><label>
           <input type="button" name="viewbutton" value="Show Staff details" id = "viewbutton" />
           <input type="button" name="printbutton" value="Print Details"  id = "printdetails" />
         </label></td>
       </tr>
     </table>
      </form>
 </div>
 
 
 <div id = "viewdetails"  class="ui-state-default ui-corner-all">
 
 
 </div>
 
 </div>
 
 </div>
 
 
 
 <div id="footer">
 
 </div>
 
</body>
</html>
