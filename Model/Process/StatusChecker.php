<?php

declare(strict_types=1);

/**
 * @author Amasty Team
 * @copyright Copyright (c) Amasty (https://www.amasty.com)
 * @package Import Core for Magento 2 (System)
 */

namespace Amasty\ImportCore\Model\Process;

use Amasty\ImportCore\Api\ImportResultInterface;
use Amasty\ImportCore\Import\ImportResult;
use Amasty\ImportCore\Model\ConfigProvider;
use Amasty\ImportCore\Processing\JobManager;
use Amasty\ImportExportCore\Api\Process\ProcessStatusInterface;
use Amasty\ImportExportCore\Api\Process\ProcessStatusInterfaceFactory;
use Amasty\ImportExportCore\Api\Process\StatusCheckerInterface;

class StatusChecker implements StatusCheckerInterface
{
    /**
     * @var JobManager
     */
    private $jobManager;

    /**
     * @var ProcessStatusInterfaceFactory
     */
    private $processStatusFactory;

    /**
     * @var ProcessRepository
     */
    private $processRepository;

    public function __construct(
        JobManager $jobManager,
        ProcessStatusInterfaceFactory $processStatusFactory,
        ProcessRepository $processRepository
    ) {
        $this->jobManager = $jobManager;
        $this->processStatusFactory = $processStatusFactory;
        $this->processRepository = $processRepository;
    }

    public function check(string $processIdentity): ProcessStatusInterface
    {
        /** @var $process Process */
        /** @var $importResult ImportResultInterface|ImportResult */
        [$process, $importResult] = $this->jobManager->watchJob($processIdentity)
            ->getJobState();

        if ($error = $this->checkError($process, $importResult)) {
            return $error;
        }

        $processStatus = $this->processStatusFactory->create();
        if ($importResult === null) {
            $processStatus->setStatus('starting');
            $processStatus->setProceed(0);
            $processStatus->setTotal(0);
            $processStatus->setMessages([
                [
                    'type' => 'info',
                    'message' => __('Process Started')
                ]
            ]);
        } else {
            $resultMessages =
                array_merge(
                    $importResult->getMessages(),
                    $importResult->getPreparedValidationMessages(),
                    $importResult->getFilteringMessages()
                );
            $processStatus->setStatus($process->getStatus());
            $processStatus->setProceed($importResult->getRecordsProcessed());
            $processStatus->setTotal($importResult->getTotalRecords());
            $processStatus->setMessages($resultMessages);
        }

        return $processStatus;
    }

    private function checkError(Process $process, ?ImportResultInterface $importResult): ?ProcessStatusInterface
    {
        $isProcessAlive = $process->getPid() !== null
            && $this->jobManager->isPidAlive((int)$process->getPid());

        if (!$isProcessAlive) {
            $processStatus = $this->processStatusFactory->create();
            $currentStatus = $this->processRepository->checkProcessStatus((string)$process->getIdentity());
            if (!$importResult) { //when error with starting process before first action ran
                $errorMsg = __(
                    'The import process failed to launch. Please, check your PHP executable path or'
                    . ' see log for more details.'
                );
            } elseif (!in_array($currentStatus, [Process::STATUS_SUCCESS, Process::STATUS_FAILED])) {
                $errorMsg = __(
                    'The system process failed. For an error details please make sure that Debug mode is enabled '
                    . 'and see %1',
                    ConfigProvider::DEBUG_LOG_PATH
                );
                $importResult->logMessage(ImportResultInterface::MESSAGE_CRITICAL, $errorMsg);
            }

            if (isset($errorMsg)) {
                $processStatus->setMessages([
                    [
                        'type' => ImportResultInterface::MESSAGE_CRITICAL,
                        'message' => $errorMsg
                    ]
                ]);

                return $processStatus;
            }
        }

        return null;
    }
}
