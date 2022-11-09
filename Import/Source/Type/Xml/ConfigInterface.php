<?php

namespace Amasty\ImportCore\Import\Source\Type\Xml;

interface ConfigInterface
{
    /**
     * @return string
     */
    public function getItemPath();

    /**
     * @param string $itemPath
     *
     * @return void
     */
    public function setItemPath($itemPath);

    /**
     * @return string
     */
    public function getXslTemplate();

    /**
     * @param string $xslTemplate
     *
     * @return void
     */
    public function setXslTemplate($xslTemplate);
}
