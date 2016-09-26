<?php
//to test if the passcode has all the special characters
$pass=readline("\nEnter your new password (Must contain atleast one special character (@,#,..), a number (0-9), alphabet \n");
/*Flag index: 0-default, 1-special chars, 2-alphanumeric*/	
$flag=0;
//checks if there are special characters in the password
if(preg_match("/[\@,\#,\$,\%,\^,\&,\*]/", $pass))
	{
		//checks if there are alphanumeric characters in the password
		if(preg_match('/[0-9]/',$pass)&&preg_match('/[A-Z]/i', $pass))
		{
			echo "\n Password is in the correct format\n";
		}
		else
			echo "\nNo alphanumeric characters\n";
	}	
else
echo "\nThere are no special characters in your password";		

?>