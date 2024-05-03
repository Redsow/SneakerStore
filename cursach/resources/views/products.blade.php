@extends('home')

@section('content')
    <div class="banner">
        <img src="Images\banner.png" alt="">
    </div>
    <section class="filter-bar">
        <div class="container">
            <div class="categories">
                @foreach($categories as $category)
                    <form action="{{ route('products.filterByCategory') }}" method="GET">
                        @csrf
                        <input type="hidden" name="category" value="{{ $category->name }}">
                        <button type="submit">{{ $category->name }}</button>
                    </form>
                @endforeach
            </div>
        </div>
    </section>
    @if(count($products) > 0)
        <section class="products">
            @foreach($products as $product)
                <div class="product-card">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image">
                    <div class="product-details">
                        <h2>{{ $product->name }}</h2>
                        <p>{{ $product->description }}</p>
                        <p class="price">Price: ${{ $product->price }}</p>
                        <form action="{{ route('cart.add', $product->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $product->id }}">
                            <button class="submit" type="submit">Купить</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </section>

    @else
        <p>No products found.</p>
    @endif
    <style>

        .filter-bar {
            background-color: #000000;
            width: 100%;
            padding: 10px 0;
            margin-bottom: 50px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .categories {
            display: flex;
        }

        .categories form {
            margin-right: 10px;
        }

        .categories button {
            padding: 8px 16px;
            font-size: 16px;
            background-color:#BCBEC1;
            color: #000000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: Figtree, sans-serif;
        }

        .categories button:hover {
            background-color: #ca2a07;
        }

        .categories button:focus {
            outline: none;
        }

         .submit{
            padding: 8px 16px;
            font-size: 16px;
            background-color: #ca2a07;
            color: #000000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: Figtree, sans-serif;

        }


        .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            gap: 20px;
        }

        .product-card {
            display: flex;
            background-color:#BCBEC1;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            max-width: 500px;
        }

        .product-card img {
            max-width: 300px;
            height: auto;
            flex: 0 0 auto;
        }

        .product-details {
            padding: 20px;
            flex: 1;
        }

        .product-details h2 {
            margin-top: 0;
        }

        .product-details .price {
            font-weight: bold;
            color: #333;
        }

        .product-details p {
            margin: 10px 0;
        }


        .banner {
            text-align: center;
        }

        .banner img {
            width: 100%;
        }
    </style>
@endsection


