<?php

namespace App\Filters\v1;

use App\Filters\FilterApi;


class CartFilter extends FilterApi
{

    protected $safeParms = [
        'userID' => ['eq'],
    ];
    protected $columnMap = [
        'userID' => 'user_id',
    ];
}
