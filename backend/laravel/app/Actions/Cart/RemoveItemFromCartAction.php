<?php

namespace App\Actions\Cart;

use App\Models\CartItem;
use App\Models\Part;
use App\Models\User;

class RemoveItemFromCartAction
{
    public static function execute(Part $part, User $user)
    {
        $item = CartItem::where('part_id', $part->id)
            ->where('user_id', $user->id);

        $item->delete();

        return response()->json(['message' => 'Товар успешно удален из корзины', 'items' => $user->cartItems]);
    }
}
