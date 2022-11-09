<?php

declare(strict_types=1);

namespace Amasty\ImportCore\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class ConfigProvider
{
    public const MULTI_PROCESS = 'multi_process';
    public const MULTI_PROCESS_ENABLED = self::MULTI_PROCESS . '/enabled';
    public const MULTI_PROCESS_COUNT = self::MULTI_PROCESS . '/max_process_count';

    private const PATH_PREFIX = 'amasty_import/';

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
}
