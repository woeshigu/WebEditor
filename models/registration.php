<?php  

require_once('db.php');

$db = new DataBase;

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$sql = [
	['`username`', $username],
	['`password`', $password],
	['`email`', $email]
];

if (count($db->find('users', '`username`', "`email` = '{$email}'")) == 0) {
	$db->insert_rec('users', $sql);
	echo $username;
} else {
	echo '';
}

?>