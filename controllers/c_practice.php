<?php
class practice_controller extends base_controller{
//public function test_db(){
# Our SQL command
$q = "INSERT INTO users SET 
    first_name = 'Sam', 
    last_name = 'Seaborn',
    email = 'seaborn@whitehouse.gov'";

# Run the command
echo ($q);

}
?>