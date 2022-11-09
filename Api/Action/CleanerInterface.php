<?php

namespace Amasty\ImportCore\Api\Action;

use Amasty\ImportCore\Api\ImportProcessInterface;

/**
 * Cleaner of auxiliary import data
 */
interface CleanerInterface
{
    /**
     * Performs data cleanup
     *
     * @param ImportProcessInterface $importProcess
     * @return void
     */
    public function clean(ImportProcessInterface $importProcess): void;
}
