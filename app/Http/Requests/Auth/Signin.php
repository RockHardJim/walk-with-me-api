<?php

namespace App\Http\Requests\Auth;

use App\Http\Traits\JsonResponses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest as LaravelFormRequest;

class Signin extends LaravelFormRequest
{
    use JsonResponses;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     *
     */
    public function rules(): array
    {
        return ['cellphone' => 'required|exists:users|phone:mobile', 'password' => 'required|min:5|max:5|pwnedpassword'];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(['errors' => $errors], self::unprocessable())
        );
    }
}
