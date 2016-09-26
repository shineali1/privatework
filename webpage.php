<?php
$url=readline("\nEnter the URL in the format http://www.url.com \n");
$webpage=file_get_contents($url);
if(preg_match('/^(\w+):\/\/([\w\-\.]+)/',$url))
{
  preg_match_all('/((\w+)\.png)|((\w+)\.gif)|((\w+)\.jpeg)|((\w+)\.jpg)/',$webpage,$array);
  print_r($array);
}
else
echo "\n Please enter the URL in the correct format";
?>