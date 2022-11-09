<?php

declare(strict_types=1);

namespace Amasty\ImportCore\Model\Batch;

use Magento\Framework\Model\AbstractModel;

/**
 * @method self setProcessIdentity(string $processIdentity)
 * @method string getProcessIdentity()
 * @method self setBatchData(array $serializedData)
 * @method array getBatchData()
 */
class Batch extends AbstractModel
{
    public const ID = 'id';
    public const CREATED_AT = 'created_at';
    public const PROCESS_IDENTITY = 'process_identity';
    public const BATCH_DATA = 'batch_data';

    public function _construct()
    {
        parent::_construct();
        $this->_init(ResourceModel\Batch::class);
        $this->setIdFieldName(self::ID);
    }
}
