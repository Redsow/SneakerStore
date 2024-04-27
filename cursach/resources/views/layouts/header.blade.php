
<header>
    <div class="logo">
        <img src="{{ asset('Images/logo.png') }}" alt="logo">
        <a class="logo-but" href="/">SneakerStore</a>
    </div>
    <div class="search">
        <input type="text" placeholder="Поиск...">
        <button>Найти</button>
    </div>
    <section>
        <ul>
            <li><a href="#">О нас</a></li>
            <li><a href="{{ route('cart') }}">Корзина</a></li>
            <li><a href="{{ route('profile') }}">Профиль</a></li>
        </ul>
    </section>
</header>


