<?php

namespace Amasty\ImportCore\Api\FileResolver;

interface FileResolverConfigInterface
{
    /**
     * Get file resolver config using file resolver type Id
     *
     * @param string $type
     * @return array
     */
    public function get(string $type): array;

    /**
     * Get all file resolvers configs
     *
     * @return array
     */
    public function all(): array;
}
