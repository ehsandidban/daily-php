<?php

function generate_random_string($length)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $result = '';
    while (strlen($result) < $length) {
        $rand = rand(0, strlen($characters) - 1);
        $ch = $characters[$rand];
        $result .= $ch;
    }
    return $result;
}
