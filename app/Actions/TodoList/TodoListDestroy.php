<?php

namespace App\Actions\TodoList;

use App\TodoList;
use App\Actions\Action;

class TodoListDestroy extends Action
{
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
