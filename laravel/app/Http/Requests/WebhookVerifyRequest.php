<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class WebhookVerifyRequest extends FormRequest
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
        Log::debug(json_encode($this->all()));
        return [
            'hub_mode' => ['required', Rule::in(['subscribe']),],
            'hub_verify_token' => ['required', Rule::in([config('services.botman.facebook_verification')]),],
            'hub_challenge' => ['required',],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Log::debug(json_encode($validator->errors()));
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}
