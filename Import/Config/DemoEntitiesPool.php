<?php

declare(strict_types=1);

/**
 * @author Amasty Team
 * @copyright Copyright (c) Amasty (https://www.amasty.com)
 * @package Import Core for Magento 2 (System)
 */

namespace Amasty\ImportCore\Import\Config;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\Module\Manager;

class DemoEntitiesPool
{
    /**
     * @var DemoEntityConfig[]
     */
    private array $demoEntities;

    /**
     * @var Manager
     */
    private Manager $moduleManager;

    public function __construct(
        array $demoEntities = [],
        ?Manager $moduleManager = null
    ) {
        $this->moduleManager = $moduleManager ?? ObjectManager::getInstance()->get(Manager::class);
        $this->initializeDemoEntities($demoEntities);
    }

    /**
     * @return DemoEntityConfig[]
     */
    public function getDemoEntities(): array
    {
        return $this->demoEntities;
    }

    private function initializeDemoEntities(array $demoEntities): void
    {
        foreach ($demoEntities as $key => $entity) {
            if (!$entity instanceof DemoEntityConfig) {
                throw new \LogicException(
                    sprintf('Demo Entity must implement %s', DemoEntityConfig::class)
                );
            }
            if (isset($entity['required_modules']) && is_array($entity['required_modules'])) {
                foreach ($entity['required_modules'] as $module) {
                    if (!$this->moduleManager->isEnabled($module)) {
                        unset($demoEntities[$key]);
                    }
                }
            }
        }
        $this->demoEntities = $demoEntities;
    }
}
