<?php
function auth($login, $passwd) {
	$database = unserialize(file_get_contents("../private/passwd"));
	$i=0;
	while ($database[$i]) {
		if ($database[$i]["login"] == $login && $database[$i]["passwd"] == hash('whirlpool', $passwd)) {
			return (TRUE);
		}
		$i++;
	}
	return (FALSE);
}
?>