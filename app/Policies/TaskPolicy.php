<?php

namespace App\Policies;

use App\Models\Task;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Task $task){    // Метод политики
        return $user->id === $task->user_id;
    }
}
