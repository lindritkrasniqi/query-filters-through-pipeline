<?php

namespace App\Http\Query\Filters;

use App\Http\Query\Traits\OrWhereLike;

class Email extends Filter
{
    use OrWhereLike;
}
