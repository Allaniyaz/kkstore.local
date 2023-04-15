<?php

namespace App;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;

class Cart
{
    /**
     * Get the Cart items from the cache.
     *
     * @param int $userId
     * @return array
     */
    public static function getItems($userId)
    {
        $key = "cart:{$userId}";

        return Cache::get($key, []);
    }

    /**
     * Add an item to the Cart.
     *
     * @param int $userId
     * @param int $productId
     * @param int $quantity
     * @return void
     */
    public static function addItem($userId, $productId, $quantity = 1)
    {
        $key = "cart:{$userId}";
        $items = self::getItems($userId);

        if (isset($items[$productId])) {
            $items[$productId] += $quantity;
        } else {
            $items[$productId] = $quantity;
        }

        Cache::put($key, $items);
    }

    /**
     * Remove an item from the Cart.
     *
     * @param int $userId
     * @param int $productId
     * @return void
     */
    public static function removeItem($userId, $productId)
    {
        $key = "cart:{$userId}";
        $items = self::getItems($userId);

        if (isset($items[$productId])) {
            unset($items[$productId]);
        }

        Cache::put($key, $items);
    }

    /**
     * Update the quantity of an item in the Cart.
     *
     * @param int $userId
     * @param int $productId
     * @param int $quantity
     * @return void
     */
    public static function updateItem($userId, $productId, $quantity)
    {
        $key = "cart:{$userId}";
        $items = self::getItems($userId);

        if (isset($items[$productId])) {
            $items[$productId] = $quantity;
        }

        Cache::put($key, $items);
    }
}
