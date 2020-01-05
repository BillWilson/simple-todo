<?php

namespace App\Actions\TodoList;

use App\TodoList;
use App\Actions\Action;

class TodoListStore extends Action
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
                'required',
                'string',
                'max:255',
            ],
            'content' => [
                'required',
                'array',
                'min:1',
            ],
            'content.*.name' => [
                'required',
                'string',
            ],
            'attachment' => [
                'required',
                'string',
                'max:255',
            ],
            'done_at' => [
                'date',
            ],
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = $this->validated();

        return TodoList::create($data);
    }
}
