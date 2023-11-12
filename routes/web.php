<?php

use Illuminate\Support\Facades\Route;


// Co::set(['hook_flags' => OpenSwoole\Runtime::HOOK_ALL]);

// echo 'pid : ' .getmypid().PHP_EOL;
Route::get('/five', function () {
    sleep(5);
    return "sleep 5s. optimization tip : load everything to memory XD";
});

Route::get('/eight', function () {
    sleep(8);
    return "sleep 8s. optimization tip : load everything to memory XD";
});

Route::get('/normal', function () {
    $start = time();
    sleep(2);
    sleep(2);
    $delay = time() - $start;
    return 'delay s : ' . $delay;
});


Route::get('/concurrent', function () {
    $start = time();
    [$d1, $d2] = Octane::concurrently([
        fn () => sleep(2),
        fn () => sleep(2),
    ]);
    $delay = time() - $start;
    return 'delay s : ' . $delay;
});
