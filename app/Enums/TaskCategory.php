<?php

namespace App\Enums;

enum TaskCategory: string
{
    case PERSONAL = 'personal';
    case WORK = 'work';
    case URGENT = 'urgent';
}
