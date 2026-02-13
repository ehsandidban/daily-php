<?php

$user_ip = '5.220.4.76';
function is_has_prefix($ip_address, $prefix)
{

    if (strpos($ip_address, $prefix . '.') === 0)
        return "This ip address <strong><mark>($ip_address)</mark></strong> has prefix <strong><mark>$prefix</mark></strong>";
    return "This ip address <strong><mark>($ip_address)</mark></strong> has not the prefix <strong><mark>$prefix</mark></strong>";
}

echo (is_has_prefix($user_ip, '5'));