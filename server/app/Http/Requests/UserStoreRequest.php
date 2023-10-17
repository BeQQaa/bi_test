<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UserStoreRequest extends FormRequest
{

    /**
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('create', [User::class]);
    }


    /**
     * @return string[]
     */
    public final function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email:rfc,dns|unique:users,email|',
            'password' => 'required|string|min:6',
            'phone_number' => 'nullable|string',
            'role' => 'required|string|in:admin,user'
        ];
    }
}
