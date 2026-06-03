<?php

use App\Events\ModelChanged;
use App\Listeners\SendModelChangeNotification;

protected $listen = [
    ModelChanged::class => [
        SendModelChangeNotification::class,
    ],
];
