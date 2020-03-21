<?php
    session_start();
    
    include("include/Utility.php");
    
    $externalobj = new Utility();
    
    $externalobj->securityCheck();
	
	//now the register the user as a ready user
	$externalobj->doConnect();
	
	$externalobj->registerchatUser();
	
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
                    var username = '<?php echo $_SESSION['iden1028username']; ?>';
				var staffid = '<?php echo $_SESSION['iden1028staffid']; ?>';
				
                
			$(document).ready(function(){
				
				
				//alert(username);
				
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
				
				$("#chatbutton").click(function () {
					var message = $('#message').val();
					$.post(
						"include/Clientprocessor.php",
						{publicchat:1,message:message,username:username,staffid:staffid},
						function(data){
							//alert(data);
							$('#message').val('');
						}
					);
				});
				
				
				$("#logout").click(function (e) {
				$("embed").attr('src','Sounds/disconnect.wav');
				var mesg = $("embed").attr('src');
				alert(mesg);
					$.post(
						'include/Clientprocessor.php',
						{logout:1,username:username,staffid:staffid},
						function (data){
							
								$("#logoutform").submit();
							
						}
					);
				});
				
				
				$('a').live("click",function (){
					var id = ($(this).attr('id'));
					var palname = $(this).text();
					//first register the private chatting conversation details
					$.post(
						"include/Clientprocessor.php",
						{registerprivatechatter:1,username:username,staffid:staffid,chatpal:id},
						function (data){
							
						}
					);
					
					$(this).attr("href","privateroom.php?you="+staffid+"&chatpal="+id+"&yourname="+username+"&palname="+palname);
				});
							
			});
			
			
			
			function checkforPrivatechat(){
				//alert("sadfasdf");
                                var content = null;
				data = "check=1&staffid="+staffid;
				$.ajax({
					url:"include/Clientprocessor.php",
					type:'POST',
					data:data,
					success:function(data){
					data = $.trim(data);
						if(data.length > 0){
							 //alert(data);
							content = data.split("/"); 
                                                      var chatpartner = content[0]; var partnerid = content[1];
                                                      window.open("privateroom.php?you="+staffid+"&chatpal="+content[1]+"&yourname="+username+"&palname="+content[0],100,100);
						}
					},
               		error:function(){
						
					},
					"dataType":"text"
				});
			}
			
									
			function showUsers(){
				$.post(
					"include/Clientprocessor.php",
					{users:1},
					function (data){
						$("#chatusers").html(data);
					}
				);
			}

			function showMessage(){
					$.post(
						"include/Clientprocessor.php",
						{publichatbut:1},
						function (data){
						
							$("#display").html(data);
						}
					);
				}

			function loader(){
				checkforPrivatechat();
				showUsers();
				showMessage();
				var timer = setTimeout('loader()',1000);
			}
			
			
			
			
		</script>
		
		
	<style type="text/css" rel="stylesheet" media="all">	
		
	</style>
</head>

<body onload='loader();'>



 <div id ="header"></div>
 
 
<div id="homebody">
 
 
 <div id="chatbox">
 
 
 <div id="leftchat">
   <div id = "display">
   
   </div>
   
   <input type = "text" id = "message" name="message"/><input type="button" value="Chat" name = "chatbutton" id="chatbutton"/>
 </div>
 
 <div id = "rightchat">
 <li><a href="home.php">Back</a></li>
 <div id="chatusers">
 
 </div>
 <form name = "logoutform" id = "logoutform" action="home.php">
 <input type="button" value="Logout" id = "logout" name ="logout"/>
 
 </form>
 </div>
 
 </div>
 

</div>
 
 </div>
 
 
 
 <div id="footer">
 
 </div>
 <embed src="Sounds/disconnect.wav" hidden="true" loop="false" />
</body>
</html>
