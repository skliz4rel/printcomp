<?php
	session_start();
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
		
		
				var dialog = {
					width:400,
					height:200,
					title:"Successful Registration",
					modal:true,
					autoOpen:false,
                    position:[500,600]
				};
		
		
		
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
				
				
				
				$("#dialog").dialog(dialog);
				
				
			});
			
		</script>
		
		
	<style type="text/css" rel="stylesheet" media="all">	
		
	</style>
</head>

<body>
<div id="dialog"></div>

<?php
$array = null;

if(isset($_GET["id"])){
	echo "<font color = white>".$_GET['id']."</font>";
        
        $array = explode("/",$_GET['pic'] );
	
  $value = null;
   $value = "<p><img style=\"float:right;\" src=".$array[1]."/".$array[2]."/".$array[3]." style = float /><br/>";
  $value .= "Staff id = ".$_GET["id"]."<br/>";
  $value .= "Staff name = ".$_GET["name"]."<br/>";
  $value .= "Staff phone = ".$_GET["phone"]."<br/><br/>";
   $value .= "<b>print staff details</b><input type=button value=print></p>";
 
 
  
  

echo"	
<script type=\"text/javascript\">
	$(document).ready(function () {
		var value = '<?php echo $value;  ?>';
	
		$('#dialog').html(value);
 		$('#dialog').dialog('open');
			
	});

</script>";

}

?>

<style type="text/css">
	#dialog{
			background:white  url(../images/back1.jpg) no-repeat;
		}
</style>
 <div id ="header"></div>
 
 <div id="animation">
 	<div id = "inneranimation">
	
	</div>
 </div>
 
 <div id="homebody">
   <div id = "innerleft"> <img src="images/hombodtop.png"/>
       <div>
        <ul id = "link">
           <li title="home"><a href="home.php" >Home</a></li>
           <li><a href="view.php">View Staff Details</a></li>
           <li><a href="editstaff.php">Edit Staff Details</a></li>
           <li><a href="view.php">Print Staff Details</a></li>
           <li><a href="paystaff.php">Staff Payment</a></li>
           <li><a href="publicroom.php">Chat Messenger</a></li>
           <li title="logout"><a href="index.php">Logout</a></li>
         </ul>
       </div>
     <img src="images/homebodbot.png"/> </div>
   <div id="inneright">
     <form action="include/Mainprocessor.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
       <table width="550" border="0">
         <tr>
           <td>&nbsp;</td>
           <td>Personal Information </td>
         </tr>
         <tr>
           <td width="221">Name </td>
           <td width="319"><label>
             <input type="text" name="staffname" id = "staffname" />
           </label></td>
         </tr>
         <tr>
           <td>Phone</td>
           <td><label>
             <input type="text" name="staffphone" id = "staffphone" />
           </label></td>
         </tr>
         <tr>
           <td>Email Address </td>
           <td><label>
             <input type="text" name="staffmail" id = "staffmail"/>
           </label></td>
         </tr>
         <tr>
           <td>Address</td>
           <td><label>
             <input type="text" name="staffaddress" id = "staffaddress"/>
           </label></td>
         </tr>
         <tr>
           <td>Sex</td>
           <td><input  type="radio" value="male" name="sex" />
             Male
             <input type="radio" value="female" name="sex"/>
             Female</td>
         </tr>
         <tr>
           <td>Upload Picture </td>
           <td><label>
		    
             <input type="file" name="file" id = "file"/>
			
           </label></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td>Official Information </td>
         </tr>
         <tr>
           <td>Department</td>
           <td>
             <select name="department" id = "department" />
			 <option value="">-Select-</option>
			 <option value="Administration">Administration</option>
			 <option value="Creative">Creative</option>
			 <option value="Press">Press</option>
			 <option value="Account">Account</option>
			 
			 </select>
           </td>
         </tr>
         <tr>
           <td>Level</td>
           <td><label>
             <input type="text" name="level" id = "level" />
           </label></td>
         </tr>
         <tr>
           <td>Qualification</td>
           <td>
             <select name="qualification" id="qualification">
			  <option value="">-Select-</option>
			 <option value="Secondary School Certificate">Secondary School Certificate</option>
			 <option value="OND Holder">OND Holder</option>
			 <option value="HND Holder">HND Holder</option>
			 <option value="Degree Holder">Degree Holder</option>
			 <option value="PHD Holder">PHD Holder</option>
             </select>          
		   </td>
         </tr>
         <tr>
           <td>Salary</td>
           <td>
             <input type="text" name="salary" id = "salary"/>
           </td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td>Payment Information </td>
         </tr>
         <tr>
           <td>Bank name </td>
           <td><label>
             <input type="text" name="bankname" id = "bankname"/>
           </label></td>
         </tr>
         <tr>
           <td>Account type</td>
           <td><label>
             <input type="text" name="acctype" />
             </label>
               <label></label></td>
         </tr>
         <tr>
           <td>Account name </td>
           <td><input type="text" name="acctname" /></td>
         </tr>
         <tr>
           <td>Account number </td>
           <td><label>
             <input type="text" name="acctnum" />
           </label></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td>Enter the 3 black characters </td>
         </tr>
         <tr>
           <td>Captcha</td>
           <td><img src="include/captcha.php" width="80" height="20">
             <label>
             <input type="text" name="captcha" id = "captcha" size="3" maxlength="3"/>
           </label></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td><input type="submit" name="staffsubmit" value="Submit" id="staffsubmit" />
             <input type="reset" name="reset" value="Reset" id="staffreset"/></td>
         </tr>
       </table>
     </form>
   </div>
 </div>
 <div id="footer">
 
 </div>
 
</body>
</html>