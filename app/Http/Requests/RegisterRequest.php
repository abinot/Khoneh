<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                // Case-insensitive uniqueness: compare on the normalized value.
                Rule::unique('users', 'email'),
            ],
            'password' => ['required', 'string', Password::min(6)],
            'password_confirmation' => ['required', 'same:password'],
        ];
    }

    /**
     * Normalize the email to lowercase before validation, so a user who
     * registers as "USER@Example.com" cannot be duplicated as "user@example.com".
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'email' => strtolower(trim((string) $this->input('email'))),
        ]);
    }
}
