#!/usr/bin/php
<?php
$string = trim($argv[1]);
$string = preg_replace('/\s+/', ' ', $string);
if ($string) {
	echo "$string\n";
}
?>