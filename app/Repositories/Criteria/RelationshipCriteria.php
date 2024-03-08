<?php

namespace App\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

class RelationshipCriteria implements CriteriaInterface
{
    private $relationship;
    private $field;

    public function __construct($relationshipField)
    {
        [$this->relationship, $this->field] = explode('.', $relationshipField);
    }

    public function apply(Builder $query, $value)
    {
        return $query->whereHas($this->relationship, function ($query) use ($value) {
            $query->where($this->field, '=', $value);
        });
    }
}
