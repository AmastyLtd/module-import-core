<?php

namespace Amasty\ImportCore\Api\Filter;

interface FieldFilterInterface
{
    /**
     * Applies field filter to data row
     *
     * @param array $row
     * @param string $fieldName
     * @return bool
     */
    public function apply(array $row, string $fieldName): bool;
}
