<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StorePortfolioRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'description' => ['nullable','string','min:1', 'max:250'],
            'photo' => ['required', File::types(['png', 'jpg', 'jpeg', 'gif'])->max(1024 * 3)],
            'service_id' => ['required','numeric', 'integer','exists:services,id'],
            'price' => ['required', 'numeric', 'decimal:0,2', 'gt:0', 'lte:10000000'],
        ];
    }
}
