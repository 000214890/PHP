<?php

function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

function Ctime ()
{
    date_default_timezone_set('US/Eastern');
    $CurTime = date("H:i:s");
    
    
 return $CurTime;
    
}

function CDate()
{
     date_default_timezone_set('US/Eastern');
    $CDate = date("m-d-Y");
    return $CDate;
    
}