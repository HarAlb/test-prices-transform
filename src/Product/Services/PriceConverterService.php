<?php

namespace Src\Product\Services;

use Src\Currency\Currency;
use Src\Product\Services\Contracts\PriceConverterInterface;

class PriceConverterService implements PriceConverterInterface
{
    public function convertAndFormat(float $price, Currency $fromCurrency, Currency $targetCurrency): string
    {
        $priceInBase = $price * $fromCurrency->conversion_rate;

        $convertedPrice = $priceInBase / $targetCurrency->conversion_rate;

        $formatted = $this->formatPrice($convertedPrice, $targetCurrency);

        return $formatted;
    }

    private function formatPrice(float $amount, Currency $currency): string
    {
        return match ($currency->iso_name) {
            'USD' => $currency->icon . ' ' . number_format($amount, 2),
            'EUR' => $currency->icon . ' ' . number_format($amount, 2),
            'RUB' => number_format($amount, 0, '.', ' ') . ' ' . $currency->icon,
            default => number_format($amount, 2) . ' ' . $currency->icon,
        };
    }
}
