<?php

namespace App\Http\Requests;

use App\Models\Currency;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;

class QuoteRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'currency_code' => ['required','string',Rule::in(Currency::AVAILABLE_CURRENCIES),'max:3'],
            'amount' => 'required|numeric|min:1',
        ];
    }
}
