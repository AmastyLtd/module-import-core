<?php

declare(strict_types=1);

namespace Amasty\ImportCore\Import\Config\OptionSource;

use Amasty\ImportCore\Import\Config\EntityConfigProvider;
use Amasty\ImportCore\Import\Utils\Hash;
use Magento\Framework\Data\OptionSourceInterface;

class Entities implements OptionSourceInterface
{
    /**
     * @var EntityConfigProvider
     */
    private $entityConfigProvider;

    /**
     * @var Hash
     */
    private $hash;

    public function __construct(
        EntityConfigProvider $entityConfigProvider,
        Hash $hash
    ) {
        $this->entityConfigProvider = $entityConfigProvider;
        $this->hash = $hash;
    }

    public function toOptionArray(): array
    {
        $result = [];
        $entitiesConfig = $this->entityConfigProvider->getConfig();
        foreach ($entitiesConfig as $entity) {
            if ($entity->isHiddenInLists()) {
                continue;
            }
            if ($entity->getGroup()) {
                $groupKey = $this->hash->hash($entity->getGroup());
                if (!isset($result[$groupKey])) {
                    $result[$groupKey] = [
                        'label' => $entity->getGroup(),
                        'optgroup' => [],
                        'value' => $groupKey
                    ];
                }
                $result[$groupKey]['optgroup'][] = [
                    'label' => $entity->getName(),
                    'value' => $entity->getEntityCode()
                ];
            } else {
                $result[] = [
                    'label' => $entity->getName(),
                    'value' => $entity->getEntityCode()
                ];
            }
        }

        return array_values($result);
    }
}
