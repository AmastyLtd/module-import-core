<?php

namespace Amasty\ImportCore\Api\Filter;

use Amasty\ImportCore\Api\Config\Profile\FieldFilterInterface;

/**
 * Filter of certain type
 */
interface FilterInterface
{
    /**
     * @param array $row
     * @param string $fieldName
     * @param FieldFilterInterface $filter
     * @return bool
     */
    public function filter(array $row, string $fieldName, FieldFilterInterface $filter): bool;
}
