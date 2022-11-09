<?php

declare(strict_types=1);

namespace Amasty\ImportCore\Import\Config;

use Amasty\ImportCore\Api\Config\EntityConfigExtensionInterface;
use Amasty\ImportCore\Api\Config\EntityConfigExtensionInterfaceFactory;
use Amasty\ImportCore\Api\Config\EntityConfigInterface;
use Magento\Framework\DataObject;

class EntityConfig extends DataObject implements EntityConfigInterface
{
    public const ENTITY_CODE = 'entity_code';
    public const NAME = 'name';
    public const GROUP = 'group';
    public const DESCRIPTION = 'description';
    public const IS_HIDDEN_IN_LISTS = 'is_hidden_in_lists';
    public const BEHAVIORS = 'behaviors';
    public const INDEXER_CONFIG = 'indexer_config';
    public const FILE_UPLOADER_CONFIG = 'file_uploader_config';
    public const FIELDS_CONFIG = 'fields_config';
    public const EXTENSION_ATTRIBUTES = 'extension_attributes';

    /**
     * @var EntityConfigExtensionInterfaceFactory
     */
    private $extensionAttributesFactory;

    public function __construct(
        EntityConfigExtensionInterfaceFactory $extensionAttributesFactory,
        array $data = []
    ) {
        parent::__construct($data);
        $this->extensionAttributesFactory = $extensionAttributesFactory;
    }

    /**
     * @inheritDoc
     */
    public function getEntityCode()
    {
        return $this->getData(self::ENTITY_CODE);
    }

    /**
     * @inheritDoc
     */
    public function setEntityCode($entityCode)
    {
        $this->setData(self::ENTITY_CODE, $entityCode);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        $this->setData(self::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getGroup()
    {
        return $this->getData(self::GROUP);
    }

    /**
     * @inheritDoc
     */
    public function setGroup($group)
    {
        $this->setData(self::GROUP, $group);
    }

    /**
     * @inheritDoc
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * @inheritDoc
     */
    public function setDescription($description)
    {
        $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * @inheritDoc
     */
    public function isHiddenInLists()
    {
        return $this->getData(self::IS_HIDDEN_IN_LISTS);
    }

    /**
     * @inheritDoc
     */
    public function setHiddenInLists($isHiddenInLists)
    {
        $this->setData(self::IS_HIDDEN_IN_LISTS, $isHiddenInLists);
    }

    /**
     * @inheritDoc
     */
    public function getBehaviors()
    {
        return $this->getData(self::BEHAVIORS);
    }

    /**
     * @inheritDoc
     */
    public function setBehaviors($behaviors)
    {
        $this->setData(self::BEHAVIORS, $behaviors);
    }

    /**
     * @inheritDoc
     */
    public function getIndexerConfig()
    {
        return $this->getData(self::INDEXER_CONFIG);
    }

    /**
     * @inheritDoc
     */
    public function setIndexerConfig($indexerConfig)
    {
        $this->setData(self::INDEXER_CONFIG, $indexerConfig);
    }

    /**
     * @inheritDoc
     */
    public function getFileUploaderConfig()
    {
        return $this->getData(self::FILE_UPLOADER_CONFIG);
    }

    /**
     * @inheritDoc
     */
    public function setFileUploaderConfig($fileUploaderConfig)
    {
        $this->setData(self::FILE_UPLOADER_CONFIG, $fileUploaderConfig);
    }

    /**
     * @inheritDoc
     */
    public function getFieldsConfig()
    {
        return $this->getData(self::FIELDS_CONFIG);
    }

    /**
     * @inheritDoc
     */
    public function setFieldsConfig($fieldsConfig)
    {
        $this->setData(self::FIELDS_CONFIG, $fieldsConfig);
    }

    /**
     * @inheritDoc
     */
    public function getExtensionAttributes(): EntityConfigExtensionInterface
    {
        if (!$this->hasData(self::EXTENSION_ATTRIBUTES)) {
            $this->setExtensionAttributes($this->extensionAttributesFactory->create());
        }

        return $this->getData(self::EXTENSION_ATTRIBUTES);
    }

    /**
     * @inheritDoc
     */
    public function setExtensionAttributes(
        EntityConfigExtensionInterface $extensionAttributes
    ): void {
        $this->setData(self::EXTENSION_ATTRIBUTES, $extensionAttributes);
    }
}
