<?php

namespace App;

enum StatusEnum: string
{
    case OPEN = 'open';
    case IN_PROGRESS = 'in progress';
    case CANCELED = 'canceled';
    case BLOCKED = 'blocked';
    case COMPLETED  = 'completed';
}
