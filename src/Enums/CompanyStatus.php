<?php

namespace Jschwendener\Zefix\Enums;

enum CompanyStatus: string
{
    case Active = 'ACTIVE';
    case Cancelled = 'CANCELLED';
    case BeingCancelled = 'BEING_CANCELLED';
}
