@extends('home')
@section('content')
<h1>Ваша корзина</h1>
<a href="/" class="return-link">Вернуться на главную</a>
@if($cartItems->count() > 0)
<p class="cart-title">Ваша корзина:</p>
    <ul class="cart-items">
        <div class="products">
        @foreach($cartItems as $cartItem)
            <div class="product-card">
                <img src="{{ asset('storage/' . $cartItem->product->image) }}" alt="{{ $cartItem->product->name }}" class="product-image">
                <div class="product-details">
                    <h3 class="product-name">{{ $cartItem->product->name }}</h3>
                    <p class="product-size">
                        <label for="size">Size:</label>
                        <select name="size" id="size">
                            @for ($i = 35; $i <= 47; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </p>
                    <p class="product-quantity">Quantity: {{ $cartItem->quantity }}</p>
                    <p class="product-price">Price: ${{ $cartItem->product->price }}</p>
                    <a href="{{ route('cart.remove', $cartItem->id) }}" class="remove-link">Удалить из корзины</a>
                    <a href="" class="/mistake">Оплатить</a>
                </div>
            </div>
        </div>

        @endforeach
    </ul>
@else
    <p>Ваша корзина пуста.</p>
@endif
    <style>


        .cart-items {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            color: #1c1c1c;

        }

        .products {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }


        .product-card {
            display: flex;
            background-color:#BCBEC1;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            max-width: 500px;
            color: #1c1c1c;
        }

        .product-image {
            max-width: 300px;
            height: auto;
            flex: 0 0 auto;
        }

        .product-details {
            padding: 20px;
            flex: 1;
        }

        .product-name {
            margin-top: 0;
        }

        .product-quantity,
        .product-price {
            margin: 5px 0;
        }

        .remove-link,
        .pay-link {
            display: inline-block;
            margin-top: 10px;
            color: #ca2a07;
            text-decoration: none;
        }

        .remove-link:hover,
        .pay-link:hover {
            text-decoration: underline;
        }


    </style>
@endsection
