<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int|null $customer_id
 * @property int|null $movie_id
 * @property int|null $quantity
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|OrderItem newModelQuery()
 * @method static Builder|OrderItem newQuery()
 * @method static Builder|OrderItem query()
 * @method static Builder|OrderItem whereCreatedAt($value)
 * @method static Builder|OrderItem whereCustomerId($value)
 * @method static Builder|OrderItem whereId($value)
 * @method static Builder|OrderItem whereMovieId($value)
 * @method static Builder|OrderItem whereQuantity($value)
 * @method static Builder|OrderItem whereUpdatedAt($value)
 * @mixin Eloquent
 * @property int $order_id
 * @property float $price
 * @property-read Movie $movie
 * @property-read Order $order
 * @method static Builder|OrderItem whereOrderId($value)
 * @method static Builder|OrderItem wherePrice($value)
 */
class OrderItem extends Model
{
    public $timestamps = false;
    protected $table = 'order_item';
    protected $fillable = ['order_id','movie_id','quantity','price'];
    protected $with = ['movie'];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function movie() {
        return $this->belongsTo(Movie::class);
    }
}
