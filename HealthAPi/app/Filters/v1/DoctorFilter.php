<?php

namespace App\Filters\v1;

use App\Filters\FilterApi;


class  DoctorFilter extends FilterApi
{

    protected $safeParms = [

        'name' => ['eq'],
        'email' => ['eq'],
        'specialty' => ['eq'],
        'about' => ['eq'],
        'address' => ['eq'],
        'phone' => ['eq'],
        'image' => ['eq'],
    ];
    protected $columnMap = [];
   

    // tranform function exist in FilterApi
}
