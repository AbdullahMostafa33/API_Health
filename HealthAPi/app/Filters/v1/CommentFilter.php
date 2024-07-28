<?php

namespace App\Filters\v1;

use App\Filters\FilterApi;


class CommentFilter extends FilterApi
{

    protected $safeParms = [
        'userID'=> ['eq'],
        'doctorID'=> ['eq'],
        'comment'=> ['eq'],
        'rating'=> ['eq'],
    ];
   
   
}
