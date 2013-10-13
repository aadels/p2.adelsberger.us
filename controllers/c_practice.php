<?php
class practice_controller extends base_controller{
	
	public function test1(){
		
	require(APP_PATH. '/libraries/image.php');
	//echo DOC_ROOT."<br>";

	$imageObj = new Image('http://placekitten.com/1000/1000');

	$imageObj ->resize(400,400);

	$imageObj-> display();

}
public function test2(){
	Time::now();

}

}
