<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'phone'  => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10']
        ];
    }
}
