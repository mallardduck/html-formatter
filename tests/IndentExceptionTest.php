<?php

declare(strict_types=1);

namespace MallardDuck\HtmlFormatter\Tests;

use Iterator;
use MallardDuck\HtmlFormatter\Exceptions\IndentException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MallardDuck\HtmlFormatter\Exceptions\IndentException
 */
final class IndentExceptionTest extends TestCase
{
    /**
     * @dataProvider providerIndentExceptionMessage
     *
     * @param  string      $message
     * @param  string|null $data
     * @param  string      $expected
     * @return void
     */
    public function testIndentException(string $message, ?string $data, string $expected)
    {
        $this->expectException(IndentException::class);
        $this->expectExceptionMessage($expected);
        throw new IndentException($message, $data);
    }

    /**
     * Data provider.
     *
     * @return \Iterator <int, array <int, string|null>>
     */
    public function providerIndentExceptionMessage(): Iterator
    {
        yield ['My message.', 'My leftover', 'My message. Extra content left at the end: My leftover'];
        yield ['My message.', null, 'My message.'];
        yield ['My message.', '', 'My message.'];
    }
}
