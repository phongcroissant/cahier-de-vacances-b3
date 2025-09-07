<?php

namespace Game;

class RockPaperScissors
{
    public static function play(string $player1, string $player2): array
    {
        if ($player1 === $player2) {
            return [
                'winner' => 'Draw',
                'reason' => 'same choice'
            ];
        } else if ($player1 === '🪨' && $player2 === '✂️') {
            return [
                'winner' => 'Player 1',
                'reason' => 'rock crushes scissors'
            ];
        } else if ($player1 === '🪨' && $player2 === 'lizard') {
            return [
                'winner' => 'Player 1',
                'reason' => 'rock crushes lizard'
            ];
        } else if ($player1 === '📄' && $player2 === '🪨') {
            return [
                'winner' => 'Player 1',
                'reason' => 'paper covers rock'
            ];
        } else if ($player1 === '📄' && $player2 === 'spock') {
            return [
                'winner' => 'Player 1',
                'reason' => 'paper disproves spock'
            ];
        } else if ($player1 === '✂️' && $player2 === '📄') {
            return [
                'winner' => 'Player 1',
                'reason' => 'scissors cut paper'
            ];
        } else if ($player1 === '✂️' && $player2 === 'lizard') {
            return [
                'winner' => 'Player 1',
                'reason' => 'scissors decapitates lizard'
            ];
        } else if ($player1 === 'lizard' && $player2 === 'spock') {
            return [
                'winner' => 'Player 1',
                'reason' => 'lizard poisons spock'
            ];
        } else if ($player1 === 'lizard' && $player2 === '📄') {
            return [
                'winner' => 'Player 1',
                'reason' => 'lizard eats paper'
            ];
        } else if ($player1 === 'spock' && $player2 === '✂️') {
            return [
                'winner' => 'Player 1',
                'reason' => 'spock smashes scissors'
            ];
        } else if ($player1 === 'spock' && $player2 === '🪨') {
            return [
                'winner' => 'Player 1',
                'reason' => 'spock vaporizes rock'
            ];
        } else if ($player2 === '🪨' && $player1 === '✂️') {
            return [
                'winner' => 'Player 2',
                'reason' => 'rock crushes scissors'
            ];
        }else if ($player2 === '🪨' && $player1 === '✂️') {
            return [
                'winner' => 'Player 2',
                'reason' => 'rock crushes scissors'
            ];
        }else if  ($player2 === '🪨' && $player1==='lizard'){
            return [
                'winner' => 'Player 2',
                'reason' => 'rock crushes lizard'
            ];
        }
         else if ($player2 === '📄' && $player1 === '🪨') {
            return [
                'winner' => 'Player 2',
                'reason' => 'paper covers rock'
            ];
        }else if ($player2 === '📄' && $player1 === 'spock') {
            return [
                'winner' => 'Player 2',
                'reason' => 'paper disproves spock'
            ];
        } else if  ($player2 === '✂️' && $player1==='📄'){
            return [
                'winner' => 'Player 2',
                'reason' => 'scissors cuts paper'
            ];
        }  else if  ($player2 === '✂️' && $player1==='lizard'){
            return [
                'winner' => 'Player 2',
                'reason' => 'scissors decapitates lizard'
            ];
        }else if  ($player2 === 'lizard' && $player1==='spock'){
            return [
                'winner' => 'Player 2',
                'reason' => 'lizard poisons spock'
            ];
        }else if  ($player2 === 'lizard' && $player1==='📄'){
            return [
                'winner' => 'Player 2',
                'reason' => 'lizard eats paper'
            ];
        }else if  ($player2 === 'spock' && $player1==='🪨'){
            return [
                'winner' => 'Player 2',
                'reason' => 'spock vaporizes rock'
            ];
        }else if  ($player2 === 'spock' && $player1==='✂️'){
            return [
                'winner' => 'Player 2',
                'reason' => 'spock smashes scissors'
            ];
        }
    }
}