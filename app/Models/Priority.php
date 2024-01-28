<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Priority
 *
 * @property int $id
 * @property string $name
 * @property string $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Priority newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Priority newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Priority query()
 * @method static \Illuminate\Database\Eloquent\Builder|Priority whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priority whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priority whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priority whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priority whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Priority extends Model
{
    use HasFactory;
}
