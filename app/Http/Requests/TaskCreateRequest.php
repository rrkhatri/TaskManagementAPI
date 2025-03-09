<?php

namespace App\Http\Requests;

use App\Models\Task;
use App\Enums\TaskCategory;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TaskCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'category'    => ['required', Rule::enum(TaskCategory::class)],
            'due_at'      => ['required', 'date', 'after:now'],
        ];
    }

    public function persist(): Task
    {
        $task = $this->user()->tasks()->create($this->validated());

        return $task->refresh();
    }
}
