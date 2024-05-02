<?php

namespace App\Http\Controllers\Cart;

use App\Actions\Cart\AddItemToCartAction;
use App\Actions\Cart\RemoveItemFromCartAction;
use App\Data\Cart\AddItemToCartData;
use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Part;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    use AuthorizesRequests;

    public function index(): JsonResponse
    {
        return response()->json(['items' => auth()->user()->cartItems]);
    }

    public function addToCart(Request $request, Part $part): JsonResponse
    {
        $this->authorize('cart interaction', CartItem::class);

        $request->request->add(['user_id' => auth()->user()->id, 'part_id' => $part->id]);

        return AddItemToCartAction::execute(AddItemToCartData::from($request));
    }

    public function removeFromCart(Part $part): JsonResponse
    {
        $this->authorize('cart interaction', CartItem::class);

        $user = auth()->user();

        return RemoveItemFromCartAction::execute($part, $user);
    }
}
