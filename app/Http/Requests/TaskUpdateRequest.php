<?php

namespace App\Http\Requests;

use App\Models\Task;
use App\Enums\TaskStatus;
use App\Enums\TaskCategory;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Container\Attributes\RouteParameter;

class TaskUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(#[RouteParameter('task')] Task $task): bool
    {
        return auth()->check() && auth()->user()->can('update', $task);
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
            'description' => ['nullable', 'string'],
            'category'    => ['required', Rule::enum(TaskCategory::class)],
            'status'      => ['required', Rule::enum(TaskStatus::class)],
            'due_at'      => ['required', 'date', 'after:now'],
        ];
    }

    public function persist(Task $task): Task
    {
        $task->update($this->validated());

        return $task->refresh();
    }
}
