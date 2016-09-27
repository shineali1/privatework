<?php
//Your practice code
 class userdata{
     var $firstname;
     var $secondname;
     
     function getname($string1,$string2)
     {
         $this->firstname=$string1;
         $this->secondname=$string2;
     }
 
     function dispname()
     {   echo "\n The name is: ";
         echo $this->firstname." ".$this->secondname."\n";
     }
     function hello()
     {
        echo "\n Hello!! This function just does this..nothing else but hello.. what a dumb function eh??! \n";
     }
 }

$ramu=new userdata;
$ramu->getname("Ramu","Srinivas");
$ramu->dispname();
$ramu->hello();
?>