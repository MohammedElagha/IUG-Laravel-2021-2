<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCarRequest extends FormRequest
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
            'brand' => 'required|string|min:2|max:198',
            'model' => 'required|string|contains:sa',
            'owner_id' => 'integer|min:1',
        ];
    }


    public function messages () {
        return [
            'brand.required' => 'The brand is missing',
            'brand.string' => 'wrong non text value for brand',
            'brand.min:2' => 'less than required length for brand',
            'model.required' => 'the model is missing',
            'model.string' => 'wrong non-text value for model',
            'model.contains:sa' => 'model not contains sa',
            'owner_id.integer' => 'wrong number',
            'owner_id.min:1' => 'wrong minus value',
        ];
    }
}
