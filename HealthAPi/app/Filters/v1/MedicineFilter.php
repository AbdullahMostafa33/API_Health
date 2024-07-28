<?php

namespace App\Filters\v1;

use App\Filters\FilterApi;


class MedicineFilter extends FilterApi
{

    protected $safeParms = [
        'title'=> ['eq'],
        'description' => ['eq'],
        'category' => ['eq'],
        'price' => ['eq'],
        'image' => ['eq']
    ];
   
   
}
