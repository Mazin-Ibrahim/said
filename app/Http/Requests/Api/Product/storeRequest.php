<?php

namespace App\Http\Requests\Api\Product;

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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'buy_price' => 'required|numeric',
            'sell_price' => 'required|numeric',
            'category_id' => 'required|numeric|exists:categories,id',
            'qty' => 'required|numeric',
            'selling_method_id' => 'required',
            'danger_amount' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يجب ادخال أسم المنتج',
            'description.required' => 'يجب أدخال وصف المنتج',
            'buy_price.required' => 'يجب أدخال سعر الشراء',
             'sell_price.required' => 'يجب ادخال سعر البيع',
             'category_id.required' => 'يجب اختيار التصنيف',
             'qty.required' => 'يجب أدخال الكمية',
             'selling_method_id.required' => 'يجب اختيار طريقة البيع',
             'danger_amount.required' => 'يجب ادخال الحد الادنى للتنبيه'
        ];
    }
}
