<?php
namespace App\Actions;

use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Lorisleiva\Actions\Action as LaravelAction;

class Action extends LaravelAction
{
    public function response($result, $request)
    {
        if (!($result instanceof LengthAwarePaginator || empty($result))) {
            $result = [
                'data' => $result,
            ];
        }

        return response($result, Response::HTTP_OK);
    }
}
