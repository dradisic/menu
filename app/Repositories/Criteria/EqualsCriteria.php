<?php

namespace App\Repositories\Criteria;

class EqualsCriteria implements CriteriaInterface
{
    public function __construct(protected string $field)
    {
    }

    public function apply($model, $value)
    {
        return $model->where($this->field, '=', $value);
    }
}
