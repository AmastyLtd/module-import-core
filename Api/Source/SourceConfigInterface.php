<?php

namespace Amasty\ImportCore\Api\Source;

interface SourceConfigInterface
{
    /**
     * Get source config using source type Id
     *
     * @param string $type
     * @return array
     */
    public function get(string $type): array;

    /**
     * Get all sources configs
     *
     * @return array
     */
    public function all(): array;
}
