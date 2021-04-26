<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Author
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property-read Collection|Movie[] $movies
 * @property-read int|null $movies_count
 * @method static Builder|Author newModelQuery()
 * @method static Builder|Author newQuery()
 * @method static Builder|Author query()
 * @method static Builder|Author whereFirstname($value)
 * @method static Builder|Author whereId($value)
 * @method static Builder|Author whereLastname($value)
 * @mixin Eloquent
 * @method static Builder|Author ordered()
 * @property-read mixed $fullname
 */
class Author extends Model
{
    public $timestamps = false;
    protected $table = 'author';
    protected $fillable = ['firstname','lastname'];
    protected $appends = ['fullname'];

    /**
     * @return HasMany
     */
    public function movies()
    {
        return $this->hasMany('App\Models\Movie');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('lastname', 'asc');
    }

    public function getFullnameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function __toString()
    {
        return (string) ($this->firstname . ' ' . $this->lastname);
    }
}
