<?php

namespace Src\Product\Services\Contracts;

use Src\Currency\Currency;

interface PriceConverterInterface
{
    public function convertAndFormat(float $price, Currency $fromCurrency, Currency $targetCurrency): string;
}

