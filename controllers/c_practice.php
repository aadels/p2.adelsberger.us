<?php
class practice_controller extends base_controller{
	
	public function test1(){
		
	require(APP_PATH. '/libraries/image.php');
	//echo DOC_ROOT."<br>";

	$imageObj = new Image('http://web.mit.edu/aadels/Public/appeal_images/_DSC0368.jpg/311,466')

	$imageObj ->resize(155,233);

	$imageObj-> display();

}
public function test2(){
	echo Time::now();

}

}
