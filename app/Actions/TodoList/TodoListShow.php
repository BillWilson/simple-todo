<?php

namespace App\Actions\TodoList;

use App\TodoList;
use App\Actions\Action;

class TodoListShow extends Action
{
    /**
     * Execute the action and return a result.
     *
     * @param TodoList $todoList
     * @return mixed
     */
    public function handle(TodoList $todoList)
    {
        return $todoList;
    }
}
