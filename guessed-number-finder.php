<?php

$number = 78; // number specified in mind

$low_limit = 0; // low limit of number
$high_limit = 1000; // low limit of number

function save_results(&$result, $try, $low_limit, $high_limit, $random_number)
{
    $result[$try]['low'] = $low_limit;
    $result[$try]['high'] = $high_limit;
    $result[$try]['rnd'] = $random_number;
    $result[$try]['tries'] = $try;
}
function find_guess($number, $low_limit, $high_limit)
{
    $result = [];
    $try = 0; // count of guesses
    do {
        $rnd = rand($low_limit, $high_limit);
        $try++;
        if ($rnd == $number) {
            save_results($result, $try, $low_limit, $high_limit, $rnd);
            return $result;
        } else {
            if ($rnd > $number) {
                save_results($result, $try, $low_limit, $high_limit, $rnd);

                $high_limit = $rnd - 1;
            }
            if ($rnd < $number) {
                save_results($result, $try, $low_limit, $high_limit, $rnd);
                $low_limit = $rnd + 1;
            }
        }
    }
    while ($rnd != $number);
}

print_r(find_guess(50, 0, 100));
