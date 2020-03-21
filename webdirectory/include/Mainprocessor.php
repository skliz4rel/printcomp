<?php
	session_start();
	
	include("Utility.php");


	class Main{
	
		protected $name = null;
		protected $phone = null;
		protected $email = null;
		protected $address = null;
		protected $sex =null;
		protected $upload = null;
		protected $department = null;
		protected $level = null;
		protected $qualification = null;
		protected $salary = null;
		protected $bankname = null;
		protected $accounttype = null;
		protected $accountname = null;
		protected $acctnum = null;
                 protected $captcha = null;
		
		protected $externalobj = null;
		
		
		
		//variables for creating a staff payment
		protected $staffid = null;
		protected $date = null;
		protected $deposit = null;
		protected $amount = null;
		
		
		
		function __construct()
		{
			$this->externalobj = new Utility();
			$this->externalobj->doConnect();
		}
		
		
		
		
		function uploadStaff()
		{
			$this->name = $this->externalobj->stopInjection($this->externalobj->filter($_POST["staffname"]));
			$this->phone =  $this->externalobj->stopInjection($this->externalobj->filter($_POST["staffphone"]));
			$this->email =  $this->externalobj->stopInjection($this->externalobj->filter($_POST["staffmail"]));
			$this->address =  $this->externalobj->stopInjection($this->externalobj->filter($_POST["staffaddress"]));
			$this->sex =  $this->externalobj->stopInjection($this->externalobj->filter($_POST["sex"]));
			$this->upload = $_FILES["file"];
			$this->department =  $this->externalobj->stopInjection($this->externalobj->filter($_POST["department"]));
			$this->level = $this->externalobj->stopInjection($this->externalobj->filter( $_POST["level"]));
			$this->qualification =  $this->externalobj->stopInjection($this->externalobj->filter($_POST["qualification"]));
			$this->salary =  $this->externalobj->stopInjection($this->externalobj->filter($_POST["salary"]));
			$this->bankname =  $this->externalobj->stopInjection($this->externalobj->filter($_POST["bankname"]));
			$this->accounttype =  $this->externalobj->stopInjection($this->externalobj->filter($_POST["acctype"]));
			$this->accountname = $this->externalobj->stopInjection($this->externalobj->filter( $_POST["acctname"]));
			$this->acctnum = $this->externalobj->stopInjection($this->externalobj->filter($_POST["acctnum"]));
			$this->captcha = $this->externalobj->stopInjection($this->externalobj->filter($_POST["captcha"]));
			
			
			//do validate
			$content = array("Name"=>$this->name,"Phone number"=>$this->phone,"Email Address"=>$this->email,"Address"=>$this->address,"Sex"=>$this->sex,"Picture"=>$this->upload,"Department"=>$this->department,"Level"=>$this->level,"Qualification"=>$this->qualification,"Salary"=>$this->salary,"Bank name"=>$this->bankname,"Account type"=>$this->accounttype,"Account name"=>$this->accountname,"Account number"=>$this->acctnum,"Captcha"=>$this->captcha);
			
			$error = null;
			foreach($content as $key => $value){
			
				if(empty($value)){
					$error .= "<li>Enter ".$key."</li>";
				}
			}
			
			
			
			if(!is_null($error)){
			echo "Correct the following errors<br/>";
				echo "<ul>";
				echo $error;
				echo "</ul>";
			}
			else{
				//perform all the regular expression
				//validating the email address
				$value = preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $this->email);
			
				if($value == false)
				{
					$error .= "<li>Enter a correct email address (e.g. y@yahoo.com)</li>";
					
				}
				
				//validating the phone number field
				$test = preg_match("/^([0-9])*$/",$this->phone);
			
				if(!$test)
				{
					$error .= "<li>Do not enter alphabet in the phone number field \n For international numbers just enter only the country e.g. (2348031528807)  ";
					
				}
				
				$test = preg_match("/^([0-9])*$/",$this->acctnum);
				
				if(!$test){
					$error .= "<li>Enter a valid account number (only numbers are accepted in this field)</li>";
					echo $error;
					return;
				}
				
				/*
				$test = preg_match("/^[1-9]{1-3}[,]([0-9]{3})$/i",$this->salary);
				if(!$test){
					$error .= "<li>Enter a correct amount in the salary field for the staff's (e.g 50,000)";
					
				}
				*/
				
				if($_SESSION['captcha'] != $this->captcha){
					echo "You have entered a wrong captcha<br/>";
					echo "Enter the 3 black characters<br/>";
					echo "<a href='..\staff.php'>Refill staff details form</a>";
					return;
				}
			
				
				$error1 = null;
				
			$imgExtension = array('image/pjpeg','image/jpg','image/jpe');
			$type = $this->upload['type'];
			   if(!in_array($type,$imgExtension)){     
				  $error1 .= "This file is not an image (Unsupported file format) <br/>Only JPG files are supported.";
				$error1 .= "<br/>$type";
				echo $error1;
		
			  } 
			  else{
                              
                              
                              //This is so because I would use this function to submit and to update the staff details since the variables are the same
                                if(isset($_POST['staffsubmit']))
				$this->insert();
				
                                
                                if(isset($_POST['staffupdate']))
                                    $this->update();
			     }
			}
		}
		
		
		function insert()
		{
			$storefolder = "../../staff_pics/";
			
			//first move the file into the new directory
			$filename = $this->upload['name'];
			$filetype = $this->upload['type'];
			$filetempname = $this->upload['tmp_name'];
			
			$storagepath = $storefolder.basename($filename);
			
			if(is_uploaded_file($filetempname)){
			
				if(move_uploaded_file($filetempname,$storagepath))
				{
					//renaming the file in the new directory
					$newname = rand()."".basename($filename);
					rename($storagepath,$storefolder.$newname);    //renames the file in the directory
					
					$storagepath = $storefolder."".basename($newname);
					
					//if the fie is inserted into the folder then store into the database
					echo $storagepath;
					echo "<br/>";
					echo $newname;
					
					
					//now store the details into the database
					$query = "insert into staff (name,phone,email,address,sex,department,level,qualification,salary,bankname,acct_type,acct_name,acct_num,pic_path,pic_name)
		values(		
'$this->name','$this->phone','$this->email','$this->address','$this->sex','$this->department','$this->level','$this->qualification','$this->salary','$this->bankname','$this->accounttype','$this->accountname','$this->acctnum','$storagepath','$newname'
					)";
					
					$result = mysql_query($query) or die(mysql_error());
					
					$id = mysql_insert_id();
					
					if($id >0){
							//echo "<strong>Inserted into database </strong>";
$this->externalobj->protectDir("../staff.php?id=".urlencode($id)."&name=".urlencode($this->name)."&pic=".urlencode($storagepath)."&phone=".urlencode($this->phone));
							
						}
					
				}
			}
				
		}
		
		function getStaffdetails()
		{
	
			$id = $this->externalobj->stopInjection($this->externalobj->filter($_POST['id']));
			
			if(strlen($id) > 0){
			
			$query = "select * from staff where id = $id LIMIT 1;-- ";
			
			$result = mysql_query($query) or die(mysql_error());
			
			$num = mysql_num_rows($result);
			
			if($num > 0){
				
			
				$record = mysql_fetch_array($result);
				
				$picpath = $record[14];
				 $array = explode("/",$picpath ); //This is for the display of the picture
				 $path = $array[1]."/".$array[2]."/".$array[3];
				
				echo "<p>";
				echo "<img src = '$path' />";
				echo "<h3>PERSONAL DETAILS</h3>";
				echo "<label>Name :- $record[1]</label><br/>";
				echo "<label>Phone :- $record[2]</label><br/>";
				echo "<label>Email Address :- $record[3]</label><br/>";
				echo "<label>Address :- $record[4]</label><br/>";
				echo "<label>Sex :- $record[5]</label><br/>";
				echo "<label>Department :- $record[6]</label><br/>";
				echo "<label>Level :- $record[7]</label><br/>";
				echo "<label>Qualification :- $record[8]</label><br/>";
				echo "<label>Salary :- $record[9]</label><br/>";
				echo "<h3>ACCOUNT DETAILS</h3>";
				echo "<label>Bank Name :- $record[10]</label><br/>";
				echo "<label>Account Type :- $record[11]</label><br/>";
				echo "<label>Account Name :- $record[12]</label><br/>";
				echo "<label>Account Number :- $record[13]</label>";
			}
			else
				echo "This staff id does not exist";
				
			}//end of the if statement
			else
				"Enter a staff id";
		}
		
		function collecttoUpdate(){
			
			
			$id = $this->externalobj->stopInjection($this->externalobj->filter($_POST['staffid']));
			
			if(strlen($id) > 0){
			
			$query = "select * from staff where id = $id LIMIT 1;-- ";
			
			$result = mysql_query($query) or die(mysql_error());
			
			$num = mysql_num_rows($result);
			
			if($num > 0){
				//$array 
                            $record = mysql_fetch_array($result);
                            
                            $path = explode("/",$record[14]);
                            
				$array = array(
                                        'id'=>$record[0],
					'name'=>$record[1],
                                        'phone'=>$record[2],
                                        'email'=>$record[3],
                                        'address'=>$record[4],
                                        'sex'=>$record[5],
                                        'department'=>$record[6],
                                        'level'=>$record[7],
                                        'qualification'=>$record[8],
                                        'salary'=>$record[9],
                                        'bankname'=>$record[10],
                                        'acct_type'=>$record[11],
                                        'acct_name'=>$record[12],
                                        'acct_num'=>$record[13],
                                        'pic_path'=>$record[14],
                                        'path'=>$path[1]."/".$path[2]."/".$path[3]
				);
				
				echo json_encode($array);
			}
		}
	
	   }
           
           
           function update(){
               
               echo "Uploading the staff";
               //This method is going to be used to update 
               
               
               $storefolder = "../../staff_pics/";
			
			//first move the file into the new directory
			$filename = $this->upload['name'];
			$filetype = $this->upload['type'];
			$filetempname = $this->upload['tmp_name'];
			
			$storagepath = $storefolder.basename($filename);
			
			if(is_uploaded_file($filetempname)){
			
				if(move_uploaded_file($filetempname,$storagepath))
				{
					//renaming the file in the new directory
					$newname = rand()."".basename($filename);
					rename($storagepath,$storefolder.$newname);    //renames the file in the directory
					
					$storagepath = $storefolder."".basename($newname);
					
					//if the fie is inserted into the folder then store into the database
					echo $storagepath;
					echo "<br/>";
					echo $newname;
                                        
                                 $staffid = (int)$_GET['id'];
               
                        $query = "update staff set name = '$this->name',phone ='$this->phone',email='$this->email',address='$this->address',sex ='$this->sex',department='$this->department',level='$this->level',qualification='$this->qualification',salary='$this->salary',bankname='$this->bankname',acct_type='$this->accounttype',acct_name='$this->accountname',acct_num='$this->acctnum',pic_path='$storagepath',pic_name='$newname' where id = $staffid;--";
                        $result = mysql_query($query) or die(mysql_error());

                        $id = mysql_affected_rows();

                        if($id > 0){
                                //This shows that the table was successfully updated
                                echo "updated";
                                
                              
                        }
                     }
                                
               }
      }
	  
	  function payStaff()
	  {
              //initialization of the variables
              $this->staffid = $this->externalobj->stopInjection($this->externalobj->filter($_POST['staffid']));
               $this->date = $this->externalobj->stopInjection($this->externalobj->filter($_POST['date']));
                $this->deposit = $this->externalobj->stopInjection($this->externalobj->filter($_POST['transid']));
		$this->amount = $this->externalobj->stopInjection($this->externalobj->filter($_POST['amount']));
                
                
                //do the validation of the program
                $content = array("Staff id"=>$this->staffid,"Payment Date"=>$this->date,"Deposit/Transaction ID"=>$this->deposit,"Amount"=>$this->amount);
                
                $error = null;
                
                foreach($content as $key => $value){
                        if(empty($value)){
                            $error .= "<li class='ui-state-error ui-corner-all'>Enter ".$key."</li>";
                            $error.="<li></li>";
                        }
                }
                
                if(!is_null($error)){
                    echo "<ul>";
                    echo $error;
                    echo "</ul>";
                    
                    return;
                }
                
                $error1 = null;
                $test = preg_match("/^([0-9])*$/",$this->staffid);
                if(!$test){
                    $error1 = "<li>Enter only numbers for the staff id</li>";
                   
                }
                  $test = preg_match("/^([0-9])*$/",$this->amount);
                if(!$test){
                    $error1 = "<li>Enter only numbers in the salary field</li>";
                    echo $error1;
                }
                /*
                $test = preg_match("/^[0-9]{2}-[0-9]{2}-[1-9]{4}$/",$this->date);
                if(!$test)  {
                    $error1 .= "<li>Enter a correct date format (02/01/2010)</li>";
                    
                    echo "<ul>";
                    echo $error1;
                    echo "</ul>";
                }
                 * 
                 */
                else{
                   
                   
                    $query = "select id from staff where id = $this->staffid;--";
                    
                    $result = mysql_query($query);
                    
                    $record = mysql_fetch_array($result);
                    
                    $id = $record[0];
                    
                    if($id >0){
                    $query = "insert into payment (staffid,paymentdate,transID,amount) values($this->staffid,'$this->date','$this->deposit','$this->amount');--";
                    $result = mysql_query($query) or die(mysql_error());
                    
                    $id = mysql_insert_id();
                    
                    if($id >0){
                        echo "success";
                      }
                    
                    }
                    else
                         echo "Wrong staff id <br/>This staff id does not exist!!";
                    
                }
	  }
          
          function showHistory(){
                $id = (int)$this->externalobj->stopInjection($this->externalobj->filter($_POST['id']));
                $test = preg_match("/^([0-9])*$/",$id);
                $value = "<table border=1 class=\"fakewindowcontain\">";
                $value .="<th>Payment ID</th><th>Payment Date</th><th>Transaction ID</th><th>Amount</th>";                        
                if(!$test)
                {
                    echo "The staff id must be a number";
                }else{
                    
                    $query = "select * from payment where staffid = $id;--";
                    
                    $result = mysql_query($query) or die(mysql_error());
                                        
                    $id = mysql_num_rows($result);
                    
                    if($id == 0)
                    {
                        echo "No payment history for this staff id";
                    }
                    else{
                        while($record = mysql_fetch_array($result)){
                            $value .="<tr><td>$record[0]</td><td>$record[2]</td><td>$record[3]</td><td>$record[4]</td></tr>";                        
                        }
                        
                        $value .= "</table>";
                         echo $value;
                    }
                }
               
          }
  }

	$object = new Main();
	
	
	if(isset($_POST['staffsubmit']))
	{
		$object->uploadStaff();
	}
	
	if(isset($_POST['viewbut']))
	{
		$object->getStaffdetails();
	}
	
	if(isset($_POST["collect4update"])){
		$object->collecttoUpdate();
	}
        
        if(isset($_POST['staffupdate']))
            $object->uploadStaff();
			
	if(isset($_REQUEST['paybut'])){
		$object->payStaff();
	}
        
        if(isset($_POST['history']))
            $object->showHistory();
?>