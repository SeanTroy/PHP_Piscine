#!/usr/bin/php
<?php
$input = fopen("php://stdin", "r");
while ($input && !feof($input))
{
	echo "Enter a number: ";
	$number = fgets($input);
	if ($number)
	{
		$number = str_replace("\n", "", $number);
		if (is_numeric($number))
		{
			if ($number % 2 == 0)
				echo "The number " . $number . " is even\n";
			else
				echo "The number " . $number . " is odd\n";
		}
		else
			echo "'$number' is not a number\n";
	}
}
echo "\n";
fclose($input);
?>