<?php
    session_start();
    
    include("include/Utility.php");
    
    $externalobj = new Utility();
    
    $externalobj->securityCheck();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ideen-Verbindeen E-Management System</title>

        <link type ="text/css" rel="stylesheet" href="css/invoicestyle.css" media="all"/>
		<link type="text/css" rel="stylesheet" href="css/css/ui-lightness/jquery-ui-1.7.3.custom.css" media="all">
		<script type="text/javascript" src="js/js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="js/js/jquery-ui-1.7.3.custom.min.js"></script>
		<script type="text/javascript" src="js/jqFancyTransitions.js"></script>
		<script type="text/javascript">
		var admin = '<?php echo $_SESSION['iden1028staffid']; ?>';
		
			$(document).ready(function(){
					//alert("asdfsdf");
											
					$("form").hide();
					
					$("#generate").click(function () {
						
							$("#form").slideDown("slow");
					
					});
					
				});
		</script>
	</head>
	
	<body>
	<div id = "nav">
		<ul>
		

		<li id = "back"><a href='makepayment.php' class="ui-state-default ui-corner-all">Back</a></li>
		
		<li id = "print" onClick="javascript:window.print()"><a href="#" class="ui-state-default ui-corner-all">Print</a></li>
		
		<li id="generate"><a href="#" class="ui-state-default ui-corner-all">Generate Reciept </a></li>
		</ul>
		
		<form method="get" id ="form">
		
		Payment Transaction ID
		  <input type = "text" id = "jobid" name="jobid"/> <input type="button" value="Show Reciept" id = "show"/>
		</form>
	
	</div>
	
	<div id ="header">
	 
	  <img src="images/iden.png">
	    
        
	</div>
	 </p>
	<div id = "invoicehouse">
	
		<div id = "reciept">
		  <table width="575" border="1">
            <thead>
            <tr><td width="163">Transaction  ID </td>
              <td width="213">Job ID </td>
              <td width="213">Job</td>
              <td width="114">Payment</td>
		    </thead>
            <tr>
              <td><?php if(isset($_GET['trans_id'])) echo $_GET['trans_id'];?></td>
              <td><?php if(isset($_GET['jobid'])) echo $_GET['jobid'];?></td>
              <td><?php if(isset($_GET['job'])) echo $_GET['job'];?></td>
              <td><?php if(isset($_GET['pay'])) echo $_GET['pay'];?></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>
		</div>
		
	<div id = "recieptfoot">
	<br/>
			<p><label>Customers Name :-	</label>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<label>Staff ID :- </label> &nbsp;&nbsp;&nbsp;<?php if(isset($_GET['staffid'])) echo "<font color='red'>".$_GET['staffid']."</font>";?></p>
			<p><label>Customers Signature :-</label> </p>
			
			<br/>
	</div>
	</div>
	
	
	</body>
	
</html>