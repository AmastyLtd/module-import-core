<?php

namespace Amasty\ImportCore\Import\Config\Source\Type\TableConfigAdapter\Builder;

use Amasty\ImportCore\Import\Config\ProfileConfig;

interface BuilderInterface
{
    /**
     * @param ProfileConfig $profileConfig
     * @param array $data
     * @return array
     */
    public function build(ProfileConfig $profileConfig, array $data): array;
}
