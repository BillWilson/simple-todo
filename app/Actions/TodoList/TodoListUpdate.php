<?php

namespace App\Actions\TodoList;

use App\TodoList;
use App\Actions\Action;

class TodoListUpdate extends Action
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
                'datetime',
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
