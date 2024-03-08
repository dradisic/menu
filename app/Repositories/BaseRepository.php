<?php

namespace App\Repositories;

use App\Repositories\Criteria\EqualsCriteria;
use App\Repositories\Criteria\LikeCriteria;
use App\Repositories\Criteria\RelationshipCriteria;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $criteriaClasses = [
        'equals' => EqualsCriteria::class,
        'like' => LikeCriteria::class,
        'relationship' => RelationshipCriteria::class,
    ];

    protected string $model;


    public function __construct(string $modelClass)
    {
        $this->model = $modelClass;
    }

    protected function newQuery()
    {
        return app($this->model)->newQuery();
    }

    public function all($columns = ['*'])
    {
        return $this->newQuery()->get($columns);
    }

    public function find($id, $columns = ['*'])
    {
        return $this->newQuery()->find($id, $columns);
    }

    public function findBy(array $criteria, $columns = ['*'])
    {
        $query = $this->newQuery();

        foreach ($criteria as $type => $conditions) {
            foreach ($conditions as $field => $value) {
                // Instantiate the criteria class based on the type and apply it to the query
                $criteriaClass = $this->resolveCriteriaClass($type, $field);
                $query = $criteriaClass->apply($query, $value);
            }
        }

        return $query->first($columns);
    }

    protected function resolveCriteriaClass($type, $field)
    {
        if (!isset($this->criteriaClasses[$type])) {
            throw new \InvalidArgumentException("Criteria type {$type} is not defined.");
        }

        return new $this->criteriaClasses[$type]($field);
    }
}
