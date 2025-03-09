<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Task $task): Response
    {
        return $user->id === $task->user_id ?
            Response::allow() :
            Response::denyAsNotFound();
    }

    public function delete(User $user, Task $task): Response
    {
        return $user->id === $task->user_id ?
            Response::allow() :
            Response::denyAsNotFound();
    }
}
