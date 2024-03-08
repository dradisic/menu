<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function all($columns = ['*']);
    public function find($id, $columns = ['*']);
    public function findBy(array $criteria, $columns = ['*']);
}
