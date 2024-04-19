<?php

declare(strict_types=1);

namespace Doctrine\ODM\MongoDB\Aggregation\Stage\Search\Compound;

use Doctrine\ODM\MongoDB\Aggregation\Stage\Search\CompoundedSearchOperatorTrait;
use Doctrine\ODM\MongoDB\Aggregation\Stage\Search\CompoundSearchOperatorInterface;
use Doctrine\ODM\MongoDB\Aggregation\Stage\Search\SupportsCompoundableOperatorsTrait;
use Doctrine\ODM\MongoDB\Aggregation\Stage\Search\Wildcard;

/** @internal */
class CompoundedWildcard extends Wildcard implements CompoundSearchOperatorInterface
{
    use CompoundedSearchOperatorTrait;
    use SupportsCompoundableOperatorsTrait;
}
