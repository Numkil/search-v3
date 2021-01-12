<?php

namespace CultuurNet\SearchV3\Parameter;

/**
 * Provides a parameter to search on price.
 */
class Price extends AbstractParameter
{
    public function __construct(float $price)
    {
        $this->value = $price;
        $this->key = 'price';
    }
}
