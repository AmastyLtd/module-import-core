<?php

namespace Amasty\ImportCore\Api;

use Amasty\ImportCore\Api\Config\EntityConfigInterface;
use Amasty\ImportCore\Api\Config\ProfileConfigInterface;
use Magento\Framework\App\RequestInterface;

interface FormInterface
{
    /**
     * @param EntityConfigInterface $entityConfig
     * @param array $arguments
     * @return array
     */
    public function getMeta(EntityConfigInterface $entityConfig, array $arguments = []): array;

    /**
     * @param ProfileConfigInterface $profileConfig
     * @return array
     */
    public function getData(ProfileConfigInterface $profileConfig): array;

    /**
     * @param ProfileConfigInterface $profileConfig
     * @param RequestInterface $request
     * @return FormInterface
     */
    public function prepareConfig(
        ProfileConfigInterface $profileConfig,
        RequestInterface $request
    ): FormInterface;
}
