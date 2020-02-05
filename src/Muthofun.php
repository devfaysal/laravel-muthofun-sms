<?php

namespace Devfaysal\Muthofun;


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
		
		$url = "http://clients.muthofun.com:8901/esmsgw/sendsms.jsp?user=$username&password=$password&mobiles=$numbers&sms=$message&unicode=1";			

		$c = curl_init(); 
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($c, CURLOPT_URL, $url); 
        $response = curl_exec($c); 
        
        return $response;
    }

}