<?php

function redirect($url)
{
    header('Location:' . $url . '.php');
    exit;
}

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

function get_remain_days($date)
{
    $target = strtotime($date);
    $remain = $target - time();
    $days = round($remain / 86400);
    if($days > 0){
        return "$days روز باقی مانده";
    }
    return '';
}