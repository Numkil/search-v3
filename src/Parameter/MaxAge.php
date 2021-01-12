<?php

namespace CultuurNet\SearchV3\Parameter;

/**
 * Provides the parameter class to add maximum age.
 */
class MaxAge extends AbstractParameter
{
    public function __construct(int $value)
    {
        $this->value = $value;
        $this->key = 'maxAge';
    }
}
