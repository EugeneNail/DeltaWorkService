<?php

namespace App\Http\Requests;

use App\Models\Portfolio;
use Illuminate\Foundation\Http\FormRequest;

class DeletePortfolioRequest extends FormRequest
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
            //
        ];
    }
}
