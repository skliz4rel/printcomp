<?php
        session_start();
	include("Utility.php");
	
	class Login{
	
		protected $username = null;
		protected $password = null;
		protected $admintype = null;
		protected $externalobj = null;
	
		function __construct(){
			
			
			//initializing the variables
			$this->username = $_POST['username'];
			$this->password = $_POST['password'];
			$this->admintype = $_POST['admintype'];
			
			$this->externalobj = new Utility(); //declaring the object of the class
                        $this->externalobj->doConnect();
		}
	
	
		function validateLogin(){
		
			$this->username = $this->externalobj->filter($this->username); 
			$this->username = $this->externalobj->stopInjection($this->username);
			
			$this->password = $this->externalobj->filter($this->password); 
			$this->password = $this->externalobj->stopInjection($this->password);
		
			//declaring the variables 
			$content =array("Username"=>$this->username,"Password"=>$this->password,"Admin Type"=>$this->admintype);
			
			$error = null;
			
				
			foreach($content as $key =>$value){
			
				if(empty($value)){
					$error .= "<li>Enter ".$key."</li>";
				}
			
			}
			
			if(!is_null($error)){
				echo "Correct the following errors committed\n";
				echo "<ul>";
				echo $error;
				echo "</ul>";
			}
			else{
					//
                            
                                        $this->login();
			}
		}
		
		function login(){
			//login the user after the application passest the validation test
			$this->password = $this->externalobj->doEncryption($this->password);
			
                    
			echo $this->username;
			echo "<br/>";
			echo $this->password;
                        
                        $query = "select staffid from login where username = '$this->username' and password = '$this->password' and admintype='$this->admintype';--";
                        
                        $result = mysql_query($query);
                        
                        $record = mysql_fetch_array($result);
                        
                        $staffid = $record[0];
                        
                        if($staffid >0){
                            $_SESSION['iden1028username'] = $this->username;
                            $_SESSION['iden1028password'] = $this->password;
                            $_SESSION['iden1028staffid'] = $staffid;
                            $_SESSION['iden1028admintype'] = $this->admintype;
                            
                            $this->externalobj->protectDir("../home.php");
                        }
                        else{
                            
                            $this->externalobj->protectDir("../index.php?id=error");
                        }
		}
	}
	
	$object = new Login();
	
	if(isset($_POST['submit'])){
		$object->validateLogin();
		
	}
		
		
?>