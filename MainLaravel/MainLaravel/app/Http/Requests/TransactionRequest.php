<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            
            'address' => ['required' , 'max:100'],
            'postal_code' => ['required' , 'max:20'],
            'description' => [],
            'price' => [],
            'discount' => [],
            'user_id' => [],

        ];
    }
}
