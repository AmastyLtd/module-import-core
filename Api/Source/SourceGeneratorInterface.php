<?php

namespace Amasty\ImportCore\Api\Source;

use Amasty\ImportCore\Import\Config\ProfileConfig;

interface SourceGeneratorInterface
{
    /**
     * Generate file content
     *
     * @param ProfileConfig $profileConfig
     * @param array $data
     * @return string
     */
    public function generate(ProfileConfig $profileConfig, array $data): string;

    /**
     * Get file extension
     *
     * @return string
     */
    public function getExtension(): string;
}
