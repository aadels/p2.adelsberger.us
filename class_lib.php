<?php

class MyClass{
	public $prop1 = "I'm a class property!!"; 

	public function __construct(){

		echo 'The class "', __CLASS__,'" was initiated!<br ?>';
	}
	
	public function __destruct(){

		echo 'The class "', __CLASS__.'" was destroyed.<br />';
	}

	public function __toString(){

		echo "using the toString method: ";
		return $this->getProperty();
	}
	
	public function setProperty($newval){
		
		$this->prop1 = $newval;
	}
	
	public function getProperty(){

		return $this->prop1 . "<br />";
	}
}

//Create new object
$obj = new MyClass;

//output the object as a string
echo $obj;

//Destroy the object
unset($obj);

//Output a message at the end of the file
echo "End of file. <br />";
?>