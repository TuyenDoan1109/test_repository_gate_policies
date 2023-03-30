<?php

namespace App\Enums;

enum OrderStatusEnum:int
{
    case PROCESSING = 1;
    case ACCEPTED = 2;
    case ON_DELIVERY = 3;
    case DELIVERED = 4;
    case CANCELED = 5;
}
