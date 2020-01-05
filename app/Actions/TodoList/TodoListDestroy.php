<?php

namespace App\Actions\TodoList;

use App\TodoList;
use App\Actions\Action;

class TodoListDestroy extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Execute the action and return a result.
     *
     * @param TodoList $todoList
     * @return mixed
     * @throws \Exception
     */
    public function handle(TodoList $todoList)
    {
        $todoList->delete();

        return [];
    }
}
