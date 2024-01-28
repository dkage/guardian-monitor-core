<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Task
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $project_id
 * @property int $priority_id
 * @property string|null $due_date
 * @property int $order
 * @property int $completed
 * @property string|null $completed_at
 * @property int|null $origin_creation As every task can be created directly on the Laravel API, or through Todoist/Google Calendar integrations, this field will identify the origin
 * @property int|null $origin_completion As every task can be finished/done directly on the Laravel API, or through Todoist/Google Calendar integrations, this field will show where it was marked as completed
 * @property string|null $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCompletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereOriginCompletion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereOriginCreation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task wherePriorityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Task extends Model
{
    use HasFactory;
}
