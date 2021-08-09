<?php

namespace Devfaysal\Muthofun;

use Illuminate\Support\Facades\Http;

class Muthofun
{

    protected $config;

    public function __construct()
    {
        if(config('muthofun.username') == null || config('muthofun.password') == null){
            throw new \Exception('Muthofun credentials are not set in environment');
        }
        $this->config = config('muthofun');
    }


    public function send($numbers, $message)
    {

        if(is_array($numbers)){
            $numbers = implode(',',$numbers);
        }

        $username = $this->config['username'];
	    $password = $this->config['password'];

		// make sure passed string is url encoded
        $message = rawurlencode($message);
		
        $url = "http://developer.muthofun.com/sms.php?username=$username&password=$password&mobiles=$numbers&sms=$message&unicode=1";
        $response = Http::get($url);
        
        return $response->body();
    }

}
