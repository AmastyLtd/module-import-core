<?php

declare(strict_types=1);

namespace Amasty\ImportCore\Import\Action\Import\File;

use Amasty\ImportCore\Api\ActionInterface;
use Amasty\ImportCore\Api\Action\FileUploaderInterface;
use Amasty\ImportCore\Api\ImportProcessInterface;

class UploadAction implements ActionInterface
{
    public function initialize(ImportProcessInterface $importProcess): void
    {
        $fileUploaderConfig = $importProcess->getEntityConfig()->getFileUploaderConfig();
        if (empty($fileUploaderConfig)
            || empty($importProcess->getProfileConfig()->getImagesFileDirectory())
        ) {
            return;
        }

        $fileUploader = $fileUploaderConfig->getFileUploader();
        if (!$fileUploader instanceof FileUploaderInterface) {
            $fileUploaderClass = $fileUploaderConfig->getFileUploaderClass();
            throw new \RuntimeException(
                'Class ' . $fileUploaderClass . ' doesn\'t implement ' . FileUploaderInterface::class
            );
        }
        $fileUploader->initialize($importProcess);
    }

    public function execute(ImportProcessInterface $importProcess): void
    {
        $fileUploaderConfig = $importProcess->getEntityConfig()->getFileUploaderConfig();
        if (empty($fileUploaderConfig)) {
            return;
        }

        $fileUploader = $fileUploaderConfig->getFileUploader();
        if (!$fileUploader instanceof FileUploaderInterface) {
            $fileUploaderClass = $fileUploaderConfig->getFileUploaderClass();
            throw new \RuntimeException(
                'Class ' . $fileUploaderClass . ' doesn\'t implement ' . FileUploaderInterface::class
            );
        }
        $fileUploader->execute($importProcess);
    }
}
