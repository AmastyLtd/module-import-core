<?php

declare(strict_types=1);

/**
 * @author Amasty Team
 * @copyright Copyright (c) Amasty (https://www.amasty.com)
 * @package Import Core for Magento 2 (System)
 */

namespace Amasty\ImportCore\Import\Config\Eav\Attribute;

use Amasty\ImportExportCore\Api\Config\ConfigClass\ArgumentInterface;
use Amasty\ImportExportCore\Config\Xml\ArgumentsPrepare;
use Magento\Eav\Api\Data\AttributeInterface;

class OptionsConverter
{
    /**
     * @var ArgumentsPrepare
     */
    private $argumentsPreparer;

    public function __construct(ArgumentsPrepare $argumentsPreparer)
    {
        $this->argumentsPreparer = $argumentsPreparer;
    }

    /**
     * Convert option array to config argument instances
     *
     * @param array $options
     * @param string $argumentName
     *
     * @return ArgumentInterface[]
     */
    public function toConfigArguments(array $options, string $argumentName): array
    {
        $argumentData = $this->prepareForConvert($options, $argumentName);

        return count($argumentData['item'])
            ? $this->argumentsPreparer->execute([$argumentData])
            : [];
    }

    public function getConfigArgumentDataType(AttributeInterface $attribute): array
    {
        $argumentData = [
            'name' => 'dataType',
            'xsi:type' => 'string',
            'value' => $attribute->getFrontendInput()
        ];

        return $this->argumentsPreparer->execute([$argumentData]);
    }

    /**
     * Prepare option for convert
     *
     * @param array $options
     * @param string|int $argumentName
     *
     * @return array
     */
    private function prepareForConvert(array $options, $argumentName): array
    {
        $result = [
            'name' => $argumentName,
            'xsi:type' => 'array',
            'item' => []
        ];

        foreach ($options as $index => $option) {
            $value = $option['value'] ?? '';
            if (is_string($value) && empty($value)) {
                continue;
            }

            if (is_array($value)) {
                $result['item'][] = $this->prepareForConvert($value, $index);
            } else {
                $result['item'][] = [
                    'name' => $index,
                    'xsi:type' => 'array',
                    'item' => [
                        [
                            'name' => 'value',
                            'xsi:type' => $this->getXsiType($value),
                            'value' => $value
                        ],
                        [
                            'name' => 'label',
                            'xsi:type' => 'string',
                            'value' => (string)$option['label']
                        ]
                    ]
                ];
            }
        }

        return $result;
    }

    /**
     * Get xsi:type of option value
     *
     * @param mixed $value
     *
     * @return string
     */
    private function getXsiType($value): string
    {
        if (is_numeric($value) && !is_string($value)) {
            return 'number';
        }

        return 'string';
    }
}
