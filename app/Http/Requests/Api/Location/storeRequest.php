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

    public function messages()
    {
        return [
            'contract_price.required' => 'يجب أدخال قيمة العقد',
            'description.required' => 'يجب أدخال وصف الموقع',
            'received_date.required' => 'يجب أدخال تاريخ الاستلام',
            'delivery_date.required' => 'يجب أدخال تاريخ التسليم',
            'products.*.required' => 'يجب أدخال قيمة',
            'payment_details.*.amount.required' => 'يجب أدخال الكمية',
            'payment_details.*.payment_received_date.required' => 'يجب أدخال تاريخ الدفعة',


        ];
    }
}
