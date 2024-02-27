<?php

namespace App\Http\Requests\Tasks;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => 'required|string|max:200',
            'description' => 'nullable|string|max:1000',
            'project_id' => 'required|exists:projects,id',
            'priority_id' => 'sometimes|exists:priorities,id',
            'due_date' => 'nullable|date',
            'order' => 'nullable|integer',
            'completed' => 'nullable|boolean',
            'completed_at' => 'nullable|date',
            'origin_creation' => 'nullable|exists:origins,id',
            'origin_completion' => 'nullable|exists:origins,id',
            'color' => 'sometimes|string',
        ];
    }

}
