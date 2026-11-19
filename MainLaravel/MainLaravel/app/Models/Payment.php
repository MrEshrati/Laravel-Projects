<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {

    public function sendRequest($transaction_id,$price){

        $params = array(
            'order_id' => $transaction_id,
            'amount' => $price,
            'name' => '',
            'phone' => '',
            'mail' => '',
            'desc' => '',
            'callback' => 'http://127.0.0.1:8000/callback',
          );
          
          $headers = $this->headers();
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment');
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          
          $result = curl_exec($ch);
          curl_close($ch);

          $result = json_decode($result);
          
          return $result;
    }

    public function verify($token , $transaction_id){

      $params = array(
        'id' => $token,
        'order_id' => $transaction_id,
      );
      
      $headers = $this->headers();
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment/verify');
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      
      $result = curl_exec($ch);
      curl_close($ch);
    }

    private function headers(): array
    {
        $key = config('services.idpay.key');
        abort_unless(is_string($key) && trim($key) !== '', 503, 'Payment is not configured.');

        return [
            'Content-Type: application/json',
            'X-API-KEY: '.$key,
            'X-SANDBOX: 1',
        ];
    }
}
