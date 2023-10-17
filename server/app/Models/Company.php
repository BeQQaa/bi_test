<?php

namespace App\Models;

use App\Http\Requests\CompanyStoreRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

/**
 * @mixin Builder
 */
class Company extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'company';

    protected $fillable = [
        'id',
        'name',
        'image_path',
        'web_site_url',
        'email',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'image',
    ];

    public static function storeFile(string $diskName, FormRequest $request, string $itemName): string|null
    {
        return $request->has($itemName)
            ? Storage::disk($diskName)->putFile('', $request->file('image'))
            : null;
    }

    public final static function getFullPath(string $logoPath): ?string
    {
        return config('constants.IMAGE_URL_DEV').config('constants.IMAGE_PREFIX').$logoPath;
    }
}
