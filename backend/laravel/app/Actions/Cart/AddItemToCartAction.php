<?php

namespace App\Actions\Cart;

use App\Data\Cart\AddItemToCartData;
use App\Models\CartItem;
use Illuminate\Http\JsonResponse;

class AddItemToCartAction
{
    public static function execute(AddItemToCartData $data): JsonResponse
    {
        $existentItem = CartItem::where('part_id', $data->partId)
            ->where('user_id', $data->userId)->first();

        if ($existentItem) {
            $existentItem->update([
                'quantity' => $existentItem->quantity + $data->quantity
            ]);
        } else CartItem::create(
            [...$data->all()]
        );

        return response()->json(['message' => 'Товар успешно добавлен в корзину', 'items' => auth()->user()->cartItems]);
    }
}
