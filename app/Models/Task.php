<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'title',
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

    // create boot
    public static function boot()
    {
        parent::boot();

        static::creating(function ($task) {

            // If no project is set, set it to 1 as default for "Unassigned" project
            $task->project_id = $task->project_id ?? 1;
            $task->priority_id = $task->priority_id ?? 1;

        });

        static::updating(function ($task) {



            if($task->completed !== $task->getOriginal('completed')) {
                // set carbon as timestamp without milliseconds
                $task->completed_at = $task->completed ? Carbon::now()->format('Y-m-d H:i:s') : null;
            }

        });
    }

    public function project(): BelongsTo { return $this->belongsTo(Project::class); }
    public function priority(): BelongsTo {return $this->belongsTo(Priority::class); }
    public function originCreation(): BelongsTo { return $this->belongsTo(Origin::class); }
    public function originCompletion(): BelongsTo { return $this->belongsTo(Origin::class); }
    public function comments(): HasMany { return $this->hasMany(TaskComment::class);}
    public function labels(): BelongsToMany { return $this->belongsToMany(Label::class, 'task_labels'); }
}
