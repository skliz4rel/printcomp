<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$string = simplexml_load_file("pricelist.xml");

foreach($string as $key => $value)
{
    echo "This key => $key  contains  ".$value."<br/>";
   
   
    
}

 echo similar_text("Jide Akindejoye", "Jide Akindepohg");
?>
