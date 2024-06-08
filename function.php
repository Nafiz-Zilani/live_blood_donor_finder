<?php

function getStatusMassage($statusCode = 0)
{
    $status = [
        '0' => '',
        '1' => 'Duplicate Email Address',
        '2' => 'Username or Password Empty',
        '3' => 'User successfully created',
        '4' => 'User name & password did not match',
        '5' => 'User name does not exit'
    ];

    return $status[$statusCode];
}