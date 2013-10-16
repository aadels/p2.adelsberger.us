<?php
class practice_controller extends base_controller{
	# Our SQL command

public function test_db(){

$q = "INSERT INTO users SET 
    first_name = 'Sam', 
    last_name = 'Seaborn',
    email = 'seaborn@whitehouse.gov'";

    echo $q;
 

# Run the command
DB::instance(DB_NAME)->query($q);
}