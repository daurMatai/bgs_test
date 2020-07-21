<?php

namespace App\Http\Filters;

use Illuminate\Support\Str;

abstract class QueryFilter
{
    protected $builder;
    protected $request;

    public function __construct($builder, $request)
    {
        $this->builder = $builder;
        $this->request = $request;
    }

    public function apply()
    {
        foreach ($this->filters() as $filter => $value) {
            $method = Str::camel($filter);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }

        return $this->builder;
    }

    protected function filters()
    {
        return $this->request->all();
    }
}
