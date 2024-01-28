<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Origin
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Origin newModelQuery()
 * @method static Builder|Origin newQuery()
 * @method static Builder|Origin query()
 * @method static Builder|Origin whereCreatedAt($value)
 * @method static Builder|Origin whereId($value)
 * @method static Builder|Origin whereName($value)
 * @method static Builder|Origin whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Origin extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
