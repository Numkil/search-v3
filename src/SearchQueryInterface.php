<?php

namespace CultuurNet\SearchV3;

/**
 * SearchQuery
 */
interface SearchQueryInterface
{
    /**
    * Sorting options.
    */
    const SORT_DIRECTION_ASC = 'asc';
    const SORT_DIRECTION_DESC = 'desc';

    public function addParameter(ParameterInterface $parameter): void;

    public function removeParameter(ParameterInterface $parameter): void;

    public function getParameters(): array;

    public function addSort(string $field, string $direction): void;

    public function removeSort(string $field): void;

    public function getSort(): array;

    public function setEmbed(bool $embed): void;

    public function setStart(int $start);

    public function setLimit(int $limit);

    public function toArray(): array;
}
