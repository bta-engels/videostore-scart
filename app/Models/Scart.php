<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Scard
 *
 * @property int $id
 * @property string $session_id
 * @property int $movie_id
 * @property int $quantity
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Scart newModelQuery()
 * @method static Builder|Scart newQuery()
 * @method static Builder|Scart query()
 * @method static Builder|Scart whereCreatedAt($value)
 * @method static Builder|Scart whereId($value)
 * @method static Builder|Scart whereMovieId($value)
 * @method static Builder|Scart whereQuantity($value)
 * @method static Builder|Scart whereSessionId($value)
 * @method static Builder|Scart whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Movie $movie
 * @property-read mixed $sum_price
 */
class Scart extends Model
{
    protected $table = 'scart';
    protected $fillable = ['session_id','movie_id','quantity'];
    protected $dates = ['created_at'];
    protected $appends = ['sum_price'];

    public function getSumPriceAttribute()
    {
        return $this->quantity * $this->movie->price;
    }

    /**
     * @return HasMany
     */
    public function movie()
    {
        return $this->belongsTo('App\Models\Movie');
    }
}
