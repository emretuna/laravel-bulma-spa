<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClinicStoreRequest extends FormRequest
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
            'owner_id' => 'required|integer|exists:owners,id',
            'status' => 'required|in:pending,',
            'name' => 'required|string|max:40',
            'address' => 'required|string|max:100',
            'about' => 'required|string|max:400',
            'languages' => 'required|string|max:80',
            'location' => 'required|string|max:120',
            'country' => 'required|string|max:60',
        ];
    }
}
