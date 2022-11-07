<?php declare(strict_types=1);

namespace IW\Test\Workshop;

use PHPUnit\Framework\TestCase;

use IW\Workshop\DateFormatter;
use DateTime;

class DateFormatterTest extends TestCase
{
    /**
     * @var DateFormatter
     */
    private DateFormatter $dateFormatter;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->dateFormatter = new DateFormatter();
        parent::setUp();
    }

    /**
     * @return \string[][]
     */
    public function dayTimeProvider(): array
    {
        return [
            ['00:00:00', 'Night'],
            ['03:00:00', 'Night'],
            ['05:59:59', 'Night'],
            ['06:00:00', 'Morning'],
            ['09:00:00', 'Morning'],
            ['11:59:59', 'Morning'],
            ['12:00:00', 'Afternoon'],
            ['15:00:00', 'Afternoon'],
            ['17:59:59', 'Afternoon'],
            ['18:00:00', 'Evening'],
            ['21:00:00', 'Evening'],
            ['23:55:55', 'Evening'],
        ];
    }

    /**
     * @dataProvider dayTimeProvider
     * @throws \Exception
     */
    public function testDateTime($time, $partOfDay)
    {
        $time = new DateTime($time);
        $this->assertEquals($partOfDay, $this->dateFormatter->getPartOfDay($time));
    }
}
