<?php

declare(strict_types=1);

namespace Amasty\ImportCore\Test\Unit\Import\DataHandling\FieldModifier;

use Amasty\ImportCore\Import\DataHandling\FieldModifier\Strip;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Amasty\ImportCore\Import\DataHandling\FieldModifier\Strip
 */
class StripTest extends TestCase
{
    /**
     * @var Strip
     */
    private $modifier;

    protected function setUp(): void
    {
        $this->modifier = new Strip([]);
    }

    /**
     * @param string $value
     * @param string $expectedResult
     * @dataProvider transformDataProvider
     */
    public function testTransform(string $value, string $expectedResult)
    {
        $this->assertSame($expectedResult, $this->modifier->transform($value));
    }

    /**
     * Data provider for transform
     * @return array
     */
    public function transformDataProvider(): array
    {
        return [
            'without_tags' => ['test', 'test'],
            'simple_test' => ['<b><i>test</i></b>', 'test'],
            'only_tags' => ['<i></i>', '']
        ];
    }
}
