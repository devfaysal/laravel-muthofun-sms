<?php

namespace Devfaysal\Muthofun;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class Muthofun
{

    protected $headers = [];
    protected $baseUrl = 'https://sysadmin.muthobarta.com/api/v1';

    public function __construct()
    {
        if (config('muthofun.apiKey') == null) {
            throw new \Exception('Muthofun api key is not set');
        }
        $this->headers['Authorization'] = config('muthofun.apiKey');
    }

    public function send($numbers, $message)
    {
        if (is_array($numbers)) {
            $numbers = implode(',', $numbers);
        }

        $url = $this->baseUrl . '/send-sms';

        $data = [
            'receiver' => $numbers,
            'message' => $message,
            'remove_duplicate' => true,
        ];

        $response = Http::withHeaders($this->headers)->post($url, $data);
        return $response->status();
    }

    public function deliveryReport()
    {
        $url = $this->baseUrl . '/delivery-report';

        $response = Http::withHeaders($this->headers)->get($url);
        return $response->json()['data'];
    }

    public function deliveryReportToday()
    {
        return $this->deliveryReportByDate(Carbon::now(), Carbon::now());
    }

    public function deliveryReportByDate(Carbon $from, Carbon $to)
    {
        $url = $this->baseUrl . '/delivery-report?from_date=' . $from->format('Y-m-d') . '&to_date=' . $to->format('Y-m-d');

        $response = Http::withHeaders($this->headers)->get($url);
        return $response->json()['data'];
    }

    public function accountBalance($details = false)
    {
        $url = $this->baseUrl . '/get-balance';

        $response = Http::withHeaders($this->headers)->get($url);
        if($details){
            return $response->json();
        }
        return $response->json()['balance'];
    }
}
