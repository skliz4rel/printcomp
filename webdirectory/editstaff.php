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
		
		var collectedjson = null; //This is a global variable that would accessible throughout the application
		
			$(document).ready(function(){
				
				$("#file").hide(); //This is going to hide the file chooser by default
				
				//This is going to hide the div tag
				$("#editstaff").hide();
				
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
				
				
				$("#getstaffdetail").click(function () {
					var id = $("#staffid").val();
					
					var ereg = /^[0-9]*$/;
					
					if(ereg.test(id)  != true)
					{
						alert("Enter only figures for staff id");
						$("#editstaff").hide();
					}
					else{
						if(id.length > 0){
						//edit the text boxes
						
                                                var data = $("#form1").serialize()+"&collect4update=1";
                                                
						$.ajax({
							url: "include/Mainprocessor.php",
                                                        type:'POST',
							data:data,
							success: function(data){
							
							collectedjson = data; //assigning the object to the global object variable
							
                              alert(data.pic_path);
								dropcontent(data);
							},
                                                        error:function(){
                                                            
                                                        },
                                                        "dataType":"json"
                                                });
						
					
					}
					
					}
				});
				
				$("#yes").click(function (){
                                       
                                        $("#uploadoption").hide("slow");
					$("#file").show("slow");
					
				});
				
                                
                                $("#file").click(function () {
                                    $('#photo').attr("src","");//clears the old picture from the browser screen
                                    
                                });
				
				function dropcontent(data){
					$("#staffname").val(data.name);
					$('#staffphone').val(data.phone);
					$('#staffmail').val(data.email);
                                        $('#staffaddress').val(data.address);
                                        $('#sex').val(data.sex);
                                        $('#department').val(data.department);
					$('#level').val(data.level);
                                        $('#qualification').val(data.qualification);
                                        $('#salary').val(data.salary);
                                        $('#file').attr("val",data.pic_path);
                                        
                                      
                                        $('#bankname').val(data.bankname);
                                        $('#acctname').val(data.acct_name);
                                        $('#acctype').val(data.acct_type);
                                        $('#acctnum').val(data.acct_num);
                                        
                                        //The display photo
                                        $('#photo').attr('src',data.path);
                                        
					$("#editstaff").slideDown("slow");
				}
                                
                                
                                //This function is going to be used to submit the form
                                $("#form2").submit(function (){
                                    
                                    var onSubmit = true;
                                    
                                    var name = $("#staffname").val();
                                    var error = "Correct the following errors commited \n";
                                    if(name.length < 2){
                                        
                                        onSubmit = false;
                                        error+="Enter a value not less than 2 characters in the name field";
                                    }
                                    
                                    if(onSubmit == false)
                                    {
                                            return false; //This is going to prevent the form from submiting
                                     }
                                    if(onSubmit == true){
                                        //The form is ok you van submit here
                                        document.form2.action = "include/Mainprocessor.php?id="+collectedjson.id;
                                        return true;
                                    }
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
           <li title="home"><a href="#" >Main Menu</a></li>
           <li><a href="view.php">View Staff Details</a></li>
           <li><a href="#">Edit Staff Details</a></li>
           <li><a href="view.php">Print Staff Details</a></li>
           <li><a href="paystaff.php">Staff Payment</a></li>
           <li><a href="publicroom.php">Chat Messenger</a></li>
           <li title="logout"><a href="index.php">Logout</a></li>
         </ul>
	
	</div>
	
	<img src="images/homebodbot.png"/>
 
 </div>
 
 <div id="inneright">
 
 <div id="staff">
   <form id="form1" name="form1" method="post" action="">
     <table width="574" border="0">
       <tr>
         <td width="111">Staff ID </td>
         <td width="290"><label>
            <input type="text" name="staffid" id = "staffid" />
         </label></td>
         <td width="159"><input type="button" name="getstaffdetail" value="Retrieve Details" id="getstaffdetail"/></td>
       </tr>
     </table>
      </form>
 </div>
 
 
 <div id = "editstaff">
   <div id="div">
     <form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
       <table width="515" border="0">
         <tr>
           <td>&nbsp;</td>
           <td>Personal Information </td>
         </tr>
         <tr>
           <td width="142">Name </td>
           <td width="363"><label>
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
           <td><input type="text" class="sex" name = "sex" id ="sex"/></td>
         </tr>
         <tr>
           <td>Upload Picture </td>
           <td>
		   <input type="file" name="file" id = "file" value=""/>
		   <label id = "uploadoption">
             
             <br />
             Change Picture 
             <input name="radiobutton" type="radio" value="radiobutton" id= "yes"/>
           Yes
           <input name="radiobutton" type="radio" value="radiobutton" checked="checked" id = "no"/>
           No
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
           <td><select name="department" id = "department" />
           
               <option value="">-Select-</option>
               <option value="Administration">Administration</option>
               <option value="Creative">Creative</option>
               <option value="Press">Press</option>
               <option value="Account">Account</option>           </td>
         </tr>
         <tr>
           <td>Level</td>
           <td><label>
             <input type="text" name="level" id = "level" />
           </label></td>
         </tr>
         <tr>
           <td>Qualification</td>
           <td><select name="qualification" id="qualification">
               <option value="">-Select-</option>
               <option value="Secondary School Certificate">Secondary School Certificate</option>
               <option value="OND Holder">OND Holder</option>
               <option value="HND Holder">HND Holder</option>
               <option value="Degree Holder">Degree Holder</option>
               <option value="PHD Holder">PHD Holder</option>
             </select>           </td>
         </tr>
         <tr>
           <td>Salary</td>
           <td><label>
             <input type="text" name="salary" id = "salary"/>
           </label></td>
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
             <input type="text" name="acctype" id="acctype" />
             </label>
               <label></label></td>
         </tr>
         <tr>
           <td>Account name </td>
           <td><input type="text" name="acctname" id="acctname"/></td>
         </tr>
         <tr>
           <td>Account number </td>
           <td><label>
             <input type="text" name="acctnum" id="acctnum" />
           </label></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td>Enter the 3 black characters </td>
         </tr>
         <tr>
           <td>Captcha</td>
           <td> <img src="include/captcha.php">
             <input type="text" name="captcha" id = "captcha" size="3" maxlength="3"/></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td><input type="submit" name="staffupdate" value="Update" id="updatestaff"/>
               <input type="reset" name="reset" value="Delete" id = "deletestaff"/></td>
         </tr>
       </table>
       
     </form>
	 <img id ="photo"/>
     </div>
 </div>
 <div>
 
 </div>
 
 </div>
 
 </div>
 
 
 
 <div id="footer">
 
 </div>
 
</body>
</html>