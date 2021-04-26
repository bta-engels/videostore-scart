<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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
 * @property int $price_total
 * @property int|null $done
 * @property string|null $done_at
 * @property-read Customer $customer
 * @property-read Collection|OrderItem[] $orderItems
 * @property-read int|null $order_items_count
 * @method static Builder|Order whereDone($value)
 * @method static Builder|Order whereDoneAt($value)
 * @method static Builder|Order wherePriceTotal($value)
 */
class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['customer_id','price_total'];
    protected $dates = ['created_at','updated_at','done_at'];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }
}
