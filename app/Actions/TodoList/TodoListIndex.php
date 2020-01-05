<?php

namespace App\Actions\TodoList;

use App\TodoList;
use App\Actions\Action;

class TodoListIndex extends Action
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
            'per_page' => [
                'integer',
                'min:1',
            ],
            'page' => [
                'integer',
                'min:1',
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

        $perPage = data_get($data, 'per_page', 15);

        return TodoList::paginate($perPage);
    }
}
