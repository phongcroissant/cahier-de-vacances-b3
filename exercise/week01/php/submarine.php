<?php
$horizontal=0;
$depth=0;
$instructions=file('./tests/submarine.txt', FILE_IGNORE_NEW_LINES);

foreach ($instructions as $instruction) {
    if (str_contains($instruction,'forward')) {
        $horizontal=$horizontal+intval(substr($instruction,-1));
    }
    if (str_contains($instruction,'down')) {
        $depth=$depth+intval(substr($instruction,-1));
    }
    if (str_contains($instruction,'up')) {
        $depth=$depth-intval(substr($instruction,-1));
    }
}
echo $horizontal.PHP_EOL;
echo $depth.PHP_EOL;
echo $horizontal*$depth;