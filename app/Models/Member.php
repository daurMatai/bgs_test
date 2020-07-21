<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $created_at
 * @property string $updated_at
 * @property MemberEvent[] $memberEvents
 */
class Member extends Model
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
    protected $fillable = ['email', 'first_name', 'last_name', 'created_at', 'updated_at'];

    /**
     * @return HasMany
     */
    public function memberEvents(): HasMany
    {
        return $this->hasMany(MemberEvent::class);
    }
}
