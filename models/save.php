<?php

require_once('db.php');

$db = new DataBase;

$p_name = $_POST['project_name'];
$content = $_POST['content'];
$username = $_POST['username'];
$email = $_POST['email'];

if ($username != '') {

	$last = $db->find('users', '`last_project`', "`email` = '{$email}'")[0][0];

	echo $last;

	if ($last == NULL) {

		$data = [
			['`project_name`', $p_name],
			['`content`', $content],
			['`user_id`', $db->find('users', 'id', "`email` = '{$email}'")[0][0]]
		];

		$db->insert_rec('projects', $data);
		$db->update('users', "`last_project` = '{$p_name}'", "`email` = '{$email}'");

		echo "created!";

	} else {

		$uid = $db->find("users", "id", "`email` = '{$email}'")[0][0];

		$db->update('projects', "`content` = '{$content}'", "`user_id` = '{$uid}'");

		echo "updated!";

	}


}

?>