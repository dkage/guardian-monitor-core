<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TaskLabel
 *
 * @property int $id
 * @property int $task_id
 * @property int $label_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TaskLabel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskLabel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskLabel query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskLabel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskLabel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskLabel whereLabelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskLabel whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskLabel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TaskLabel extends Model
{
    use HasFactory;
}
