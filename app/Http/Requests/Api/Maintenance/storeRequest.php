<?php

namespace App\Http\Requests\Api\Maintenance;

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
            'description' => 'required|string',
            'contract_price' => 'required|numeric',
            'visits' => 'required|array',
            'visits.*' => 'required',
 
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'يجب أدخال وصف للصيانة',
            'contract_price.required' => 'يجب أدخال قيمة العقد',
            'visits.required' => 'يجب أضافة الزيارات',
        ];
    }
}
