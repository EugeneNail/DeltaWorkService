<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserServiceRequest extends FormRequest
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
            'service_id' => ['required', 'numeric', 'integer', 'exists:services,id'],
            'is_by_agreement' => ['required', 'boolean'],
            'is_hourly_type' => ['required', 'boolean'],
            'is_work_type' => ['required', 'boolean'],
            // decimal(12,2) в MySQL означает, что значение может иметь 12 чисел всего, из них 2 после запятой,
            // чтобы в бд не вылетал overflow exception, установил граничение на миллиард (10 чисел перед запятой)
            // (да и кто будет требовать, что ему платили хотя бы миллиард у.е. в час?)
            'hourly_payment' => ['nullable', 'required_if:is_hourly_type,true', 'numeric', 'lte:1000000000', 'decimal:0,2', 'gt:0'],
            'work_payment' => ['nullable', 'required_if:is_work_type,true', 'numeric', 'decimal:0,2', 'lte:1000000000', 'gt:0'],
            'is_active' => ['required', 'boolean'],
            'is_picked' => ['required', 'accepted']
        ];
    }
}
