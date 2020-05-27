<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TreatmentUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:60',
            'icon' => 'required|string|max:40',
            'desc' => 'required|string',
            'duration' => 'required|string|max:40',
            'procedure' => 'required|string',
            'accommodation' => 'required|string|max:60',
            'transport' => 'required|string|max:60',
            'extra' => 'required|string|max:60',
            'assistance' => 'required|in:true,false',
            'guidance' => 'required|string',
            'doctors' => 'required|string|max:120',
        ];
    }
}
