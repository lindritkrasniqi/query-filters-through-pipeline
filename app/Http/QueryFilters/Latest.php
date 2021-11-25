<?php

namespace App\Http\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class Latest extends Filter
{
    protected function apply(Builder $builder): Builder
    {
        return $this->isSortable() ? $builder->{$this->key}($this->value) : $builder;
    }
}
