<?php

namespace App\Http\Requests\Tasks;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title'             => 'sometimes|string|max:200',
            'description'       => 'sometimes|string|max:1000',
            'due_date'          => 'sometimes|date',
            'order'             => 'sometimes|integer',
            'completed'         => 'sometimes|boolean',
            'completed_at'      => 'sometimes|date',

            // FKs
            'project_id'        => 'sometimes|exists:projects,id',
            'priority_id'       => 'sometimes|exists:priorities,id',
            'origin_creation'   => 'sometimes|exists:origins,id',
            'origin_completion' => 'sometimes|exists:origins,id',
        ];
    }

}
