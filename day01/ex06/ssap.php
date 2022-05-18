#!/usr/bin/php
<?php
$array = [];
for ($i = 1; $i < $argc; $i++) {
	$argv[$i] = trim($argv[$i]);
	$argument = preg_split('/\s+/', $argv[$i]);
	$array = array_merge($array, $argument);
}
sort($array);
for ($i = 0; $array[$i]; $i++) {
	echo "$array[$i]\n";
}
?>