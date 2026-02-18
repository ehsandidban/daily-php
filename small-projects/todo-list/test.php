<?php

function generate_random_string($length = 10)
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

// echo generate_random_string();


function string_generator(
    int $length = 10,
    bool $numbers = true,
    bool $lowercase = true,
    bool $uppercase = true,
    bool $special_chars = true,
    int $number_of_strings = 5
) {
    $characters = '';
    if ($numbers)
        $characters .= '1234567890';
    if ($lowercase)
        $characters .= 'abcdefghijklmnopqrstuvwxyz';
    if ($uppercase)
        $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if ($special_chars)
        $characters .= '~!@#$%^&*()_-+=';

    $result = [];
    for ($i = 0; $i < $number_of_strings; $i++) {
        $string = '';
        while (strlen($string) < $length) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }
        $result[$i] = $string;
    }

    return $result;
}

// print_r(string_generator(30,number_of_strings:100));

// $date = jdate('d F Y',strtotime('2026-04-05'));
// echo time();

function remain_days($date)
{
    $date = strtotime($date);
    if ($date < time())
        return 0;
    return round(($date - time()) / 86400);
}

$date = '2027-02-18';
// echo remain_days($date);


echo 6 <=> 6;