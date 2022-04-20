<?php

namespace App\Http\Requests\Api\Invoice;

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
            'user_id' => 'required|exists:users,id',
            'customer_id' => 'required|exists:customers,id',
            'total' => 'required|integer',
            'discount' => 'required|integer',
            'total_after_discount' => 'required|integer',
            'type_of_payment' => 'required|in:cash,credit',
            'invoce_items' => 'required|array',
            'invoce_items.*.product_id' => 'required|exists:products,id',
            'invoce_items.*.qty' => 'required|integer',
        ];
    }
}
