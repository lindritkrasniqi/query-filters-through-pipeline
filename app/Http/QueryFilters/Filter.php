<?php

namespace App\Http\QueryFilters;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

abstract class Filter
{
    protected $key, $value, $sortables = [
        'name',
        'email',
        'created_at',
        'updated_at'
    ];

    public function handle(Builder $builder, Closure $next): Builder
    {
        if (!request()->has($this->key = Str::snake(class_basename($this)))) {
            return $next($builder);
        }

        $this->value = request()->{$this->key};

        return $this->apply($next($builder));
    }

    protected function isSortable(): bool
    {
        return in_array($this->value, $this->sortables, true);
    }

    protected abstract function apply(Builder $builder): Builder;
}
