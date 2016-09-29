<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*Program to print a class hallticket using OOPS.
 * Class within a class.
 */   
class Student{
    public $rollno;
    public $name;     
    public function __construct($rollno,$name)
    {
        $this->rollno=$rollno;
        $this->name=$name;
        
    }
}
class Hallticket
{  public $subject;
   public function __construct(Student $shine,$subject)
{
   $this->shine=$shine;
   $this->subject=$subject;
}

}
$shine=new Student(1234,"Shine");
$phy= new Hallticket($shine,"Physics");
echo $phy->shine->name;        
?>