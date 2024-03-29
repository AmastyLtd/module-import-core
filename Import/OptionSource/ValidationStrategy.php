<?php
/**
 * @author Amasty Team
 * @copyright Copyright (c) Amasty (https://www.amasty.com)
 * @package Import Core for Magento 2 (System)
 */

namespace Amasty\ImportCore\Import\OptionSource;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * @codeCoverageIgnore
 */
class ValidationStrategy implements OptionSourceInterface
{
    public const STOP_ON_ERROR = 0;
    public const SKIP_ERROR_ENTRIES = 1;

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $optionArray = [];

        foreach ($this->toArray() as $value => $label) {
            $optionArray[] = ['value' => $value, 'label' => $label];
        }

        return $optionArray;
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [
            self::STOP_ON_ERROR => __('Stop On Error'),
            self::SKIP_ERROR_ENTRIES => __('Skip Error Entries'),
        ];
    }
}
