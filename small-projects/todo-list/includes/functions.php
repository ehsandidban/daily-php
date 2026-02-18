<?php

function redirect($url)
{
    header('Location:' . $url . '.php');
    exit;
}