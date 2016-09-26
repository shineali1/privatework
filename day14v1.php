<?php
/* I am working on Perl compatible regular expressions today*/
$string='/^password$/';
$subject=readline("Enter your password\n");
$flag=0;
//password match
if(preg_match($string, $subject))
	{echo "password match\n";
     $flag=1;
    }
else
	echo "Access Denied!\n";

if($flag==1)
{   $flag=0;
	echo "Welcome to the portal\n";
	$mystring="Day 14 version 1, Copyright 2015";
	echo "Your current string is: $mystring\n";
    $string2=readline("Enter the new string\n");
    //covering the preg_replace function.  
    $mystring=preg_replace("(2015)", $string2 , $mystring);
    echo "The new string is: $mystring \n ";
}
?>