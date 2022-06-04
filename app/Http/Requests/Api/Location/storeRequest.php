<?php

namespace App\Http\Requests\Api\Location;

use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
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
        return [

            'address' => 'required',
            'contract_price' => 'required',
            'description' => 'required',
            'received_date' => 'required|date',
            'delivery_date' => 'required|date',
            'products' => 'required|array',
            'products.*' => 'required',

            'payment_details' => 'required|array',
            'payment_details.*.amount' => 'required',
            'payment_details.*.payment_received_date' => 'required',
        ];
    }
}
