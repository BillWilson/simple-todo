<?php

namespace App\Actions\Auth;

use App\Actions\Action;

class RefreshTokenAction extends Action
{
    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
        return [
            'token' => auth()->refresh(),
        ];
    }
}
