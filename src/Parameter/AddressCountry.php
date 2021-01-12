<?php

namespace CultuurNet\SearchV3\Parameter;

final class AddressCountry extends AbstractParameter
{
    public function __construct(string $addressCountry)
    {
        $this->value = $addressCountry;
        $this->key = 'addressCountry';
    }
}
