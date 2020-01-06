<?php

namespace App\Actions\TodoList;

use App\TodoList;
use App\Actions\Action;

class TodoListUpdate extends Action
{
    /**
     * Get the validation rules that apply to the action.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [
                'string',
                'max:255',
            ],
            'content' => [
                'array',
                'min:1',
            ],
            'content.*.name' => [
                'required',
                'string',
            ],
            'attachment' => [
                'string',
                'max:255',
            ],
            'done_at' => [
                'nullable',
                'date',
            ],
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @param TodoList $todoList
     * @return mixed
     */
    public function handle(TodoList $todoList)
    {
        $data = $this->validated();

        $todoList->update($data);

        return $todoList;
    }
}
