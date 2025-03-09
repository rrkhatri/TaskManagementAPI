<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class LoginRequest extends FormRequest
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
            'email'    => ['required', 'email'],
            'password' => ['required', 'string', 'min:6']
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                if (!auth()->validate($this->validated())) {
                    $validator->errors()->add(
                        'password',
                        'Entered credentials are invalid.'
                    );
                }
            }
        ];
    }

    /**
     * @return array
     */
    public function persist(): array
    {
        // here we can remove all issues token, if we want to keep only 1 token active.
        auth()->attempt($this->validated());

        $token = auth()->user()->createToken('auth_token')->plainTextToken;

        return [
            'token' => $token,
            'user'  => auth()->user(),
        ];
    }
}
