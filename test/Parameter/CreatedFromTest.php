<?php

namespace CultuurNet\SearchV3\Parameter\Test;

use CultuurNet\SearchV3\Parameter\CreatedFrom;

class CreatedFromTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $dateTime = new \DateTime('21-12-2017T10:00:00+01:00');
        $id = new CreatedFrom($dateTime);

        $key = $id->getKey();
        $value = $id->getValue();

        $this->assertEquals('createdFrom', $key);
        $this->assertEquals('2017-12-21T10:00:00+01:00', $value);
    }

    public function testConstructorWithWildcard()
    {
        $wildCard = '*';
        $id = new CreatedFrom($wildCard);

        $key = $id->getKey();
        $value = $id->getValue();

        $this->assertEquals('createdFrom', $key);
        $this->assertEquals('*', $value);
    }
}
