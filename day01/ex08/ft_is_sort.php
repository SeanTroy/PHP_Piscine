<?php
function ft_is_sort($tab) {
	$original = $tab;
	if ($tab) {
		sort($tab);
	}
	if ($original === $tab) {
		return TRUE;
	} else {
		return (FALSE);
	}
}
?>