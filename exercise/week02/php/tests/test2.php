<?php
$signalStream = file_get_contents(__DIR__ . "/shifts/1.txt");
$val = [];

for ($i = 0; $i < strlen($signalStream); $i++) {
    $c = $signalStream[$i];

    if (strpos($signalStream, "🧝")) {
        $j = ($c === ')') ? 3 : -2;
        $val[] = [$c, $j];
    } else if (strpos($signalStream, "🧝") === false) {
        $val[] = [$c, ($c === '(') ? 1 : -1];
    }  
}

$result = 0;
var_dump($val);
foreach ($val as $kp) {
    $result += $kp[1];
}
 echo $result;