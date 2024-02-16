<?php

namespace App\Http\Requests;

use App\Models\UserService;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = request()->user();
        $isAdmin = $user->roles()->where('name', 'admin')->count() != 0;
        $isOwner = $user->userServices->where('id', request()->route('service')->id);

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
            'service_id' => ['required', 'numeric', 'integer', 'exists:services,id'],
            'is_by_agreement' => ['required', 'boolean'],
            'is_hourly_type' => ['required', 'boolean'],
            'is_work_type' => ['required', 'boolean'],
            'hourly_payment' => ['nullable', 'required_if:is_hourly_type,true', 'numeric', 'lte:1000000000', 'decimal:0,2', 'gt:0'],
            'work_payment' => ['nullable', 'required_if:is_work_type,true', 'numeric', 'decimal:0,2', 'lte:1000000000', 'gt:0'],
            'is_active' => ['required', 'boolean'],
            'is_picked' => ['required', 'accepted']
        ];
    }
}
