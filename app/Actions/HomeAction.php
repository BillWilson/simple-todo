<?php

namespace App\Actions;

use Carbon\Carbon;
use Lorisleiva\Actions\Action;

class HomeAction extends Action
{
    /**
     * Execute the action and return a result.
     *
     * @return mixed
     * @throws \Exception
     */
    public function handle()
    {
        $commitHash = trim(exec('git log --pretty="%h" -n1 HEAD'));
        $commitDate = Carbon::parse(trim(exec('git log -n1 --pretty=%ci HEAD')));

        return "$commitHash ({$commitDate->toDateTimeString()})";
    }
}
