<?php

include './range.php';

try {
	$range = json_decode($argv[1], true);
} catch (\Exception $e) {
    $range = [1, 4, 3, 6, 9, 0, 2, 8];
}

$ranger = new Ranger($range);

print $ranger->generate() . PHP_EOL;

?>