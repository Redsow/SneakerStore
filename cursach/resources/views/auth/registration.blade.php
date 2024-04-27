@extends('home')
@section('content')

<form action="{{ route('registration.create') }}" method="post" class="form">
    <img src="Images\avatar.png" alt="User Avatar" width="30%">
    <h1>Регистрация</h1>
    @csrf
    <label for="last_name">
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Введите свою фамилию">
    </label>
    <label for="first_name">
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="Введите свое имя">
    </label>
    <label for="email">
        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Введите свою почту">
    </label>
    <label for="password">
        <input type="password" name="password" id="password" placeholder="Введите свой пароль">
    </label>
    <label for="password_confirmation">
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Подтвердите свой пароль">
    </label>
    <button type="submit">Зарегистрироваться</button>
    <div class="link-to-login">
        <p>Уже есть аккаунт?<a href="/login">Войти</a></p>
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

    input[type="text"],
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

    .link-to-login {
        margin-top: 20px;
        text-align: center;
    }

    .link-to-login p {
        margin: 0;
    }

    .link-to-login a {
        color: #9C9C9C;
        text-decoration: none;
    }

    .single-color-text {
        color: #2F2F2F;
    }
</style>
@endsection
