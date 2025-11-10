<?php

declare(strict_types=1);

/**
 * @author Amasty Team
 * @copyright Copyright (c) Amasty (https://www.amasty.com)
 * @package Import Core for Magento 2 (System)
 */

namespace Amasty\ImportCore\Import\Validation\EntityValidator;

use Amasty\ImportCore\Api\Validation\FieldValidatorInterface;
use Magento\Catalog\Model\ResourceModel\Product as ProductResource;

class Sku implements FieldValidatorInterface
{
    /**
     * @var ProductResource
     */
    private ProductResource $productResource;

    /**
     * @var array
     */
    private array $validationResult;

    public function __construct(ProductResource $productResource)
    {
        $this->productResource = $productResource;
    }

    public function validate(array $row, string $field): bool
    {
        if (isset($row[$field])) {
            $sku = trim($row[$field]);

            if (!empty($sku)) {
                if (!isset($this->validationResult[$sku])) {
                    $this->validationResult[$sku] = $this->productResource->getIdBySku($sku) !== false;
                }

                return $this->validationResult[$sku];
            }
        }

        return true;
    }
}
