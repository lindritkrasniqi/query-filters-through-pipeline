<?php

namespace App\Http\Query\Traits;

use Illuminate\Database\Eloquent\Builder;

trait OrWhereLike
{
    protected function apply(Builder $builder): Builder
    {
        return $builder->orWhere($this->key, 'like', "{$this->value}%");
    }
}
