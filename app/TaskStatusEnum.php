<?php

namespace App;

enum TaskStatusEnum:string
{
    case OPEN ='open';
    case IN_PROGRESS = 'in progress';
    case PENDING  = 'pending';
    case WAITING_CLIENT = 'waiting client';
    case BLOCKED = 'blocked';
    case CLOSED = 'closed';
}
