<?php

namespace App\Http\Query\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Order
{
    protected function apply(Builder $builder): Builder
    {
        return $this->isSortable() ? $builder->{$this->key}($this->value) : $builder;
    }
}
