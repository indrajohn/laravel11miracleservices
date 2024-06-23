<?php

namespace App\Http\Requests;
use App\Rules\Recaptcha;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactUsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|string|max:100',
            'email' => 'required|string|email|max:100',
            'phone' => 'required|string|max:11',
            'subject' => 'required|string|max:150',
            'message' => 'required|string',
            'captcha_token'  => [new Recaptcha],
        ];
    }
}
