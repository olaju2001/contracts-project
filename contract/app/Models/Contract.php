<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;


/**
 * @method create(array $array)
 * @method where(string $string, string $string1)
 * @method whereId(array|string|null $post)
 * @method find($id)
 */
class Contract extends Model implements HasMedia
{
    use HasFactory, LogsActivity, InteractsWithMedia;

    /**
     * @var string[]
     */
    protected static $logAttributes = [
        'quran_date',
        'is_mosque',
        'quran_address',
        'deferred_dowry',
        'prompt_dower',
        'terms',
        'status',
        'user_id',
        'action_by',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'quran_date',
        'is_mosque',
        'quran_address',
        'status',
        'user_id',
        'action_by',
        'updated_by'
    ];

    /**
     * @param $query
     * @return void
     */
    public function scopeWhenUser($query)
    {
        $query->when(auth()->user()->isUser(),function($query){

            $query->where('user_id',auth()->id());

        });
    }

    /**
     * @return HasMany
     */
    public function persons(): HasMany
    {
        return $this->hasMany(ContractPerson::class);
    }

    public function contractOwner()
    {
        return $this->belongsTo(User::class,'user_id');
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
