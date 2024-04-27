@extends('home')
@section('content')

<form action="{{ route('auth') }}" method="post" class="form">
    <img src="Images\avatar.png" alt="User Avatar" width="30%">
    <h1 class="single-color-text">Авторизация</h1>
    @csrf
    <label for="email">
        <input type="email" name="email" id="email" placeholder="Введите свою почту">
    </label>
    <label for="password">
        <input type="password" name="password" id="password" placeholder="Введите свой пароль">
    </label>
    <button type="submit">Войти</button>
    <div class="link-to-register">
        <p class="single-color-text">Нет аккаунта?<a href="/registration">Зарегистрироваться</a></p>
    </div>
</form>

<style>


    .form {
        max-width: 400px;
        margin: 20px auto;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #BCBEC1;
    }

    h1 {
        text-align: center;
        font-family: Figtree, sans-serif;
    }

    label {
        display: block;
        margin-bottom: 10px;
        color: #737373;
    }

    input[type="email"],
    input[type="password"] {
        width: 90%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 10px;
    }

    button {
        width: 95%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #ca2a07;
        color: #fff;
        cursor: pointer;
    }

    .link-to-register {
        margin-top: 20px;
        text-align: center;
    }

    .link-to-register p {
        margin: 0;
    }

    .link-to-register a {
        color: #9C9C9C;
        text-decoration: none;
    }

    .single-color-text {
        color: #2F2F2F;
    }

</style>
@endsection
