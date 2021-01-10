<?php

namespace Tests\Unit;

use App\Services\DurationStringParser;
use PHPUnit\Framework\TestCase;

class DurationStringParserTest extends TestCase
{

    public function test_parse_duration()
    {
        $parser = new DurationStringParser();

        $this->assertEquals($parser->parse("10h"), 36000);
        $this->assertEquals($parser->parse("50m"), 3000);
        $this->assertEquals($parser->parse("300s"), 300);
        $this->assertEquals($parser->parse("300"), 300);
        $this->assertEquals($parser->parse("1h15m20"), 4520);
        $this->assertEquals($parser->parse("5d2h"), 439200);
        $this->assertEquals($parser->parse("5d20s"), 432020);

        $this->assertEquals($parser->parse("-50m"), 0);
        $this->assertEquals($parser->parse("-300s"), 0);
        $this->assertEquals($parser->parse("-300"), 0);
        $this->assertEquals($parser->parse("1h-15m20"), 3600);
        $this->assertEquals($parser->parse("trara"), 0);
        $this->assertEquals($parser->parse("12trara"), 12);
    }
}
