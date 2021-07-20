<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyStoreRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','string','email','max:255', Rule::unique('companies')->ignore($this->id)],
            'website' => ['nullable', 'string'],
        ];

        if (request()->hasFile('logo')) {
            $rules['logo'] = ['nullable', 'image','mimes:jpg,jpeg,png','max:5120', 'dimensions:min_width=100,min_height=100']; // 5MB
        }

        return $rules;
    }
}
