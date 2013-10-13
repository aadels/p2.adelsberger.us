<?php

class MyClass{
	public $prop1 = "I'm a class property!!"; 

	public function setProperty($newval){
		$this->prop1 = $newval;
	}

	public function getProperty(){
		return $this->prop1 . "<br />";
	}
}
$obj = new MyClass;


echo $obj->getProperty(); //get the property value
$obj->setProperty("I'm a NEW property Value!"); //set a new value
echo $obj->getProperty(); //Read out to show change

?>