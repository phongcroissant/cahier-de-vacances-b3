<?php


test('should move on given text instructions', function () {
    $horizontal=0;
    $depth=0;
    $instructions=file(__DIR__ .'/submarine.txt', FILE_IGNORE_NEW_LINES);

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
    expect($depth*$horizontal)->toBe(1690020, 'it is universal answer');
});
