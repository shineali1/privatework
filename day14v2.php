<?php
//to test if the passcode has all the special characters
//functions to hide the terms while entering the password
function hide_term() {
    if (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN') {
        echo "\033[30;40m";
        flush();
    }
}
//functions to restore the cursor after entering the password
function restore_term() {
    if (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN') {
        echo "\033[0m";
        flush();
    }
}
$username= readline("\nEnter username\n");
if(preg_match("/^(\w+)\@(\w+)\.com$/", $username))
{
	echo "\nEnter your new password (Must contain atleast one special character (@,#,..), a number (0-9), alphabet \n";
hide_term();
$pass=readline();
restore_term();
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
}
else
echo("\nPlease enter username in the correct format (username@mail.com)\n");
?>