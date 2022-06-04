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
            'worker_id' => 'required|integer',
            'address' => 'required|string',
            'description' => 'required|string',
            'contract_price' => 'required|numeric',
            'payments' => 'required|array',
            'payments.*' => 'required',
            'visits' => 'required|array',
            'visits.*' => 'required',

        ];
    }
}
