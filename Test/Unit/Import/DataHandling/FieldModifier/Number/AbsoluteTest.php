<?php

declare(strict_types=1);

namespace Amasty\ImportCore\Test\Unit\Import\DataHandling\FieldModifier\Number;

use Amasty\ImportCore\Import\DataHandling\FieldModifier\Number\Absolute;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Amasty\ImportCore\Import\DataHandling\FieldModifier\Number\Absolute
 */
class AbsoluteTest extends TestCase
{
    /**
     * @var Absolute
     */
    private $modifier;

    protected function setUp(): void
    {
        $this->modifier = new Absolute([]);
    }

    /**
     * @param mixed $value
     * @param mixed $expectedResult
     * @dataProvider transformDataProvider
     */
    public function testTransform($value, $expectedResult)
    {
        $this->assertEquals($expectedResult, $this->modifier->transform($value));
    }

    /**
     * Data provider for transform
     * @return array
     */
    public function transformDataProvider(): array
    {
        return [
            [1, 1],
            [0, 0],
            [-1, 1]
        ];
    }
}
