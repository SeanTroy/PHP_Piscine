<?php
function isUserInDatabase($database) {
	$i=0;
	while ($database[$i]) {
		if ($database[$i]["login"] == $_POST["login"] && $database[$i]["passwd"] == hash('whirlpool', $_POST["oldpw"])) {
			return ($i);
		}
		$i++;
	}
	return (-1);
}
if ($_POST["login"] && $_POST["oldpw"] && $_POST["newpw"] && $_POST["submit"] == "OK") {
	if (file_get_contents("../private/passwd") !== FALSE) {
		$database = unserialize(file_get_contents("../private/passwd"));
		$position = isUserInDatabase($database);
		if ($position != -1) {
			$database[$position]["passwd"] = hash('whirlpool', $_POST["newpw"]);
			file_put_contents("../private/passwd", serialize($database));
			echo "OK\n";
			return;
		} else {
			echo "ERROR\n";
			return;
		}
	}
} else {
	echo "ERROR\n";
	return;
}
?>
