<?php

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

class MinAgeTest extends TestCase
{
    public function testConstructor(): void
    {
        $id = new MinAge('12');

        $key = $id->getKey();
        $value = $id->getValue();

        $this->assertEquals($key, 'minAge');
        $this->assertEquals($value, '12');
    }
}
