<?php

namespace App\Http\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class Email extends Filter
{
    protected function apply(Builder $builder): Builder
    {
        return $builder->orWhere($this->key, 'like', "{$this->value}%");
    }
}
