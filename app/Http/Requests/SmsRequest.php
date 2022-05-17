<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SmsRequest extends FormRequest
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
            'phone'  => ['required']
        ];
    }
}