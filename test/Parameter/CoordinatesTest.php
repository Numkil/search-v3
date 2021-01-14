<?php

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

class CoordinatesTest extends TestCase
{
    public function testConstructor(): void
    {
        $coordinates = new Coordinates('50.8511740', '4.3386740');

        $key = $coordinates->getKey();
        $value = $coordinates->getValue();

        $this->assertEquals($key, 'coordinates');
        $this->assertEquals($value, '50.8511740,4.3386740');
    }
}
