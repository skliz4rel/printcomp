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
		
                $(".success").hide();
                
                var dialog = {
                            title:'Errors',
                            autoOpen:false,
                            hide:"explode",
                            height:300,
                            width:480,
                            modal:true,
                            position:[500,100]
                        };	
                        
                      $("#dialog").dialog(dialog);
                      
                      $("#date").datepicker();
				
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
				
				$("#paybut").click(function () {
					//alert("helo boy");
					var staffid = $("#staffid").val();
					var date = $("#date").val();
					var deposit = $("#transid").val();
					var amount = $("#amount").val();
					
					var error = "Correct the following errors";
					var data = $("#form1").serialize()+"&paybut=1";
					
					$.ajax({
						url: "include/Mainprocessor.php",
						data:data,
                                                type:"POST",
						success:function(data){
                                                    if(data != "success")
                                                     {
                                                         $("#dialog").html(data);
                                                         $("#dialog").dialog("open");
                                                     } 
                                                     else
                                                     {
                                                         $(".success").slideDown("slow");
                                                         $("#staffid").val("");
                                                         $("#date").val("");
                                                         $("#transid").val("");
                                                         $("#amount").val("");
                                                     }
						},
						error:function(){
						},
						
						"dataType":"html"
					
					});
					
				});
                                
                                $("#staffid").focus(function (){
                                     $(".success").hide();                                
                                });
				
                                $("#date").focus(function () {
                                    
                                    $(".success").hide();
                                });
                                
                                $("#historybut").click(function () {
                                   // alert("here my friend");
                                   $.post(
                                        'include/Mainprocessor.php',
                                        {id:$("#id").val(),history:1},
                                        function(data){
                                            $("#dialog").html(data);
                                            $("#dialog").dialog("open");
                                        }
                                    );
                                });
			});
			
		</script>
		
		
	<style type="text/css" rel="stylesheet" media="all">	
		
	</style>
</head>

<body>

    <div id="dialog"></div>
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
           <li title="home"><a href="home.php" >Main Menu</a></li>
           <li><a href="view.php">View Staff Details</a></li>
           <li><a href="#">Edit Staff Details</a></li>
           <li><a href="view.php">Print Staff Details</a></li>
           <li><a href="#">Staff Payment</a></li>
           <li><a href="publicroom.php">Chat Messenger</a></li>
           <li title="logout"><a href="index.php">Logout</a></li>
         </ul>
	
	</div>
	
	<img src="images/homebodbot.png"/>
 
 </div>
 
 <div id="inneright">
 
 <div id="paylink">
 <label><a href="#">Record Staff Payment</a></label>
 <label><a href="#">View Payment History</a></label>
 </div>
 
 
 <div id = "paystaff">
   <form id="form1" name="form1" method="post" action="">
       <p class="success"><img src="images/success.png">Payment Information as been saved</p>
     <table width="577" height="156" border="0">
       <tr>
         <td width="224">Staff ID </td>
         <td width="343"><label>
           <input type="text" name="staffid" id = "staffid" />
         </label></td>
         </tr>
       <tr>
         <td>Payment Date </td>
         <td><label>
           <input type="text" name="date" id ="date"/>
         </label></td>
         </tr>
       <tr>
         <td>Deposit/Transaction ID </td>
         <td><label>
           <input type="text" name="transid" id= "transid"/>
         </label></td>
         </tr>
       <tr>
         <td>Amount Paid </td>
         <td><label>
           <input type="text" name="amount" id="amount"/>
         </label></td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>
           <input type="button" name="Submit" value="Submit" id = "paybut" />
           <input type="reset" name="Submit2" value="Reset" id = "payreset"/>
         </td>
       </tr>
     </table>
      </form>
 </div>
 
 <div id="paymenthistory">
 <form>
	<table width="523" border="0">
      <tr>
        <td width="219">Enter ID </td>
        <td width="225"><input type="text" name="id" id ="id" /></td>
        <td width="228"><label>
          <input type="button" name="Submit3" value="Submit" id = "historybut"/>
        </label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
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