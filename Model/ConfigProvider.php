<?php

declare(strict_types=1);

namespace Amasty\ImportCore\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class ConfigProvider
{
    public const MULTI_PROCESS_ENABLED = 'multi_process/enabled';
    public const MULTI_PROCESS_COUNT = 'multi_process/max_process_count';
    public const DEBUG_MODE = 'advanced/debug';
    public const NO_MEMORY_LIMIT = 'advanced/no_memory_limit';

    private const PATH_PREFIX = 'amasty_import/';
    public const DEBUG_LOG_PATH = 'var/log/amasty_import_debug.log';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function useMultiProcess(): bool
    {
        return $this->scopeConfig->isSetFlag(self::PATH_PREFIX . self::MULTI_PROCESS_ENABLED);
    }

    public function getMaxProcessCount(): int
    {
        return (int)$this->scopeConfig->getValue(self::PATH_PREFIX . self::MULTI_PROCESS_COUNT);
    }

    public function isDebugEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::PATH_PREFIX . self::DEBUG_MODE);
    }

    public function isNoMemoryLimit(): bool
    {
        return $this->scopeConfig->isSetFlag(self::PATH_PREFIX . self::NO_MEMORY_LIMIT);
    }
}
