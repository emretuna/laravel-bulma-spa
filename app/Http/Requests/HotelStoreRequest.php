<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelStoreRequest extends FormRequest
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
            'name' => 'required|string|max:80',
            'desc' => 'required|string',
            'country' => 'required|string|max:60',
            'city' => 'required|string|max:60',
            'features' => 'required|string|max:60',
        ];
    }
}
