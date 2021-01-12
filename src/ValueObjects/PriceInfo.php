<?php

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\Type;

final class PriceInfo
{
    /**
     * @var string|null
     * @Type("string")
     */
    private $category;

    /**
     * @var TranslatedString|null
     * @Type("CultuurNet\SearchV3\ValueObjects\TranslatedString")
     */
    private $name;

    /**
     * @var string|null
     * @Type("string")
     */
    private $priceCurrency;

    /**
     * @var float|null
     * @Type("float")
     */
    private $price;

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getName(): ?TranslatedString
    {
        return $this->name;
    }

    public function setName(TranslatedString $name): void
    {
        $this->name = $name;
    }

    public function getPriceCurrency(): ?string
    {
        return $this->priceCurrency;
    }

    public function setPriceCurrency(string $priceCurrency): void
    {
        $this->priceCurrency = $priceCurrency;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}
