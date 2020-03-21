<?php

	include("resource/log.php");
	
	//THis is a utility class for the prohect optimization
	class Utility
	{
            private $connect = null;
		
		public function filter($value){
		//This function is going to filter content that are passed into variabloes
                   $banlist = ARRAY (
                    "insert ", "select ", "update ", "delete ", "distinct", "having", "truncate", "replace",
                    "handler", "like", " as ", " or ", "procedure", "limit", "order by", "group by", "asc", "desc"," = ",
                       " * ","1=1","=",";--","--","union","drop","<=",">=","!="," and "," where "," from "
                  );    
                   
                   
                   
             for($i =0; $i<count($banlist); $i++){
                 
                 $value = (str_ireplace($banlist[$i],"", $value));
             }
                 		
               	 $value = trim($value); 
                 return $value;
		}
		
		
		public function stopInjection($value){
                    
                    $value = strip_tags($value);
                    
                    if(get_magic_quotes_gpc()) // prevents duplicate backslashes
                    {
                      $value = stripslashes($value);
                    }
                    if (phpversion() >= "4.3.0") //if using new version of PHP and mysql_real_escape_string
                    {
                    $value = mysql_real_escape_string(htmlentities($value, ENT_QUOTES));
                    }
                    else //for the old version of PHP and mysql_escape_string
                    {
                        $value = mysql_escape_string(htmlentities($value, ENT_QUOTES));
                    }
                    return $value; //return the secure string
           
		}
                
                public function regulateDetails($value)
                {
                    $reg = "/^[a-zA-Z0-9]+$/";
                    $test = preg_match($reg,$value);
                    
                    if($test)
                          echo true;
                    else
                        echo  false;
                }
		
		public function doEncryption($value){
                    $value = crypt(hash("haval256,5",sha1(md5($value))),"xx");
                    
                    return $value;
		}
		
		public function protectDir($location){
		
			header("Location: $location");
			exit;
		}
		
		public function doConnect(){
			$object = new Log();
			
			$this->connect = mysql_connect($object->server,$object->username,$object->password);
			
			$select = mysql_select_db("printcomp",$this->connect);
			
			if(!$select)
				echo "There is a problem connecting to the database";
		}
		
		public function registerchatUser(){
                    //first check if the user is already registered to use the chatroom in case of an unexpected termination
                    $staffid =  $_SESSION['iden1028staffid']; $username = $_SESSION['iden1028username'];
                    $query = "select staff_id from chatusers where staff_id = $staffid;--";
                    $result = mysql_query($query);
                    $num = mysql_num_rows($result);

                    if($num <= 0){

                    $query = "insert into chatusers (staff_id,username) values ($staffid,'$username');--";

                    $result = mysql_query($query);

                    $id = mysql_insert_id();
                    }
		}
                
                public function closeConnect(){                    
                    mysql_close($this->connect);
                }
                
                public function securityCheck(){
                    //This function is going to do a security check on each page to prevent illegal ussage
                    if(isset($_SESSION['iden1028username']) ==false or isset($_SESSION['iden1028password']) == false or isset($_SESSION['iden1028staffid']) == false or isset($_SESSION['iden1028admintype']) == false){
                        
                      $this->protectDir("../index.php");
                    }
                    
                }
                
                
	}	

?>