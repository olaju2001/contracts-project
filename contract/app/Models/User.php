<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\SendForgetPasswordCodeMail;
use Illuminate\Support\Facades\Route;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

/**
 * @method whereEmail(array|string|null $post)
 * @method create(array $array)
 * @method user()
 * @method sheikh()
 * @method whereId(\Illuminate\Database\Eloquent\HigherOrderBuilderProxy|mixed $user_id)
 * @property mixed $role_id
 */
class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

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
        'role_id',
        'lang',
        'email_verified_at'
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
    ];

    public function scopeAdmin($query)
    {
        $query->where('role_id', 1);
    }

    /**
     * @param $query
     * @return void
     */
    public function scopeSheikh($query)
    {
        $query->where('role_id', 2);
    }

    /**
     * @param $query
     * @return void
     */
    public function scopeUser($query)
    {
        $query->where('role_id', 3);
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role_id == 1;
    }

    /**
     * @return bool
     */
    public function isSheikh(): bool
    {
        return $this->role_id == 2;
    }

    /**
     * @return bool
     */
    public function isUser(): bool
    {
        return $this->role_id == 3;
    }

    /**
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * @param $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        if(Route::currentRouteName() == 'user.forget-password'){
            $url = config('app.front_url').'#/reset-password?token='.$token.'&email='.$this->email;
            $this->notify(new SendForgetPasswordCodeMail($url));
        }
    }

    /**
     * @param $value
     * @return Application|UrlGenerator|string
     */
    public function getImageAttribute($value)
    {
        if($value) return url($value);

        return $value;
    }

    /**
     * @return string
     */
    public function getCoverAttribute(): string
    {
        return $this->getFirstMediaUrl('image')  ;
    }

    /**
     * @param string $collectionName
     * @param string $conversionName
     * @return string
     */
    public function getFirstMediaUrl(string $collectionName = 'default', string $conversionName = ''): string
    {
        $media = $this->getFirstMedia($collectionName);

        if (!$media) {
            return $this->getFallbackMediaUrl($collectionName) ?: asset('avatar/no.png');
        }

        if ($conversionName !== '' && !$media->hasGeneratedConversion($conversionName)) {
            return $media->getUrl();
        }

        return $media->getUrl($conversionName);
    }
}
