<?php

namespace App\Http\Requests\Api\Maintenance;

use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'worker_id' => 'required|exists:workers,id',
            'customer_id' => 'required|exists:customers,id',
            'location_name' => 'required|string',
            'price' => 'required',
        ];
    }
}
