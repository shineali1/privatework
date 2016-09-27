<?php
//my first program with classes in PHP
class abc
{  //member variable
	var $string2;
	function myfunc($string)
	{  //the $this is a special variable that refers to the same object 
      $this->string2 = $string;	
	}
   function myfunc2()
   {  echo"\n Value updation: ";
   	echo $this->string2;
   }
}
//The new operator is used to create new objects of the class 
$ex1= new abc;
//accessing the functions inside the object
$ex1->myfunc( "Everything has a due date" );
$ex1->myfunc2();

?>
