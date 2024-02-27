<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\TaskComment
 *
 * @property int $id
 * @property int $task_id
 * @property string $comment
 * @property string|null $attachment
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|TaskComment newModelQuery()
 * @method static Builder|TaskComment newQuery()
 * @method static Builder|TaskComment query()
 * @method static Builder|TaskComment whereAttachment($value)
 * @method static Builder|TaskComment whereComment($value)
 * @method static Builder|TaskComment whereCreatedAt($value)
 * @method static Builder|TaskComment whereId($value)
 * @method static Builder|TaskComment whereTaskId($value)
 * @method static Builder|TaskComment whereUpdatedAt($value)
 * @method static Builder|TaskComment whereUserId($value)
 * @mixin Eloquent
 */
class TaskComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'comment',
        'attachment',
        'user_id',
    ];

    public function task(): BelongsTo
    { return $this->belongsTo(Task::class); }
}
