#!/usr/bin/php
<?php
if ($argc > 1) {
	$argv[1] = trim($argv[1]);
	$array = preg_split('/\s+/', $argv[1]);
	$first = array_shift($array);
	array_push($array, $first);
	$i = 0;
	while ($array[$i]) {
		echo "$array[$i]";
		$i++;
		if ($array[$i]) {
			echo " ";
		}
	}
	echo "\n";
}
?>