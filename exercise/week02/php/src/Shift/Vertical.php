<?php

namespace Shift;

class Vertical
{
    public static function whichFloor(string $signalStream): int
    {
        $val = [];

        if (strpos($signalStream, "🧝")) {
        $signalStream=str_replace('🧝','',$signalStream);
        for ($i = 0; $i < strlen($signalStream); $i++) {
            $c = $signalStream[$i];
            
            $j = ($c === ')') ? 3 : -2;
            $val[] = [$c, $j];
        }
        } else {
            for ($i = 0; $i < strlen($signalStream); $i++) {
                    $c = $signalStream[$i];
                    $val[] = [$c, ($c === '(') ? 1 : -1];
                }
        }
        $result = 0;
        foreach ($val as $kp) {
            $result += $kp[1];
        }

        return $result;
    }
}