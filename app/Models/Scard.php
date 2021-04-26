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
 * @method static Builder|Scard newModelQuery()
 * @method static Builder|Scard newQuery()
 * @method static Builder|Scard query()
 * @method static Builder|Scard whereCreatedAt($value)
 * @method static Builder|Scard whereId($value)
 * @method static Builder|Scard whereMovieId($value)
 * @method static Builder|Scard whereQuantity($value)
 * @method static Builder|Scard whereSessionId($value)
 * @method static Builder|Scard whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Movie $movie
 * @property-read mixed $sum_price
 */
class Scard extends Model
{
    protected $table = 'scard';
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
