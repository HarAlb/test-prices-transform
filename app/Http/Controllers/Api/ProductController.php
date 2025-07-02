<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Src\Currency\Currency;
use Src\Product\Product;
use Src\Product\Resources\ProductResource;
use Src\Product\Services\Contracts\PriceConverterInterface;

class ProductController extends Controller
{
   public function __invoke(PriceConverterInterface $converter)
   {
       $toCurrency = Currency::query()->where('iso_name', request()->get('currency', 'RUB'))->firstOrFail();

       $products = Product::with('currency')->paginate(10);

       $products->getCollection()->transform(function ($product) use ($converter, $toCurrency) {
           $product->converted_price = $converter->convertAndFormat(
               $product->price,
               $product->currency,
               $toCurrency
           );
           return $product;
       });

       // Возвращаем пагинацию с ресурсом
       return ProductResource::collection($products);
   }
}
