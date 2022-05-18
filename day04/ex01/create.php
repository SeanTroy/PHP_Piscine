<?php
if ($_POST["login"] && $_POST["passwd"] && $_POST["submit"] == "OK") {
	if (file_exists("../private/passwd")) {
		$database = unserialize(file_get_contents("../private/passwd"));
		foreach ($database as $key) {
			if ($key["login"] == $_POST["login"]) {
				echo "ERROR\n";
				return;
			}
		}
	}
	$database[] = array("login" => $_POST["login"], "passwd" => hash('whirlpool', $_POST["passwd"]));
	mkdir("../private/");
	file_put_contents("../private/passwd", serialize($database));
	echo "OK\n";
} else {
	echo "ERROR\n";
	return;
}
?>
