<?php
/**
 * @author Amasty Team
 * @copyright Copyright (c) Amasty (https://www.amasty.com)
 * @package Import Core for Magento 2 (System)
 */

namespace Amasty\ImportCore\Api\Config\Entity;

/**
 * Entity behavior config
 */
interface BehaviorInterface
{
    /**
     * @return string
     */
    public function getCode();

    /**
     * @param string $code
     *
     * @return void
     */
    public function setCode($code);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     *
     * @return void
     */
    public function setName($name);

    /**
     * @return array
     */
    public function getExecuteOnCodes();

    /**
     * @param array $behaviorCodes
     * @return void
     */
    public function setExecuteOnCodes(array $behaviorCodes);

    /**
     * @return \Amasty\ImportExportCore\Api\Config\ConfigClass\ConfigClassInterface
     */
    public function getConfigClass();

    /**
     * @param \Amasty\ImportExportCore\Api\Config\ConfigClass\ConfigClassInterface $configClass
     *
     * @return void
     */
    public function setConfigClass($configClass);
}
