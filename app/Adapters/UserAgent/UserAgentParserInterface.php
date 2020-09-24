<?php


namespace App\Adapters\UserAgent;


interface UserAgentParserInterface
{
    public function parse(string $userAgent);

    public function getBrowserType();
    public function getBrowserEngine();
    public function getOS();
    public function getDevice();
}
