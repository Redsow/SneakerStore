<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SneakerShop</title>
</head>
<style>

    body{
        height: 100%;
        width: 100%;
        margin: 0 auto;
        background-color: #D3D3D3;
        flex: 1 0 auto;
    }

    footer {
        margin-top: 50px;
        width: 100%;
        display: flex;
        justify-content: space-evenly;
        background-color: #151515;
        text-align: center;
    }

    .footer section {
        width: 100%;
        text-align: center;
        padding: 20px;
        margin: auto;
    }

    .footer-banner .logo-but{
        text-decoration: none;
        text-align: center;
        margin: auto;
        color: #FDFDFD;
        font-size: 28px;
        font-weight: bold;
        border-bottom: 2px solid transparent;
        transition: border-bottom-color 0.3s ease;
    }

    .social-buttons {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .social-buttons img {
        width: 80px;
        margin: 0 10px;
    }

    .help ul {
        display: flex;
        flex-flow: column wrap;
        text-align: left;
        padding: 8px;
        list-style-type: none;
    }

    .help li{
        margin-bottom: 1em;
    }


    main{
        margin: 0 auto;
        width: 100%;
        text-align: center;
    }



    header {
        margin: 0 auto;
        background-color:#D3D3D3;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo {
        display: flex;
        align-items: flex-end;
        justify-content: center;

    }


    .logo .logo-but {
        text-decoration: none;
        color: #333;
        font-size: 30px;
        font-weight: bold;
        border-bottom: 2px solid transparent;
        transition: border-bottom-color 0.3s ease;

    }

    section ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        font-weight: bold;
        font-size: large;
        font-family: sans-serif;
    }

    section ul li {
        display: inline-block;
        margin-right: 10px;
    }

    header section ul li a {
        text-decoration: none;
        color: #333;
        padding: 5px 10px;
        border-radius: 3px;
        border: 1px solid transparent;
    }

    section ul li a:hover {
        background-color: #ca2a07;
        color: #b9b9b9;
        border-color: #ca2a07;
    }

    footer h1, a, ul, li{
        color: #b9b9b9;
        text-decoration: none;
        padding: 2px 2px;
        border-radius: 3px;
        border: 1px solid transparent;
    }



</style>

<body>
<header>
    <div class="logo">
        <img src="{{ asset('Images/logo3.png') }}" alt="logo" width="100px">
        <a class="logo-but" href="/">SneakerStore</a>
    </div>
    <section>
        <ul class="menu">
            <li><a href="{{ route('reviews') }}">Отзывы</a></li>
            <li><a href="{{ route('cart') }}">Корзина</a></li>
            <li><a href="{{ route('profile') }}">Профиль</a></li>
        </ul>
    </section>
</header>
<main>
    @yield('content')
</main>
<footer>
    <section class="footer-banner">
        <h1>SneakerStore</h1>
    </section>
    <section class="help">
        <h1>Help Center</h1>
        <ul>
            <li><a href="/mistake">Contact us</a></li>
            <li><a href="/mistake">Video Communiti</a></li>
            <li><a href="/mistake">Activation & Registration</a></li>
            <li><a href="/mistake">Support center</a></li>
            <li><a href="/mistake">Account</a></li>
        </ul>
    </section>
    <section class="social">
        <h1>Follow Us</h1>
        <div class="social-buttons">
            <a href="/mistake"><img src="{{ asset('Images/vk.png')}}" alt="VK"></a>
            <a href="/mistake"><img src="{{ asset('Images/Telegram.png')}}" alt="Telegram"></a>
        </div>
    </section>
</footer>
</body>
</html>

{{--@include('layouts.header')--}}

{{--@yield('content')--}}


{{--@include('layouts.footer')--}}


