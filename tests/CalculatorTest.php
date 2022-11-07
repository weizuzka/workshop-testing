<?php declare(strict_types=1);

namespace IW\Test\Workshop;

use PHPUnit\Framework\TestCase;

use IW\Workshop\Calculator;
use InvalidArgumentException;

class CalculatorTest extends TestCase
{
    /**
     * @var Calculator
     */
    private Calculator $calculator;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->calculator = new Calculator();
        parent::setUp();
    }

    public function addProvider(): array
    {
        return [
            [0, 0, 0],
            [1, 1, 2],
            [-5, -5, -10],
            [4, -8, -4],
            [4.25, 5.75, 10],
            [-34.5, 54.5, 20],
            [-3.25, -4.75, -8],
        ];
    }

    /**
     * @dataProvider addProvider
     */
    public function testAdd(float $a, float $b, float $result): void
    {
        $this->assertEquals($result, $this->calculator->add($a, $b));
    }

    public function divideProvider(): array
    {
        return [
            [0, 1, 0],
            [2, 2, 1],
            [0.2, 0.2, 1],
            [-0.3, -0.3, 1],
            [-0.3, 0.3, -1],
            [-2, -4, 0.5],
            [-2, 4, -0.5],
            [10, 3, 10 / 3],
            [0.5, 2, 0.25],
            [0.5, 0.25, 2],
            [-0.5, 0.25, -2],
        ];
    }

    /**
     * @dataProvider divideProvider
     */
    public function testDivide(float $a, float $b, float $result): void
    {
        $this->assertEquals($result, $this->calculator->divide($a, $b));
    }

    /**
     * @return void
     */
    public function testDivideByZero(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->calculator->divide(0, 0);
    }
}
