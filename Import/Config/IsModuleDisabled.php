<?php
/**
 * @author Amasty Team
 * @copyright Copyright (c) Amasty (https://www.amasty.com)
 * @package Import Core for Magento 2 (System)
 */

namespace Amasty\ImportCore\Import\Config;

use Magento\Framework\Module\Manager;

class IsModuleDisabled
{
    /**
     * @var string
     */
    private $moduleName;

    /**
     * @var Manager
     */
    private $moduleManager;

    public function __construct(
        Manager $moduleManager,
        array $config = []
    ) {
        $this->moduleName = $config['moduleName'] ?? '';
        $this->moduleManager = $moduleManager;
    }

    public function isEnabled(): bool
    {
        return !empty($this->moduleName) && !$this->moduleManager->isEnabled($this->moduleName);
    }
}
