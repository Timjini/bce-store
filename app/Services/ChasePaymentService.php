<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ChasePaymentService
{
    private $client;
    private $apiKey;
    private $merchantId;
    private $baseUrl;
    
    public function __construct()
    {
        $this->apiKey = config('services.chase.api_key');
        $this->merchantId = config('services.chase.merchant_id');
        $this->baseUrl = config('services.chase.sandbox') 
            ? 'https://api.demo.chase.com' 
            : 'https://api.chase.com';
            
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->apiKey,
            ],
            'timeout' => 30,
        ]);
    }
    
    public function createPaymentToken($cardData)
    {
        try {
            $response = $this->client->post('/payments/v1/tokens', [
                'json' => [
                    'card' => [
                        'number' => $cardData['card_number'],
                        'exp_month' => $cardData['exp_month'],
                        'exp_year' => $cardData['exp_year'],
                        'cvc' => $cardData['cvc'],
                    ]
                ]
            ]);
            
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            Log::error('Chase token creation failed: ' . $e->getMessage());
            throw new \Exception('Payment token creation failed');
        }
    }
    
    public function processPayment($paymentData)
    {
        try {
            $response = $this->client->post('/payments/v1/charges', [
                'json' => [
                    'amount' => $paymentData['amount'],
                    'currency' => 'USD',
                    'source' => $paymentData['payment_token'],
                    'description' => 'Order #' . $paymentData['order_id'],
                    'metadata' => [
                        'order_id' => $paymentData['order_id'],
                        'customer_email' => $paymentData['customer_email'],
                    ],
                    'capture' => true,
                ]
            ]);
            
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            Log::error('Chase payment failed: ' . $e->getMessage());
            throw new \Exception('Payment processing failed');
        }
    }
    
    public function refundPayment($chargeId, $amount = null)
    {
        try {
            $data = ['charge' => $chargeId];
            if ($amount) {
                $data['amount'] = $amount;
            }
            
            $response = $this->client->post('/payments/v1/refunds', [
                'json' => $data
            ]);
            
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            Log::error('Chase refund failed: ' . $e->getMessage());
            throw new \Exception('Refund failed');
        }
    }
}