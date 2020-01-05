<?php

namespace App\Actions\Auth;

use Carbon\Carbon;
use App\Actions\Action;
use Illuminate\Support\Collection;

class TokenStatusAction extends Action
{
    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
        /* @var $claims Collection */
        $claims = collect(auth()->payload());

        return [
            'issued_at' => Carbon::parse($claims->get('iat')),
            'expired_at' => Carbon::parse($claims->get('exp')),
            'ttl' => auth()->factory()->getTTL() * 60,
        ];
    }
}
