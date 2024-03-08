<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;
use RectorLaravel\Set\LaravelSetList;

return RectorConfig::configure()
                   ->withPaths([
                       __DIR__ . '/app',
                       __DIR__ . '/tests',
                   ])
                   ->withSets([
                       SetList::PHP_74,
                       SetList::PHP_80,
                       SetList::PHP_81,
                       SetList::PHP_82
                   ])
                   ->withPreparedSets(deadCode: true);
