<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Task
 *
 * @property int $id
 * @property string $title
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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Task newModelQuery()
 * @method static Builder|Task newQuery()
 * @method static Builder|Task query()
 * @method static Builder|Task whereColor($value)
 * @method static Builder|Task whereCompleted($value)
 * @method static Builder|Task whereCompletedAt($value)
 * @method static Builder|Task whereCreatedAt($value)
 * @method static Builder|Task whereDescription($value)
 * @method static Builder|Task whereDueDate($value)
 * @method static Builder|Task whereId($value)
 * @method static Builder|Task whereName($value)
 * @method static Builder|Task whereOrder($value)
 * @method static Builder|Task whereOriginCompletion($value)
 * @method static Builder|Task whereOriginCreation($value)
 * @method static Builder|Task wherePriorityId($value)
 * @method static Builder|Task whereProjectId($value)
 * @method static Builder|Task whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'project_id',
        'priority_id',
        'due_date',
        'order',
        'completed',
        'completed_at',
        'origin_creation',
        'origin_completion',
        'color'
    ];


}
