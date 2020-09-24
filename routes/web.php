<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
\Illuminate\Support\Facades\App::singleton(\App\Adapters\UserAgent\UserAgentParserInterface::class, function (){
    return new \App\Adapters\UserAgent\UserAgentParser();
});

Route::get('/', function (\App\Adapters\UserAgent\UserAgentParserInterface $userAgentParser) {
    $userAgentParser->parse($_SERVER['HTTP_USER_AGENT']);

    dd('Тип браузера: ' . $userAgentParser->getBrowserType() .
        ', тип движка браузера: ' . $userAgentParser->getBrowserEngine() .
        ', операционная система: ' . $userAgentParser->getOS() .
        ', устройство: ' . $userAgentParser->getDevice()
    );
});
