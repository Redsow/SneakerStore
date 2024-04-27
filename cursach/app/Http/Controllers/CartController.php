<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Carts;
use App\Models\CartItem;

class CartController extends Controller
{
    public function index()
    {
        // Получаем корзину пользователя
        $cart = Carts::where('user_id', auth()->id())->first();
        // Если корзины нет, создаем новую
        if (!$cart) {
            $cart = Carts::create(['user_id' => auth()->id()]);
        }
        // Получаем список товаров в корзине
        $cartItems = $cart->items;

        return view('cart', compact('cartItems'));
    }

    public function addItem(Request $request, $id)
    {
        // Получаем ID товара из формы
        $productId = Product::find($id)->id;
        // Получаем ID текущего пользователя
        $userId = auth()->id();
        // Получаем корзину пользователя или создаем новую, если ее нет
        $cart = Carts::firstOrCreate(['user_id' => $userId]);
        // Добавляем товар в корзину
        $cartItem = CartItem::create([
            'carts_id' => $cart->id,
            'product_id' => $productId,
            'quantity' => 1, // Пример количества товара (может быть изменено)
        ]);

        // Редирект обратно на страницу корзины с сообщением
        return redirect()->route('cart' , compact('cartItem'))->with('success', 'Товар успешно добавлен в корзину.');
    }

    public function deleteItem($id)
    {
        $cartItem = CartItem::find($id);
        $cartItem->delete();
        return redirect()->route('cart')->with('success', 'Товар успешно удален из корзины.');
    }
}

