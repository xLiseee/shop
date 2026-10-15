<?php

namespace App\Support;

use App\Models\Product;
use Illuminate\Support\Collection;

class ShoppingCart
{
    private const SESSION_KEY = 'shopping_cart';

    public function add(Product $product): bool
    {
        $cart = session()->get(self::SESSION_KEY, []);
        $productId = $product->getKey();
        $quantity = (int) ($cart[$productId] ?? 0);

        if ($quantity >= $product->stock) {
            return false;
        }

        $cart[$productId] = $quantity + 1;
        session()->put(self::SESSION_KEY, $cart);

        return true;
    }

    public function remove(int $productId): bool
    {
        $cart = session()->get(self::SESSION_KEY, []);

        if (! array_key_exists($productId, $cart)) {
            return false;
        }

        unset($cart[$productId]);
        session()->put(self::SESSION_KEY, $cart);

        return true;
    }

    public function count(): int
    {
        return array_sum(array_map('intval', session()->get(self::SESSION_KEY, [])));
    }

    public function items(): Collection
    {
        $cart = session()->get(self::SESSION_KEY, []);

        if ($cart === []) {
            return collect();
        }

        $products = Product::query()
            ->with('categories')
            ->whereKey(array_keys($cart))
            ->get()
            ->keyBy('id');

        return collect($cart)
            ->map(function ($quantity, $productId) use ($products) {
                $product = $products->get($productId);

                if (! $product) {
                    return null;
                }

                return [
                    'product' => $product,
                    'quantity' => (int) $quantity,
                ];
            })
            ->filter()
            ->values();
    }
}
