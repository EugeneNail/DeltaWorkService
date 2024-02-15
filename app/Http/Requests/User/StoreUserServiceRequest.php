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
        // service_id":null,
        // "is_by_agreement":false
        // ,"is_hourly_type":false
        // ,"is_work_type":false
        // ,"is_active":false
        // ,"hourly_payment":""
        // ,"work_payment":""
        // ,"is_picked":false

        return [
            'service_id' => ['required', 'numeric', 'integer', 'exists:services,id'],
            'is_by_agreement' => ['required', 'boolean'],
            'is_hourly_type' => ['required', 'boolean'],
            'is_work_type' => ['required', 'boolean'],
            'hourly_payment' => ['nullable', 'required_if:is_hourly_type,true', 'numeric', 'decimal:2'],
            'work_payment' => ['nullable', 'required_if:is_work_type,true', 'numeric', 'decimal:2'],
            'is_active' => ['required', 'boolean'],
        ];
    }
}
