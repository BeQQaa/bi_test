<?php

namespace App\Models;

use App\Exceptions\WrongPasswordException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Response;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * @mixin Builder
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'company_id',
        'phone_number',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * @param string $password
     * @param string $storedPassword
     * @return void
     * @throws WrongPasswordException
     */
    public final static function attempt(string $password, string $storedPassword): void
    {
        if (!Hash::check($password, $storedPassword)) {
            throw new WrongPasswordException('Invalid password', Response::HTTP_LOCKED);
        }
    }

    /**
     * @param string $validated
     * @param Model|User $user
     * @return string
     */
    public static function roleType(string $validated, Model|User $user): string
    {
        return $validated == config('constants.ADMIN_NAME') ?
            $user->createToken(config('constants.USER_TOKEN_ADMIN'), config('constants.ADMIN_ABILITIES'))->plainTextToken :
            $user->createToken(config('constants.USER_TOKEN_USER'), config('constants.USER_ABILITIES'))->plainTextToken;
    }

    public final function company(): Company
    {
        return $this->company->belongsTo(Company::class);
    }


}
