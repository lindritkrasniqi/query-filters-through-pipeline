<?php

namespace App\Http\Query\Filters;

use App\Http\Query\Traits\OrWhereLike;

class Name extends Filter
{
    use OrWhereLike;
}
