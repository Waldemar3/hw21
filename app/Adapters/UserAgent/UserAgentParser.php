<?php


namespace App\Adapters\UserAgent;


final class UserAgentParser implements UserAgentParserInterface
{

    private $accessKey = '79aa5fbd60da63dbe158bc4a3710bee6';
    private $response;

    public function parse(string $userAgent)
    {
        $this->response = \Illuminate\Support\Facades\Http::get('http://api.userstack.com/api/detect?access_key='.$this->accessKey.'&ua='.$userAgent);
    }

    public function getBrowserType()
    {
        return $this->response->json()['browser']['name'];
    }

    public function getBrowserEngine()
    {
        return $this->response->json()['browser']['engine'];
    }

    public function getOS()
    {
        return $this->response->json()['os']['name'];
    }

    public function getDevice()
    {
        return $this->response->json()['device']['type'];
    }

}
