<?php

namespace Amasty\ImportCore\Controller\Adminhtml\Import;

use Amasty\ImportCore\Api\ImportResultInterface;
use Amasty\ImportCore\Import\ImportResult;
use Amasty\ImportCore\Model\Process\Process;
use Amasty\ImportCore\Processing\JobManager;
use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\Result\Json;

class Status extends Action
{
    public const ADMIN_RESOURCE = 'Amasty_ImportCore::import';

    /**
     * @var JobManager
     */
    private $jobManager;

    public function __construct(
        Action\Context $context,
        JobManager $jobManager
    ) {
        parent::__construct($context);
        $this->jobManager = $jobManager;
    }

    public function execute()
    {
        $result = [];

        $processIdentity = $this->getRequest()->getParam('processIdentity');
        if ($processIdentity) {

            /** @var $process Process */
            /** @var $importResult ImportResultInterface|ImportResult */
            list($process, $importResult) = $this->jobManager->watchJob($processIdentity)
                ->getJobState();
            if ($importResult === null) {
                $result = [
                    'status' =>  'starting',
                    'proceed' => 0,
                    'total' => 0,
                    'messages' => [
                        [
                            'type' => 'info',
                            'message' => __('Process Started')
                        ]
                    ]
                ];
            } else {
                $resultMessages =
                    array_merge(
                        $importResult->getMessages(),
                        $importResult->getPreparedValidationMessages(),
                        $importResult->getFilteringMessages()
                    );
                $result = [
                    'status' =>  $process->getStatus(),
                    'proceed' => $importResult->getRecordsProcessed(),
                    'total' => $importResult->getTotalRecords(),
                    'messages' => $resultMessages
                ];
            }
        } else {
            $result['error'] = __('Process Identity is not set.');
        }

        /** @var Json $resultJson */
        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $resultJson->setData($result);

        return $resultJson;
    }
}
