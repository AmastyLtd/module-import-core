<?php

namespace Amasty\ImportCore\Api\Filter;

use Amasty\ImportCore\Api\Config\Entity\Field\FieldInterface;
use Amasty\ImportCore\Api\Config\Profile\FieldFilterInterface;

/**
 * Filter meta
 */
interface FilterMetaInterface
{
    /**
     * @param FieldInterface $field
     * @return array
     */
    public function getJsConfig(FieldInterface $field): array;

    /**
     * @param FieldInterface $field
     * @return array
     */
    public function getConditions(FieldInterface $field): array;

    /**
     * @param FieldFilterInterface $filter
     * @param $value
     * @return FilterMetaInterface
     */
    public function prepareConfig(FieldFilterInterface $filter, $value): FilterMetaInterface;

    /**
     * @param FieldFilterInterface $filter
     * @return mixed
     */
    public function getValue(FieldFilterInterface $filter);
}
