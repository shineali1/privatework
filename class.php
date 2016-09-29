<?php
/*Assignment:
Create a menu-based command line PHP program to add new intern and list all interns. 
Details are as follows:

    An Intern is an Employee, and an Employee is a Person


    A Person should have Name, Age, and Gender


    An Employee should have Designation, Year of experience, and Employment ID


    An Intern should have University name, and Year of pass out.

 * // Input Menu:
Menu
    Add Intern
    List Interns


Please enter your choice: 1
*/
class person{
    private $name;
    private $age;
    private $gender;
    public function __construct($name,$age,$gender)
    {
      $this->age=$age;
      $this->name=$name;
      $this->gender=$gender;
    }
}
class employee extends person{
    private $designation;
    private $yearsofexp;
    private $empid;
    public function __construct($designation,$yearsofexp,$empid)
    { 
      $this->designation=$designation;
      $this->yearsofexp=$yearsofexp;
      $this->empid=$empid;
    }
}
class intern extends employee{
   private $uniname;
   private $yearpass;
   public function __construct($name,$age,$gender,$designation,$yearsofexp,$empid,
            $uniname, $yearpass)
    {
      $this->age=$age;
      $this->name=$name;
      $this->gender=$gender;
      $this->designation=$designation;
      $this->yearsofexp=$yearsofexp;
      $this->empid=$empid;
      $this->uniname=$uniname;
      $this->yearpass=$yearpass;
    }
    public function disp()
    {
        echo "Name: ".$this->name."\n";
        echo "Age: ".$this->age."\n"; 
        echo "Gender: ".$this->gender."\n";
        echo "Designation: ".$this->designation."\n";
        echo "Years of experience: ".$this->yearsofexp."\n";
        echo "Employee ID: ".$this->empid."\n";
        echo "University: ".$this->uniname."\n";
        echo "Year of passing: ".$this->yearpass."\n";
    }
}
$i=0;
$db=array();
menu:
echo "\n Menu\n1.Add interns\n2.Display Interns\nEnter your choice please.\n";
$opt=readline();
if($opt==1)
{
    echo "\n Adding interns:\n";
    echo "Enter the name of the employee:\n";
    $name1=readline();
    age:
    echo "Enter the age in years:\n";
    $age1=readline();
    if(is_numeric($age1)&&$age1>0)
    { 
     correct2:echo "Enter the gender (M/F):\n";
     $gender1=readline();
     if($gender1=='M'|$gender1=='F')
      {echo "Enter the Designation of the employee:\n";
       $designation1=readline();
       echo "Enter the years of experience:\n";
       $yearsofexp1=readline();
       echo "Enter the University:\n";
       $uniname1=readline();
       echo "Enter the employee ID:\n";
       $empid1=readline();
       echo "Enter the year of passing:\n";
       $yearpass1=readline();
      }

    else
     {
         echo "\nEnter in correct format\n";
         goto correct2;
     }
    $intern=new intern($name1,$age1,$gender1,$designation1,$yearsofexp1,$empid1,
            $uniname1, $yearpass1);
    $db[$i]=$intern;
    $i++;
    goto menu;
  }
  else
    //Handling the edge case for age. 
    {echo "\n Enter the age in the correct format (greater than zero and in numeric form)\n";
     goto age;
     }
}
else 
    if($opt==2)
    {   foreach($db as $j)
         {//echo "$j \n";
          $j->disp();
         }        
    }

?>