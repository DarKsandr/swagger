<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class ApiBookStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'author' => 'required',
            'pages' => 'required|integer',
        ];
    }
}
