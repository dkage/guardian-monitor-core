<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\TaskLabel
 *
 * @property int $id
 * @property int $task_id
 * @property int $label_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|TaskLabel newModelQuery()
 * @method static Builder|TaskLabel newQuery()
 * @method static Builder|TaskLabel query()
 * @method static Builder|TaskLabel whereCreatedAt($value)
 * @method static Builder|TaskLabel whereId($value)
 * @method static Builder|TaskLabel whereLabelId($value)
 * @method static Builder|TaskLabel whereTaskId($value)
 * @method static Builder|TaskLabel whereUpdatedAt($value)
 * @mixin Eloquent
 */
class TaskLabel extends Model
{
    // Pivot model for task_label table

}
