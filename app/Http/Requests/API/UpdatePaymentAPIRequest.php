<?php

namespace App\Http\Requests\API;

use App\Models\Payment;
use InfyOm\Generator\Request\APIRequest;

class UpdatePaymentAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'status' => 'required|in:CONFIRMED,REVERSED,INITIALIZED'
        ];
        
        return $rules;
    }
}
