<?php
    session_start();
    
    include("include/Utility.php");
    
    $externalobj = new Utility();
    
    $externalobj->securityCheck();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ideen-Verbindeen E-Management System</title>

        <link type ="text/css" rel="stylesheet" href="css/privatechat.css" media="all"/>
		<link type="text/css" rel="stylesheet" href="css/css/ui-lightness/jquery-ui-1.7.3.custom.css" media="all">
		<script type="text/javascript" src="js/js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="js/js/jquery-ui-1.7.3.custom.min.js"></script>
		<script type="text/javascript" src="js/jqFancyTransitions.js"></script>
		<script type="text/javascript">
	
		var username = '<?php echo $_SESSION['iden1028username']; ?>';
				var staffid = '<?php echo $_SESSION['iden1028staffid']; ?>';
				
			var you = '<?php if(isset($_GET['you'])) { echo $_GET['you'];}?>';
			
			var chatpal = '<?php if(isset($_GET['chatpal'])) { echo $_GET['chatpal'];}?>';
			
			$(document).ready(function(){
				//alert("hello friend");
				$("#chatbut").click(function() {
				var message = $('#message').val();
				
					$.post(
						"include/Clientprocessor.php",
						{privatechatbut:1,username:username,you:you,chatpal:chatpal,staffid:staffid,message:message},
						function (data){
							
							$('#message').val('');
						}
					);
				});
				
				
				//do the logout button
				$("#logout").click(function () {
					//now we are going to configure the box logout button to disconnect and close all operations from the private chat box
					
					$.post(
						"include/Clientprocessor.php",
						{privatelogout:1,username:username,staffid:staffid,you:you,chatpal:chatpal},
						function (data){
								window.close();
						}
					);
					
				});
			});
			
			function showMessage(){
				$.post(
					"include/Clientprocessor.php",
					{displayprivatemsg:1,you:you,chatpal:chatpal},
					function (data){
						$("#display").html(data);
					}
				);
			}
			
			function loader(){
				showMessage();
				var timerid = setTimeout('loader()',1000);
			}
			
			</script>
</head>

<body onLoad="loader();">

<div id = "privatebox">

<div id ="head">
<img src="images/privatebox.png"/><br/>
<?php
	$display =  "<strong><font color='orange'>( ";
	
	if(isset($_GET['yourname']))
		$display .= $_GET['yourname']."[YOU] is having a private conversation with ";
		
	if(isset($_GET['palname']))
		$display .= $_GET['palname']."</font></strong>)";
		
		echo $display;
?>

</div>

<div id = "display">

</div>

<input type = "text" id= "message" name = "message"/><input type = "button" id = "chatbut" name = "chatbut" value="send"/><input type = "button" value="Logout" id ="logout"/>

</div>
</body>
</html>