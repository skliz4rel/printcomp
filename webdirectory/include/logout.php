<?php
	session_start();
        ob_start();
        include("Utility.php");      
                
	class Logout{
            
            protected $externalobj = null;
	
		function __construct(){
                    
                    $this->externalobj = new Utility();
	
                unset($_SESSION['iden1028username']);  unset($_SESSION['iden1028password']);  unset($_SESSION['iden1028staffid']);  
                
                unset($_SESSION['iden1028admintype']);
                
                 $_SESSION = array();

                session_destroy();


                if(!isset($_SESSION['iden1028username']) and !isset($_SESSION['iden1028password']) and !isset($_SESSION['iden1028staffid']) and !isset($_SESSION['iden1028admintype'])){
                    //close all the database connections
                    $this->externalobj->closeConnect();
                     $this->externalobj->protectDir("../index.php");
                        
                }

	     }
		
	}
    
	$object = new Logout();
?>


<?php
    ob_end_flush();
?>