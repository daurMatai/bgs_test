<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property string $name
 * @property string $date_of
 * @property string $city
 * @property string $created_at
 * @property string $updated_at
 * @property MemberEvent[] $memberEvents
 */
class Event extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'date_of', 'city', 'created_at', 'updated_at'];

    /**
     * @return HasMany
     */
    public function memberEvents(): HasMany
    {
        return $this->hasMany(MemberEvent::class);
    }
}
