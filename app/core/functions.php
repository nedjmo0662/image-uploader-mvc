<?php

function pre($var)
{
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

function esc($str)
{
    return addslashes($str);
}


function get_random_string_max($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $length = rand(4,$length);
    $randomString = '';
    for($i=0; $i<$length; $i++)
    {
        $random = rand(0,$charactersLength-1);
        $randomString .= $characters[$random];
    }
    return $randomString;
}