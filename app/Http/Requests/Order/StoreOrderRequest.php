<?php
namespace App\Http\Requests\Order;
use App\Http\Requests\BaseRequest;
use App\Models\Currency;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'currency_code' => ['required','string',Rule::in(Currency::AVAILABLE_CURRENCIES),'max:3'],
            'amount' => 'required|numeric|min:1',
        ];
    }
}
