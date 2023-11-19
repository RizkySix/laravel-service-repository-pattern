<?php

namespace App\Http\Controllers;

use App\Mail\WebhookNotif;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class TestController extends Controller
{
    /**
     * Test ipaymu
     */
    public function test_ipaymu()
    {
        
        
        $url = 'https://sandbox.ipaymu.com/api/v2/payment';

        $options = [
            'product' => ['T-Shirt' . Str::random(4)],
            'qty' => ['2'],
            'price' => ['20000'],
            'description' => ['Baju1'],
            'returnUrl' => 'https://ipaymu.com/return',
            'notifyUrl' => 'https://1e29-203-78-114-241.ngrok-free.app/api/webhook',
            'cancelUrl' => 'https://ipaymu.com/cancel',
            'referenceId' => 'ID1234' . rand(2, 10),
            'weight' => ['1'],
            'dimension' => ['1:1:1'],
            'buyerName' => 'putu sudiayasa',
            'buyerEmail' => 'putu@mail.com',
            'buyerPhone' => '08123456789',
            'pickupArea' => '80117',
            'pickupAddress' => 'Jakarta',
          ];
    
    
        $jsonBody     = json_encode($options , JSON_UNESCAPED_SLASHES);
        $requestBody  = strtolower(hash('sha256', $jsonBody));
        
        $stringToSign = strtoupper('POST') . ':' . env('IPAYMU_VA') . ':' . $requestBody . ':' . env('IPAYMU_APIKEY');
        $signature    = hash_hmac('sha256', $stringToSign, env('IPAYMU_APIKEY'));
        $timestamp    = now()->format('YmdHis');
       
       
        $headers = [
          'Content-Type' => 'application/json',
          'signature' => $signature,
          'va' => env('IPAYMU_VA'),
          'timestamp' => $timestamp
        ];
    
        
        $response = Http::withHeaders($headers)->post($url, $options);
        
        dd($response->json());
        
    }


    /**
     * WEbhook test
     */
    public function webhook(Request $request)
    {
        $email = 'rizkyjanu2001@gmail.com';
        Mail::to($email)->send(new WebhookNotif($request->getContent()));
        return response('' , 200);
    }
}
