<?php
namespace App\Http\Requests;

use App\Rules\CapitalizedWordsRule;
use App\Rules\EnglishCharsRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'price'    => 'required|numeric|min:0',
            'currency' => 'required|string|max:3',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
