<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Container\Attributes\RouteParameter;
use Illuminate\Foundation\Http\FormRequest;

class TaskDeleteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(#[RouteParameter('task')] Task $task): bool
    {
        return auth()->check() && auth()->user()->can('delete', $task);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [];
    }

    public function persist(Task $task)
    {
        $task->delete();
    }
}
