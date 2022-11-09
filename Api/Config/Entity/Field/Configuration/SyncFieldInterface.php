<?php

declare(strict_types=1);

namespace Amasty\ImportCore\Api\Config\Entity\Field\Configuration;

/**
 * Field value synchronization config
 */
interface SyncFieldInterface
{
    /**
     * @param string $entityName
     * @return void
     */
    public function setEntityName(string $entityName): void;

    /**
     * @return string
     */
    public function getEntityName(): string;

    /**
     * @param string $fieldName
     * @return void
     */
    public function setFieldName(string $fieldName): void;

    /**
     * @return string
     */
    public function getFieldName(): string;

    /**
     * @param string $fieldName
     * @return void
     */
    public function setSynchronizationFieldName(string $fieldName): void;

    /**
     * @return string
     */
    public function getSynchronizationFieldName(): string;
}
