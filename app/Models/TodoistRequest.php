<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoistRequest extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'endpoint',
        'command_type',
        'parameters',
        'success',
        'response',
        'sent_at',
        'responded_at',
    ];



}
