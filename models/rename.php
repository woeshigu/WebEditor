<?php  

require_once('db.php');

$db = new DataBase;

$name = $_POST['name'];
$email = $_POST['email'];

$cur_name = $db->find('users', '`last_project`', "`email` = '{$email}'")[0][0];

if ($name != $cur_name) {

	$db->update('`users`', "`last_project` = '{$name}'", "`email` = '{$email}'");

	echo "OK";

} else {

	echo NULL;

}

?>