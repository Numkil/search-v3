<?php

namespace CultuurNet\SearchV3\Test\ValueObjects;

use CultuurNet\SearchV3\ValueObjects\BookingInfo;
use CultuurNet\SearchV3\ValueObjects\TranslatedString;

class BookingInfoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BookingInfo
     */
    protected $bookingInfo;

    public function setUp()
    {
        $this->bookingInfo = new BookingInfo();
    }

    public function testGetPhoneMethod()
    {
        $this->bookingInfo->setPhone('0123456789');

        $result = $this->bookingInfo->getPhone();
        $this->assertEquals('0123456789', $result);
    }

    public function testGetEmailMethod()
    {
        $this->bookingInfo->setEmail('email@gmail.com');

        $result = $this->bookingInfo->getEmail();
        $this->assertEquals('email@gmail.com', $result);
    }

    public function testGetUrlMethod()
    {
        $this->bookingInfo->setUrl('bookingUrl.com');

        $result = $this->bookingInfo->getUrl();
        $this->assertEquals('bookingUrl.com', $result);
    }

    public function testGetUrlLabelMethod()
    {
        $urlLabel = new TranslatedString(['nl' => 'Koop tickets']);
        $this->bookingInfo->setUrlLabel($urlLabel);

        $result = $this->bookingInfo->getUrlLabel();
        $this->assertInstanceOf('CultuurNet\SearchV3\ValueObjects\TranslatedString', $result);
        $this->assertEquals($urlLabel, $result);
    }
}
