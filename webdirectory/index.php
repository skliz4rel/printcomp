<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ideen-Verbindeen E-Management System</title>
        <link type ="text/css" rel="stylesheet" href="css/style.css" media="all"/>
		<link type="text/css" rel="stylesheet" href="css/css/ui-lightness/jquery-ui-1.7.3.custom.css" media="all">
		<script type="text/javascript" src="js/js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="js/js/jquery-ui-1.7.3.custom.min.js"></script>
		<script type="text/javascript" src="js/jqFancyTransitions.js"></script>
		<script type="text/javascript">
			$(document).ready(function(e){
				//alert("This page is ready for use");
				var dialog = {
					title:"Form Error",
					height:250,
					width:400,
					position:["center","center"],
					autoOpen:false,
					hide:"explode",
					modal:true,
					buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
							
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
							
						} 
					}
				};
				
				$("#dialog").dialog(dialog);
				
				
				$("#form1").submit(function () {
					var username = $("#username").val();
					var password= $("#password").val();
					var admintype = $("#admintype").val();
					var onSubmit = true;
					var error = "<font class='error'>Correct the following<br/>";
					var counter = 0;
					
					if(username.length < 2){
					counter++;
						error +=counter+ ". Enter your username<br/>";
						onSubmit = false;
						
					}
					if(password.length < 2){
						counter++;
						error+= counter+". Enter your password<br/>";
						onSubmit = false;
						
					}
					
					if(admintype.length < 1){
						counter++;
						error += counter+". Select an option in the admintype field";
						onSubmit = false;
					
					}
					
					if(onSubmit == false){
					error+= "</font>";
						$("#dialog").html(error);
						$("#dialog").dialog("open");
					
						return false;
					}
					else{
						//submit the form cos the fields are correctly filled
						return true;
					
					}
					
				});
				
				//This is the animation field
				$("#animate").jqFancyTransitions({
					height:250,
					width:380,
					effect:"slide",
					delay: 3000,
							stripDelay: 50,
								titleOpacity: 0.7,
								titleSpeed: 1500
				});
				

			});
		</script>
    </head>
    <body>
	<div id = "dialog"></div>
        
        <div id ="header"></div>
        
        <div id ="loginbody">
		
		
          <div id = "leftbox"> 
		  <img src="images/top.png" class="top"/>
		  <div id = "animate">
		  	<img src="images/animate/a.jpg"/>
			<img src="images/animate/b.jpg"/>
			<img src="images/animate/c.jpg"/>
			<img src="images/animate/d.jpg"/>
			<img src="images/animate/e.jpg"/>
			<img src="images/animate/f.jpg"/>
			<img src="images/animate/g.jpg"/>
			<img src="images/animate/h.jpg"/>
			</div>
			 <img src="images/bottom.png" class="bottom"/>
		  </div>
          <div id = "rightbox">
		  
		  <div><img src="images/login.png"></div>
            <form name="form1" method="post" action="include/Loginprocessor.php" id = "form1">
              <table width="370" border="0">
                
                <tr>
                  <td width="114">Username</td>
                  <td width="246"><label>
                    <input type="text" name="username" id="username">
                  </label></td>
                </tr>
                <tr>
                  <td>Password</td>
                  <td><label>
                    <input type="password" name="password" id = "password">
                  </label></td>
                </tr>
                <tr>
                  <td>AdminType </td>
                  <td><label>
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
                  <td>&nbsp;</td>
                  <td>
                    <input type="submit" name="submit" value="Submit" id = "submit">
                    <input type="reset" name="reset" value="Reset" id = "reset">
                  </td>
                </tr>
              </table>
            </form>
          </div>
        </div>
        <div id ="footer">
            
        </div>
		
		
		<?php
			if(isset($_GET['id'])){
				echo "<script type = 'text/javascript'>";
				echo "$(document).ready(function () {";
				echo "$('#dialog').html('<font color=red>You have either entered a wrong username or password or made a wrong selection for admintype</font>');";
				echo "$('#dialog').dialog('open');";
				echo "});";
				echo "</script>";
			}
		?>
		
    </body>
</html>
