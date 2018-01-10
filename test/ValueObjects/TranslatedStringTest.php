<?php

namespace CultuurNet\SearchV3\Test\ValueObjects;

use CultuurNet\SearchV3\ValueObjects\TranslatedString;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\JsonDeserializationVisitor;

class TranslatedStringTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test the getValueForLanguage method.
     */
    public function testGetValueForLanguage()
    {
        $string = new TranslatedString(['nl' => 'test nl']);
        $this->assertEquals('test nl', $string->getValueForLanguage('nl'));
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $string = new TranslatedString();
        $string->setValues(['nl' => 'test nl']);
        $this->assertEquals(['nl' => 'test nl'], $string->getValues());
    }

    /**
     * Test the deserialize method.
     */
    public function testDeserializeMethod()
    {
        $visitor = $this->getMockBuilder(JsonDeserializationVisitor::class)
            ->disableOriginalConstructor()
            ->getMock();

        $context = $this->getMockBuilder(DeserializationContext::class)
            ->disableOriginalConstructor()
            ->getMock();

        $string = new TranslatedString();
        $string->deserializeFromJson($visitor, 'value', $context);
        $this->assertEquals(['nl' => 'value'], $string->getValues());

        $string = new TranslatedString();
        $string->deserializeFromJson($visitor, ['test1', 'test2'], $context);
        $this->assertEquals(['test1', 'test2'], $string->getValues());
    }
}