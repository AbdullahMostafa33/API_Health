<?php

namespace App\Filters\v1;

use App\Filters\FilterApi;


class MessageFilter extends FilterApi
{


    protected $safeParms = [
        'senderId' =>  ['eq'],
        'receiverId' => ['eq'],
        'messageContent' =>  ['eq'],
    ];
    protected $columnMap = [
        'senderId'=> 'sender_Id',
        'receiverId'=> 'receiver_id',
        'messageContent'=> 'message_content',
    ];
   
}
