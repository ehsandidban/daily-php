<?php

$user_ip = '5.123.47.101';

function is_iran_ip($ip_address)
{
    $iran_ip_prefixes = ['2', '5', '81', '95', '112', '185'];
    foreach ($iran_ip_prefixes as $ip) {
        if (strpos($ip_address, $ip . '.') === 0)
            return "This ip address ($ip_address) is from IRAN";
    }
    return "This ip address ($ip_address) is not from IRAN";
}

echo (is_iran_ip($user_ip));