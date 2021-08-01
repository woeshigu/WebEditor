<?php  

require_once('db.php');

$db = new DataBase;

$password = $_POST['password'];
$email = $_POST['email'];
$content = $_POST['content'];

$username = $db->find('users', '`username`', "`email` = '{$email}' AND `password` = '{$password}'")[0][0];
$l_project = $db->find('users', '`last_project`', "`email` = '{$email}'")[0][0];


if ($l_project == NULL) {

	$l_project = 'Unnamed-project';

	$data = [
		['`project_name`', $l_project],
		['`content`', $content],
		['`user_id`', $db->find('users', 'id', "`email` = '{$email}'")[0][0]]
	];

	$db->insert_rec('projects', $data);
	$db->update('users', "`last_project` = '{$l_project}'", "`email` = '{$email}'");

}

if ($username) {

	$res = [
		'username' => $username,
		'last_project' => $l_project
	];

	echo json_encode($res);

} else {

	echo '';

}

?>