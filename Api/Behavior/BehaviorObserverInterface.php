<?php

declare(strict_types=1);

namespace Amasty\ImportCore\Api\Behavior;

/**
 * Observer of behavior events
 */
interface BehaviorObserverInterface
{
    /**#@+
     * Behavior event types
     */
    public const BEFORE_APPLY = 'beforeApply';
    public const AFTER_APPLY = 'afterApply';
    /**#@-*/

    /**
     * Execute behavior observer logic
     *
     * @param array $data
     * @return void
     */
    public function execute(array &$data): void;
}
