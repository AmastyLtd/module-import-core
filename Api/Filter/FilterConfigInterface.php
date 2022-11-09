<?php

namespace Amasty\ImportCore\Api\Filter;

interface FilterConfigInterface
{
    /**
     * Get filer config using filter type Id
     *
     * @param string $type
     * @return array
     */
    public function get(string $type): array;

    /**
     * Get all filters configs
     *
     * @return array
     */
    public function all(): array;
}
