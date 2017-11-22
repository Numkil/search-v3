<?php

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\Type;

/**
 * DayOfWeek class.
 */
class DayOfWeek
{

    /**
     * @var array
     * @Type("array<string>")
     */
    protected $days;

    /**
     * @var string
     * @Type("string")
     */
    protected $opens;

    /**
     * @var string
     * @Type("string")
     */
    protected $closes;

    /**
     * @return array
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param array $days
     */
    public function setDays($days)
    {
        $this->days = $days;
    }

    /**
     * @return string
     */
    public function getOpens()
    {
        return $this->opens;
    }

    /**
     * @param string $opens
     */
    public function setOpens($opens)
    {
        $this->opens = $opens;
    }

    /**
     * @return string
     */
    public function getCloses()
    {
        return $this->closes;
    }

    /**
     * @param string $closes
     */
    public function setCloses($closes)
    {
        $this->closes = $closes;
    }

}