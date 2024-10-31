<?php
namespace App\Http\Requests;

use App\Rules\CapitalizedWordsRule;
use App\Rules\EnglishCharsRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateOrderRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                new EnglishCharsRule(),
                new CapitalizedWordsRule(),
            ],
            'address'  => 'required|array',
            'price'    => 'required|numeric|min:0|max:2000',
            'currency' => ['required', 'string', 'max:3', Rule::in(['TWD', 'USD'])],
        ];
    }

    public function messages() : array
    {
        return [
            'price.max'   => 'Price is over 2000',
            'currency.in' => 'Currency format is wrong',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
