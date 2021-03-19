<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Listing
 * @package App\Models
 *
 *
 * @property int $id
 * @property string $title
 * @property float $price
 * @property int $bedrooms
 * @property int $bathrooms
 * @property int $storeys
 * @property int $garages
 * @property int $status
 *
 * * * METHODS
 * @method static active()
 * @see \App\Models\Listing::scopeActive()
 *
 * @method static ordered()
 * @see \App\Models\Listing::scopeOrdered()
 */
class Listing extends Model
{
    use HasFactory;

    /**
     *
     */
    const STATUS_NOT_ACTIVE = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @var string
     */
    protected $table = 'listings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'price', 'bedrooms', 'bathrooms', 'storeys', 'garages', 'status',
    ];

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query
            ->where('status', self::STATUS_ACTIVE);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('created_at');
    }

}
