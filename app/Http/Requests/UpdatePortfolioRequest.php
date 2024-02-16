<?php

namespace App\Http\Requests;

use App\Models\Portfolio;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class UpdatePortfolioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = request()->user();
        $isAdmin = $user->roles()->where('name', 'admin')->count() != 0;
        $isOwner = Portfolio::query()
            ->where('user_id', $user->id)
            ->where('id', request()->route('portfolio')->id)
            ->count() !== 0;

        return $isAdmin || $isOwner;
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
            'photo' => ['nullable', File::types(['png', 'jpg', 'jpeg', 'gif'])->max(1024 * 3)],
            'service_id' => ['required','numeric', 'integer','exists:services,id'],
            'price' => ['required', 'numeric', 'decimal:0,2', 'gt:0', 'lte:10000000'],
        ];
    }


    public function prepareForValidation() {
        if (str_starts_with($this->photo, 'http')) {
            $this->merge([
                'photo' => null
            ]);
        }
    }
}
