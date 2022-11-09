<?php

declare(strict_types=1);

namespace Amasty\ImportCore\Import\Config\Source\Type\TableConfigAdapter\Builder;

use Amasty\ImportCore\Import\Config\ProfileConfig;
use Amasty\ImportCore\Import\Config\Source\Type\TableConfigAdapter;

class CsvBuilder implements BuilderInterface
{
    public function build(ProfileConfig $profileConfig, array $data): array
    {
        $csvSourceConfig = $profileConfig->getExtensionAttributes()->getCsvSource();
        if ($csvSourceConfig) {
            $data = [
                TableConfigAdapter::CHILD_ROW_SEPARATOR => $csvSourceConfig->getChildRowSeparator(),
                TableConfigAdapter::IS_COMBINE_CHILD_ROWS => $csvSourceConfig->isCombineChildRows(),
                TableConfigAdapter::IS_DUPLICATE_PARENT_DATA => false
            ];
        }

        return $data;
    }
}
