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
          
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment');
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'X-API-KEY: REDACTED',
            'X-SANDBOX: 1'
          ));
          
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
      
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment/verify');
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'X-API-KEY: REDACTED',
        'X-SANDBOX: 1',
      ));
      
      $result = curl_exec($ch);
      curl_close($ch);
    }

}