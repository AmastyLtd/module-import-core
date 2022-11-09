<?php

declare(strict_types=1);

namespace Amasty\ImportCore\Import\FileResolver\Type\UploadFile;

class Config implements ConfigInterface
{
    /**
     * @var string
     */
    private $hash;

    public function getHash(): string
    {
        return $this->hash;
    }

    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }
}
