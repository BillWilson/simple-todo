<?php

namespace App\Actions\Auth;

use App\Actions\Action;
use Illuminate\Http\Response;

class LoginAction extends Action
{
    /**
     * Get the validation rules that apply to the action.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
            ],
            'password' => [
                'required',
                'string',
                'max:255',
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
        $credentials = $this->validated();

        if (!$token = auth()->guard('api')->attempt($credentials)) {
            abort(Response::HTTP_UNAUTHORIZED, 'Invalid credentials');
        }

        return ['token' => $token];
    }
}
