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
					
					$("#show").live("click",function (){
					var form = $("#form").serialize()+"&getInvoice=1";
					//alert("asdfasdf");
					
						$.ajax({
							url:"include/Clientprocessor.php",
							type:"GET",
							data:form,
							success:function(data){
							alert(data.unitcost);
								//showInvoice(data);
								$("#sn").html('1');
						
						$("#item").html(data.items);
						
						$("#details").html(data.description);
						
						$("#quantity").html(data.quantity);
						
						$("#unitcost").html(data.unitcost);
						
						$("#totalcost").html(data.totalcost);
						
						$('#custname').html(data.clientname);
						
						$("#prepstaff").html(admin);
						
						$("form").hide();
						
							},
							error:function(){
								
							},
							"dataType":"json"
						
						});
					});
					
					function showInvoice(data){
						
					}
				});
		</script>
	</head>
	
	<body>
	<div id = "nav">
		<ul>
		
		<li id = "back"><a href='home.php'>Back</a></li>
		
		<li id = "print" onClick="javascript:window.print()">Print</li>
		
		<li id="generate">Generate Invoice </li>
		</ul>
		
		<form method="get" id ="form">
		
		Enter Job ID<input type = "text" id = "jobid" name="jobid"/> <input type="button" value="Show Invoice" id = "show"/>
		</form>
	
	</div>
	
	<div id ="header">
	  <p>IDEEN - VERBINDEEN LIMITED</p>
	  <p>Allen avenue lagos.<br /> 
       </p>
	</div>
	
	<div id = "invoicehouse">
	
	<div id="invoice">
	  <table width="1097" border="1">
        <tr>
          <td width="27">S/N</td>
          <td width="140">Item</td>
          <td width="556">Description</td>
          <td width="121">Quantity</td>
          <td width="106">Unit Price </td>
          <td width="115">Net Total </td>
        </tr>
        <tr>
          <td height="63"><div id = "sn"></div></td>
          <td><div id="item"></div></td>
          <td><div id="details"></div></td>
          <td><div id = "quantity"></div></td>
          <td><div id = "unitcost"></div></td>
          <td><div id = "totalcost"></div></td>
        </tr>
        <tr>
          <td height="283"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
	</div>
	
	
	<div id = "footer">
	  <p>CUSTOMER'S SIGN_________________________			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		  PREPARED BY_______________________________________</p>
	  <p>CUSTOMER'S NAME <label id = 'custname'> </label>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PREPARED BY STAFF WITH ID :- <label id='prepstaff'></label></p>
	  <p>GOODS ONCE RECIEVED CANNOT BE RETURNED.<br />
	    NB: ALL CUSTOMERS MUST PRESENT THIS INVOICE FOR CONFIRMATION ON THE COLLECTION OF JOB<br />
	    ELSE THE JOB WILL NOT BE RELEASED.
	    <br /> 
	    <br />
      </p>
	</div>
	
	</div>
	
	
	</body>
	
</html>