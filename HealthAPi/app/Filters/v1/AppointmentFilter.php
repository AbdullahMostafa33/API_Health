<?php

namespace App\Filters\v1;

use App\Filters\FilterApi;


class AppointmentFilter extends FilterApi
{

    protected $safeParms = [
        'userId' => ['eq'],
        'doctorId' => ['eq'],
        'time' => ['eq'],
        "date" => ['eq'],
        "status" => ['eq'],
    ];
    protected $columnMap = [
        'userId' => 'user_id',
        'doctorId' => 'doctor_id',
    ];
   

    
}
