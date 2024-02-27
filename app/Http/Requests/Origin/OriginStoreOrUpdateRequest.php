<?php

namespace App\Http\Requests\Origin;

use Illuminate\Foundation\Http\FormRequest;

class OriginStoreOrUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
