<?php

namespace Amasty\ImportCore\Api\FileResolver;

use Amasty\ImportCore\Api\ImportProcessInterface;

interface FileResolverInterface
{
    /**
     * Resolves import source file
     *
     * @param ImportProcessInterface $importProcess
     * @return string File path
     */
    public function execute(ImportProcessInterface $importProcess): string;
}
