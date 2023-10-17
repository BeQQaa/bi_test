<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
class CompanyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public final function authorize(): bool
    {
        return GATE::allows('create', [Company::class]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public final function rules(): array
    {
        return [
            'name' => 'required|string|unique:company,name',
            'image' => 'sometimes|image',
            'image_path' => 'sometimes|string',
            'web_site_url' => 'sometimes|string',
            'email' => 'sometimes|string'
        ];
    }

    protected final function prepareForValidation(): void
    {
        $this->has(config('constants.LOGO_FILE_NAME'))
            ? $logoPath = Company::storeFile
                (config('constants.STORE_LOGO'), $this, config('constants.LOGO_FILE_NAME'))
            : $logoPath = null;

        if (isset($logoPath)){
            $fullLogoPath = Company::getFullPath($logoPath);
            $this->merge([config('constants.LOGO_DB_NAME') => $fullLogoPath]);
        }
    }
}
