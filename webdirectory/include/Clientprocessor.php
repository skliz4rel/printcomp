<?php
session_start();
	
	include("Utility.php");
        include("Uploadimage.php");
	
	class Main{
		
		//declaring the variables of the program
		protected $name = null;
		protected $phone = null;
		protected $home = null;
		protected $company = null;
		protected $comp_address = null;
		protected $comp_phone = null;
		protected $website = null;
		protected $email = null;
		protected $referer = null;
		protected $captcha = null;
		
		protected $externalobj = null;
                
                
                //declaring the jobbag form variables
                protected $clientid = null;
                protected $jobname = null;
                protected $jobsize = null;
                protected $jobtype = null;
                protected $jobcolor = null;
                protected $jobquantity = null;
                protected $duration = null;
                protected $finishdate = null;
                protected $details = null;
                protected $cost = null;
                protected $totalcost = null;
                
	
		function __construct()
		{
			$this->externalobj = new Utility();
			$this->externalobj->doConnect();
			
		}
		
		function saveClient(){
		//	echo "hello";
			$this->name = $this->externalobj->stopInjection($this->externalobj->filter($_POST['name']));
			$this->phone = $this->externalobj->stopInjection($this->externalobj->filter($_POST['phone']));
			$this->home = $this->externalobj->stopInjection($this->externalobj->filter($_POST['home']));
			$this->company = $this->externalobj->stopInjection($this->externalobj->filter($_POST['company']));
			$this->comp_address = $this->externalobj->stopInjection($this->externalobj->filter($_POST["comp_address"]));
			$this->comp_phone = $this->externalobj->stopInjection($this->externalobj->filter($_POST["comp_phone"]));
			
			$this->website = $this->externalobj->stopInjection($this->externalobj->filter($_POST['website']));
			$this->email = $this->externalobj->stopInjection($this->externalobj->filter($_POST['email']));
			$this->referer = $this->externalobj->stopInjection($this->externalobj->filter($_POST["referer"]));
			$this->captcha = $this->externalobj->stopInjection($this->externalobj->filter($_POST['captcha']));
			
			
			$content = array("Name"=>$this->name,"Phone number"=>$this->phone,"Home Address"=>$this->home,"Company"=>$this->company,"Website"=>$this->website,"Email Address"=>$this->email,"Captcha"=>$this->captcha);
			
			$error = null;
			
			foreach($content as $key => $value){
				if(empty($value)){
					$error .= "<li>".$key."</li>";
				}
			}
			
			if(!is_null($error)){
				echo "<ul>";
				echo $error;
				echo "</ul>";
			}
			else{
			$error1 = null;
			$value = preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $this->email);
			
			if($value == false)
			{
				$error1 .= "<li>Enter a correct email address (e.g. y@yahoo.com)</li>";
			}
		
			$test = preg_match("/^([0-9])*$/",$this->phone);
				
			if(!$test){
					$error1 .= "<li>Enter a valid phone number (only numbers are accepted in this field)</li>";
					echo $error1;
					return;
			}	
			
			if($_SESSION['captcha'] != $this->captcha){
					echo "You have entered a wrong captcha<br/>";
					echo "Enter the 3 black characters<br/>";
					echo "<a href='..\client.php'>Refill staff details form</a>";
					return;
				}			
				else{
					echo "The field are free";
					//Now you may insert the details in to the database
					$query = "insert into client (name,phone,homeaddress,company,comp_address,comp_phone,website,email,referer) values ('$this->name','$this->phone','$this->home','$this->company','$this->comp_address','$this->comp_phone','$this->website','$this->email','$this->referer');-- ";
					
					$result = mysql_query($query);
					
					$id = mysql_insert_id();
					
					if($id >0){
						echo "Client details inserted";
						$this->externalobj->protectDir("../client.php?id=".urlencode($id)+"&name=".urlencode($this->name));
					}
				}
			
			}
		}
		
		
		function createAccount(){
			
			
                        //delcaring and initializing the variables
                        $department = $this->externalobj->stopInjection($this->externalobj->filter($_POST['admintype']));
                        $staffname = $this->externalobj->stopInjection($this->externalobj->filter($_POST['staffname']));
                        $staffid = $this->externalobj->stopInjection($this->externalobj->filter($_POST['staffid']));
                        $username = $this->externalobj->stopInjection($this->externalobj->filter($_POST['username']));
                        $password = $this->externalobj->stopInjection($this->externalobj->filter($_POST['password']));
                        $captcha = $this->externalobj->stopInjection($this->externalobj->filter($_POST['captcha']));
                        
			$content = array("Deparment"=>$department,"Staff Name"=>$staffname,"Staff ID"=>$staffid,"Username"=>$username,"Password"=>$password,"Captcha"=>$captcha);
                        $error = null;
                        
                        foreach($content as $key => $value){
                            if(empty($value))
                                $error .= "<li>Enter ".$key."</li>";
                        }
                        
                        if(!is_null($error)){
                            echo "Please correct the following errors";
                            echo "<ul>";
                            echo $error;
                            echo "</ul>";
                            return;
                        }
                        
                        if($_SESSION['captcha'] != $captcha){
					echo "You have entered a wrong captcha<br/>";
					echo "Enter the 3 black characters<br/>";
					echo "<a href='..\account.php'>Refill staff details form</a>";
					return;
                        }		
                        else{
                         $test = preg_match("/^([0-9])*$/",$staffid);
                        if(!$test){
                            echo "<li>Enter only numbers for the staff id</li>";
                            return; //This is going to stop the script form further movement
                        }
                        else
                        {
                              //perform a check to ensure the staff already as an account
                              $query= "select staffid from login where staffid=$staffid;--";
                              $result = mysql_query($query);
                              $num= mysql_num_rows($result);
                              
                              if($num >0){
                                  //This means the staff already as a login details
                                  $this->externalobj->protectDir("..\account.php?id=exits");
                              }
                                else{
                                //perform the encryption on the password
                                $newpass = $this->externalobj->doEncryption($password);
                                echo $newpass;

                                //at this point send informations into the database
                                $query = "insert into login (staffid,username,password,admintype) values ($staffid,'$username','$newpass','$department') ;--";

                                $result = mysql_query($query);

                                $id = mysql_insert_id();

                                mysql_free_result($result); //This is going to help to deallocate memory from thhe database result object
                                    if($id >0){
                                        echo "success";
                                        $this->externalobj->protectDir("..\account.php?id=created");
                                        //now redirect the page
                                    }
                                }
                            } 
                         }
		       }
			   
			   function getStaffid()
			   {
			   		$staffname = $_POST['sfn'];
					$department = $_POST['dpt'];
                                        
                                      
					
					$query = "select id from staff where name = '$staffname' and department = '$department';--";
					
					$result = mysql_query($query);
					
					$record = mysql_fetch_array($result);
					
					$id = $record[0];
					
					mysql_freeresult($result); //clear the resultset memory allocated
					
					echo $id;
			   }
                           
                           
                 function saveJob(){
                                      
                     //initializing the variables
                     $this->clientid = $this->externalobj->stopInjection($this->externalobj->filter($_POST['cid']));
                     $this->jobname = $this->externalobj->stopInjection($this->externalobj->filter($_POST['jobname']));
                     $this->jobsize = $this->externalobj->stopInjection($this->externalobj->filter($_POST['jobsize']));
                     $this->jobtype = $this->externalobj->stopInjection($this->externalobj->filter($_POST['jobtype']));
                     $this->jobcolor = $this->externalobj->stopInjection($this->externalobj->filter($_POST['color']));
                     $this->jobquantity = $this->externalobj->stopInjection($this->externalobj->filter($_POST['quantity']));
                     $this->duration = $this->externalobj->stopInjection($this->externalobj->filter($_POST['interval']));
                     $this->finishdate = $this->externalobj->stopInjection($this->externalobj->filter($_POST['date']));
                     $this->details = $this->externalobj->stopInjection($this->externalobj->filter($_POST['details']));
                     $this->cost = $this->externalobj->stopInjection($this->externalobj->filter($_POST['cost']));
                     $this->totalcost = $this->externalobj->stopInjection($this->externalobj->filter($_POST['totalcost']));
                     $this->captcha = $this->externalobj->stopInjection($this->externalobj->filter($_POST['captcha']));
                     
                     
                     $content = array("Client id"=>$this->clientid,"Job name"=>$this->jobname,"Job Size"=>$this->jobsize,"Job Type"=>$this->jobtype,"Job Color"=>$this->jobcolor,"Job Quantity"=>$this->jobquantity,"Execution Time"=>$this->duration,"Finish Time"=>$this->finishdate,"Cost"=>$this->cost,"Total cost"=>$this->totalcost,"Captcha"=>$this->captcha);
                     $error = null;
                     foreach($content as $key => $value){
                         
                         if(empty($value)){
                             
                             $error .= "<li>Enter {$key}</li>";
                         }
                     }
                     
                     if(!is_null($error)){
                         
                         echo "<ul>";
                         echo $error;
                         echo "</ul>";
                     }
                     else{
                         
                        
                            //now send the details into the database
                           if($_SESSION['captcha'] != $this->captcha){
					echo "You have entered a wrong captcha<br/>";
					echo "Enter the 3 black characters<br/>";
					echo "<a href='..\jobbag.php'>Refill staff details form</a>";
					return;
			   }
                             $test = preg_match("/^[0-9]+$/",$this->clientid);
                             if($test == false){
                                 echo "Client must be an integer";
                                 echo "If you have forgotten enter the name of the client in the first textbox";
                                 echo "<a href='../jobbag.php'>click to here re - fill</a>";
                                 
                             }
                                else{
                                    
                                    
                                    $query = "insert into jobbag (client_id,job_name,job_size,job_type,quantity,duration,delivery_date,details,cost,totalcost,pay_status,execution) values($this->clientid,'$this->jobname','$this->jobsize','$this->jobtype',$this->jobquantity,'$this->duration','$this->finishdate','$this->details',$this->cost,$this->totalcost,false,false);--";
                                    
                                    $result = mysql_query($query) or die(mysql_error());
                                    
                                    $id = mysql_insert_id();
                                    
                                    if($id >0){
                                        echo "successfull";
                                        $this->externalobj->protectDir("..\invoice.php?jobid=$id");
                                    }
                                }
                         
                     }
                 }
                 
                 function getID(){
                     $clientname = $_POST['thename'];
                     
                     $query = "select id from client where name = '$clientname';--";
                     
                     $result = mysql_query($query);
                     
                     $id = mysql_num_rows($result);

                     if($id >0){
                     $record = mysql_fetch_array($result);
                     
                     echo $record[0];
                     
                     }
                     else
                         echo "Client name doesnt exit";
                 }
                 
                 function sendUnitcost(){
                     $option = $_POST['value'];
                     
                     $price = null;
                     
                     $object = simplexml_load_file("pricelist.xml");
                     
                     foreach($object as $key => $value){
                         $key = str_replace("_"," ",$key);
                         
                         if($option == $key){
                             $price = $value;
                             break;
                         }
                     }
                     
                     echo $price;
                 }
                 
	
                 function displayInvoice(){
                     
                     $jobid = (int)$this->clientid = $this->externalobj->stopInjection($this->externalobj->filter($_GET['jobid']));
                     
                     $query = "select * from jobbag where id = $jobid";
                     
                     $result = mysql_query($query);
                     
                     $rows = mysql_num_rows($result);
                     
                     if($rows > 0){
                         
                         $record = mysql_fetch_array($result);
                     
                    
                     
                    $query = "select name from client where id=$record[1];--";
                    
                    $result = mysql_query($query);
                    
                    $record1 = mysql_fetch_array($result);
                    
                     $content = array(
                                        'clientid'=>$record[1],
                                        'items'=>$record[2],
                                        'description'=>$record[8],
                                        'quantity'=>$record[5],
                                        'unitcost'=>$record[9],
                                        'totalcost'=>$record[10],
                                        'clientname'=>$record1[0]
                                    );
                     
                      echo json_encode($content);
                   
                     }
                 
                 }
                 
                 function getJobs(){
                     
                     $id = (int)$_POST['id'];
                     $query = "select id,job_name from jobbag where client_id = $id and pay_status=false;--";
                     $result = mysql_query($query);
                     $value = "<select id = 'jobs' name='jobs'>";
                     $value .= "<option value=''>--Select--</option>";
                     $num = mysql_num_rows($result);
                     
                     if($num >0)
                     while($record = mysql_fetch_array($result)){                         
                         $value .="<option value=$record[0]>". $record[1]."</option>";
                     }
                     else{
                         $value .="<option value=''>No jobs</option>";
                     }
                     
                     $value.="</select>";
                     
                     echo $value;
                 }
                 
                 function getPay(){
                     
                     $jid = (int)$_POST['jid'];
                     
                     $query = "select totalcost from jobbag where id = $jid";
                     
                     $result = mysql_query($query);
                     
                     $num = mysql_num_rows($result);
                     
                     if($num >0){
                         $record = mysql_fetch_array($result);
                         echo $record[0];
                     }
                 }
                 
                 
              function generate_key($group_num = 4, $pair_num = 2)
              {
                $letters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $key = '';

                for($i = 1; $i <= $group_num; $i++)
                {
                $key .= substr($letters, rand(0, (strlen($letters) - $pair_num)), $pair_num) . '-';
                }

                $key[strlen($key)-1] = ' ';

                return trim($key);
             }
                
                
                function pay_for_job(){
                    $key = null;
                    
                    $staffid = $_REQUEST['staffid'];
                    //make the validation
                    $pay = (int)$this->externalobj->stopInjection($this->externalobj->filter($_POST['pay']));
                    $jobid = (int)$this->externalobj->stopInjection($this->externalobj->filter($_POST['jid']));
                    
                    $content = array("Payment"=>$pay,"Job ID"=>$jobid);
                    
                    $error = null;
                    foreach($content as $key => $value){
                        if(empty($value)){
                            $error .= "<li>Enter ".$key."</li>";
                        }
                    }
                    
                    if(!is_null($error)){
                        echo "<ol>";
                        echo $error;
                        echo "</ol>";
                        return;
                    }
                    
                    //check if the job id is correct or valid
                    $query = "select id from jobbag where id = $jobid";
                    $result = mysql_query($query);
                    $id = mysql_num_rows($result);
                    if($id <=0)
                        echo "This job id does not exits";
                    else{
                    while(true){
                        $key = $this->generate_key(4, 4); //This is the key generator for the payment transaction id
                        
                        $query = "select trans_id from job_payment where trans_id=$key;--";
                        
                        $result = mysql_query($query);
                        
                        $id = mysql_num_rows($result);
                        
                        if($id == 0)
                            break;                            
                    }
                    
                    
                    $query ="insert into job_payment (trans_id,jobid,payment) values ('$key',$jobid,$pay);--";
                    
                    $result = mysql_query($query);
                    
                    $id = mysql_insert_id();
                    
                    if($id >0){
                        
                        //Now we are going to update the jobbag table 
                        $query = "update jobbag set pay_status = true where id = $jobid;--";
                        
                        $result = mysql_query($query);
                        
                        $id = mysql_affected_rows();
                        if($id >0)
                            $this->externalobj->protectDir("../reciept.php?trans_id=$key&jobid=$jobid&pay=$pay&staffid=$staffid");
                    }
                    
                    }
                }
                
                function publicChat(){
                    
                    $message = $this->externalobj->stopInjection($this->externalobj->filter($_POST['message']));
                    $username = $this->externalobj->stopInjection($this->externalobj->filter($_POST['username']));
                    $staffid = $this->externalobj->stopInjection($this->externalobj->filter($_POST['staffid']));
                    
                    //echo $message;
                    $query = "insert into publicchat (username,staff_id,message) values ('$username',$staffid,'$message');--";
                    
                    $result = mysql_query($query);
                    
                    $id = mysql_insert_id();
                    
                    if($id >0)
                        echo "entered";
                }
                
                function showpublicchatmsg(){
                    $output = null;
                    
                    $query = "select username,message from publicchat;--";
                    $result = mysql_query($query);
                    
                    $num = mysql_num_rows($result);
                    
                    if($num >0){
                        while($record = mysql_fetch_array($result)){
                            $output .= $record['username']." :- ".$record['message']."<br/>";                            
                        }
                        
                        echo $output;
                    }
                }
                
                function showUsers(){
                    
                    $users = null;
                    $query = "select username,staff_id from chatusers;--";
                    
                    $result = mysql_query($query);
                    
                    while($record = mysql_fetch_array($result)){
                        if($record[0] != $_SESSION['iden1028username'])
                        $users .= "<p>{$record[0]} &nbsp; &nbsp; &nbsp;<a id='$record[1]' class='ui-state-default ui-corner-all' target='_blank'>private</a><br/></p>";
                        else
                        {
                           $users .= "<p>{$record[0]} (You)<br/></p>"; 
                        }
                    }
                    
                    echo $users;
                }
                
                function logout(){
                    
                    $username = $_POST['username'];
                    $staffid = $_POST['staffid'];
                    
                    $logoutcomment = "$username has just logged out from the public chat room.................>";
                    
                    $query = "insert into publicchat (username,staff_id,message) values('',$staffid,'$logoutcomment') ;--";
                    
                    $result = mysql_query($query);
                    
                    $query = "select id from chatusers";
                    
                    $result = mysql_query($query);
                    
                    $num = mysql_num_rows($result);
                    
                    if($num == 1){
                        $query = "delete from chatusers;--";
                        $result = mysql_query($query);
                       
                        $query = "delete from publicchat;--";
                        $result = mysql_query($query);
                       $id = mysql_affected_rows();
              
                            echo "logout";
                    }
                    
                    if($num >1){
                        $query= "delete from chatusers where username = '$username' and staff_id=$staffid;--";
                        $result = mysql_query($query);
                        $id = mysql_affected_rows();
                       
                            echo "logout";
                    }
                    
                    
                }
                
                function privateChat(){
                    //echo "hello pal";
                    //collect the variables to enter
                    $username = $_POST['username'];  $staffid = $_POST['staffid'];
                    $you = $_POST['you']; $chatpal = $_POST['chatpal'];
                    $message = $this->externalobj->stopInjection($this->externalobj->filter($_POST['message']));
                    $chatter = $you.'-'.$chatpal;
                    
                    $query = "insert into privatechat (username,message,chatter,staff_id) values ('$username','$message','$chatter','$staffid') ;--";
                    $result = mysql_query($query);
                    
                    $id = mysql_insert_id();
                    
                    if($id >0)
                        echo "success";
                }
                
                
                function showPrivatemesg(){
                    $output = null;
                   $you = $_POST['you'];
                   
                   $chatpal = $_POST['chatpal'];
                   
                   $vals = $you."-".$chatpal; $vals1 = $chatpal."-".$you;
                    
                   $query = "select username,message from privatechat where chatter ='$vals' or chatter = '$vals1'--";
                   
                   $result = mysql_query($query);
                   
                   while($record = mysql_fetch_array($result)){
                        $output .= $record[0]." :- ".$record[1]."<br/>";
                   }
                   
                   mysql_free_result($result); //clears the memory
                   echo $output;
                }
                
                function registerPrivateChatuser(){
                     $staffid = $_POST['staffid'];
                   
                   $chatpal = $_POST['chatpal'];
                   
                   $vals = $staffid."-".$chatpal; $vals1 = $chatpal."-".$staffid;
                   
                   $query = "select id from registerprivatechatid where chatter = '$vals' or chatter = '$vals1';--";
                   
                   $result = mysql_query($query);
                   
                   $num = mysql_num_rows($result);
                   
                   if($num <1){
                   $username = $_POST['username'];  
                   
                   $query = "insert into registerprivatechatid (username,staffid,chatter,partner) values ('$username',$staffid,'$vals','idle') ";
                   
                   $result = mysql_query($query);
                   
                   $id = mysql_insert_id();
                   
                   if($id >0)
                        echo "registered";
                   }
                }
                
                
                function collectPrivatechats(){                    
                    //echo "hello";
                    $staffid = $_POST['staffid'];
                    $query = "select * from registerprivatechatid";
                    
                    $result = mysql_query($query);
                    
                    $ids = array();  $pchatrecord;
                    
                    $i = 0; 
                    $num = mysql_num_rows($result);
                    
                    if($num >0)
                    {
                        
                        while($record = mysql_fetch_array($result)){
                        
                        $ids = explode("-",$record['chatter']);
                        
                        if($staffid == $ids[0] || $staffid == $ids[1]){
                            if($record['partner'] == 'idle' and $record['staffid'] != $staffid){
                                
                                $pchatrecord = $record['username'].'/'.$record['staffid'];
                                
                                $query = "update registerprivatechatid set partner = 'active' where id = $record[0] and partner = 'idle' ";
                                $result1 = mysql_query($query);
                                
                                $row = mysql_affected_rows();
                                break;
                            }
                        }
                      }
                    }
                    
                   if(isset($pchatrecord) and !is_null($pchatrecord))
                        echo $pchatrecord;
                   else
                       echo  null;
                    
                }
                
                function privateLogout(){
                    //collect the values from the variables
                    $username = $this->externalobj->stopInjection($this->externalobj->filter($_POST['username']));
                    $staffid = $this->externalobj->stopInjection($this->externalobj->filter($_POST['staffid']));
                    $you = (string)$this->externalobj->stopInjection($this->externalobj->filter($_POST['you']));
                    $chatpal = (string)$this->externalobj->stopInjection($this->externalobj->filter($_POST['chatpal']));
                    
                    $vals = $staffid."-".$chatpal; $val = $chatpal."-".$staffid;
                    
                    $query = "select id from registerprivatechatid where chatter = '$vals' or chatter = '$val' and partner ='logout' ;--";
                    $result = mysql_query($query);
                    $id = mysql_num_rows($result);
                    if($id >0){
                        
                        $query = "delete from registerprivatechatid where chatter = '$vals' or chatter = '$val';--";
                        $result = mysql_query($query);
                        
                        $query = "delete from privatechat where chatter = '$val' or chatter='$vals';--";
                        
                        $result = mysql_query($query);
                        
                    }
                    else{
                    $record = mysql_fetch_array($result);
                   
                    $query= "insert into privatechat (username,message,chatter,staff_id) value ('$username','Bye I have just logged out','$vals',$staffid);--";
                    
                    $result = mysql_query($query);
                    
                    $id  = mysql_insert_id();
                    
                    if($id >0){
                     
                        //update the private chat registration table
                        $query = "update registerprivatechatid set partner = 'logout' where chatter = '$vals' or chatter = '$val';--";
                        $result = mysql_query($query);
                        
                        $id = mysql_affected_rows();
                        if($id > 0){
                             echo "logout";                  
                        }
                      }
                    } //The end of the else statement
                }
                
                
                function unpaidJobs(){
                    
                    $output = "<label class='linkbox'>Generate statistics<label><br/>";
                    $output .= "<table>";
                    $output .= "<tr><th>Client ID</th><th>Job Name</th><th>Job Size</th><th>Job Type</th><th>Quantity</th><th>Duration</th><th>Delivery Date</th><th>Details</th><th>Total Cost</th></tr>";
                    //echo "success";
                    $option  = $this->externalobj->stopInjection($this->externalobj->filter($_POST['option']));
                    
                    $query = "select * from jobbag where pay_status = false";
                    
                    $result = mysql_query($query);
                    
                    $num = mysql_num_rows($result);
                    
                    if($num >0){
                        
                        while($record = mysql_fetch_array($result)){                            
                              $output .="<tr><td>$record[1]</td><td>$record[2]</td><td>$record[3]</td><td>$record[4]</td><td>$record[5]</td><td>$record[6]</td><td>$record[7]</td><td><a href='#' title='$record[8]' class='fullview'>full view</a></td><td>$record[10]</td></tr>";
                        }
                    }
                    
                    $output .="</table>";
                   echo $output;
                }
                
               
                function unexecutedpaidJobs(){
                    
                    $option = $this->externalobj->stopInjection($this->externalobj->filter($_POST['option']));
                    
                     $output = null;
                     if(isset($option) and $option == 'All'){
                    $output = "<label class='linkbox'>Generate statistics<label><br/><table>";
                    $output .= "<tr><th>Client ID</th><th>Job Name</th><th>Job Size</th><th>Job Type</th><th>Quantity</th><th>Duration</th><th>Delivery Date</th><th>Details</th><th>Total Cost</th></tr>";
                    $query = "select * from jobbag where pay_status = true and execution= false;--";
                    
                    $result = mysql_query($query);
                    
                    $num = mysql_num_rows($result); //check if there are records
                    
                    if($num >0){
                        while($record = mysql_fetch_array($result)){
                            $output .="<tr><td>$record[1]</td><td>$record[2]</td><td>$record[3]</td><td>$record[4]</td><td>$record[5]</td><td>$record[6]</td><td>$record[7]</td><td><a href='#' title='$record[8]' class='fullview'>full view</a></td><td>$record[10]</td></tr>"; $output .= "";
                        }
                        
                        $output .= "</table>";
                        
                        echo $output;
                    }
                    else
                    {
                        //no record here
                        echo "There are no records";
                    }
                  }
                  
                }
                
                function unexecutedClientjobs(){
                    $option = $this->externalobj->stopInjection($this->externalobj->filter($_POST['option']));  
                    $cid = $this->externalobj->stopInjection($this->externalobj->filter($_POST['cid']));
                    $output = null;
                    $output = "<label class='linkbox'>Generate statistics<label><br/><table>";
                    $output .= "<tr><th>Client ID</th><th>Job Name</th><th>Job Size</th><th>Job Type</th><th>Quantity</th><th>Duration</th><th>Delivery Date</th><th>Details</th><th>Total Cost</th></tr>";
                   
                    if(!$cid){
                        
                        echo "Please Enter a client id";
                        return;
                    }
                    
                    if(isset($option) and $option == 'All' and isset($cid)){
                        $query = "select * from jobbag where pay_status = true and execution = false and client_id = $cid;--";
                        $result = mysql_query($query);
                        
                        $num = mysql_num_rows($result); //check if there are records
                        
                        if($num >0){
                        while($record = mysql_fetch_array($result)){
                            $output .="<tr><td>$record[1]</td><td>$record[2]</td><td>$record[3]</td><td>$record[4]</td><td>$record[5]</td><td>$record[6]</td><td>$record[7]</td><td><a href='#' title='$record[8]' class='fullview'>full view</a></td><td>$record[10]</td></tr>"; $output .= "";
                        }
                        
                        $output .= "</table>";
                        
                        echo $output;
                      }
                      else
                           echo "No records found";
                    }
                    
                   
                }
                
                function UploadJobs(){
                    $regexp = null;
                    $imagesize = null;  $location = null;
                    $smallimagepath = "../../smallpics/"; $largeimagepath = "../../largepics/"; $zipfilepath = "../../archives/";
                    //collecting the posted variables from it form
                   $jobname =  $this->externalobj->stopInjection($this->externalobj->filter($_POST['jobname']));
                   $jobid = $this->externalobj->stopInjection($this->externalobj->filter($_POST['jid']));  echo "her ".$jobid;
                   $small = $_FILES['smallimage'];
                   $large = $_FILES['largeimage'];
                   $zipfile = $_FILES['zipfile'];
                   
                  
                   $obj = new Uploadimage();
                   
                  //now let use save the small image
                  $regexp = '/\.(jpg|jpeg|gif|jpe|png)$/i';
                  $smallimagepath =  $obj->upload($small,9000000,$smallimagepath,$regexp);
                  
                  echo $smallimagepath;
                  
                  $largeimagepath = $obj->upload($large,900000000,$largeimagepath,$regexp);
                  
                  echo "<br/>";
                  echo $largeimagepath;
                  
                  $regexp = '/\.(zip|rar)$/i';
                  $zipfilepath = $obj->upload($zipfile,900000000,$zipfilepath,$regexp);
                  
                  echo "<br/>";
                  echo $zipfilepath;
                  
                  //now update the jobs to be finished
                  $query = "insert into uploadedjob (jobid,smallimagepath,largeimagepath,zippath) values ($jobid,'$smallimagepath','$largeimagepath','$zipfilepath');--";
                  $result = mysql_query($query);
                  
                  $id = mysql_insert_id();
                  
                  if($id >0){
                      //update the jobbag table to show that the job as been executed now
                      $query = "update jobbag set execution = true where id = $jobid;--";
                      
                      $result = mysql_query($query);
                      
                      $id = mysql_affected_rows();
                      if($id >0)
                          $this->externalobj->protectDir("../upload.php?id=done");
                      
                  }
                }
                
                
                function showIDtoprint(){
                    $clientid = (int)$_POST['cid'];
                    $query = "select id, job_name from jobbag where client_id = $clientid and pay_status=true and execution = true;--";
                    
                    $result = mysql_query($query);
                    
                    $output = null;
                    
                    
                    while($record = mysql_fetch_array($result)){
                       $output .= "<option value=$record[0]>$record[1]</option>";
                    }
                    
                    echo $output;
                }
                
                
                function showDownlink(){
                    
                    $jobid = (int)$this->externalobj->stopInjection($this->externalobj->filter($_POST['jobid']));
                    
                    $query = "select zippath from uploadedjob where jobid = $jobid";
                    
                    $result = mysql_query($query);
                    
                    $record = mysql_fetch_array($result);
                    
                    $id = mysql_num_rows($result);
                    if($id >0)
                      echo "<a href='printcomp/$record[0]'> Download</a>";
                    else
                        echo "No download for this jobid";
                }
                
                
	}
        
	$object = new Main();
	
	if(isset($_POST['clientbutton']))
		$object->saveClient();
		
	if(isset($_POST['creatacct']))
		$object->createAccount();
		
	if(isset($_POST['sid']))
		$object->getStaffid();
        
        if(isset($_POST['jobbutton']))
            $object->saveJob();
        
        if(isset($_POST['getId']))
            $object->getID();
        
        if(isset($_POST['getCost']))
            $object->sendUnitcost();
        
        if(isset($_GET['getInvoice'])){
            
            $object->displayInvoice();
        }
        
        if(isset($_POST['getjobs']))
            $object->getJobs();
        
       if(isset($_POST['jid']))
           $object->getPay();
       
       if(isset($_POST['makepay']))
           $object->pay_for_job();
       
       if(isset($_POST['publicchat']))
           $object->publicChat();
       
       if(isset($_POST['publichatbut']))
           $object->showpublicchatmsg();
       
       if(isset($_POST['users']))
           $object->showUsers();
       
       if(isset($_POST['logout']))
           $object->logout();
       
       if(isset($_POST['privatechatbut']))
           $object->privateChat();
       
       if(isset($_POST['displayprivatemsg']))
           $object->showPrivatemesg();
       
       if(isset($_POST['registerprivatechatter'])){           
           $object->registerPrivateChatuser();
       }
       
       if(isset($_POST['check']))
           $object->collectPrivatechats();
       
       if(isset($_POST['privatelogout']))
           $object->privateLogout();
       
       if(isset($_POST['unpaidbut']))
           $object->unpaidJobs();
       
       if(isset($_POST['paidbut']))
           $object->unexecutedpaidJobs();
       
       if(isset($_POST['clientviewbut']))
           $object->unexecutedClientjobs();
       
       if(isset($_POST['uploadbutton']))
           $object->UploadJobs();
       
       if(isset($_POST['getUnprintedjob']))
           $object->showIDtoprint();
       
       if(isset($_POST['getDownloadlink']))
           $object->showDownlink();
       
?>