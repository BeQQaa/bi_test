<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UserDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public final function authorize(): bool
    {
        return Gate::allows('destroy', [User::class, $this->id]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public final function rules(): array
    {
        return [
            'id' => 'required|exists:users,id',
        ];
    }
    protected function prepareForValidation()
    {
        $id = config('constants.COLUMN_ID');
        $this->merge([
            $id => $this->route($id),
        ]);
    }
}
