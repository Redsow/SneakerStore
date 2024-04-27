@extends('home')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-family: Figtree, sans-serif;
            color: #333;
        }

        .profile-info {
            background-color: #BCBEC1;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;

        }

        .profile-info p {
            margin: 10px 0;
        }

        .registration-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #1c1c1c;
            font-weight: bold;
        }

        .registration-link:hover {
            color: #ca2a07;
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
    </style>
</head>
<div class="container">
    <h1>Профиль</h1>
    @if($user)
        <section class="profile-info">
            <img src="Images\avatar.png" alt="User Avatar" width="30%">
            <p>Имя: {{ $user->first_name }}</p>
            <p>Фамилия: {{ $user->last_name }}</p>
            <p>Email: {{ $user->email }}</p>
            <button><a href="/logout">Выйти</a></button>
        </section>
    @else
        <section class="profile-info">
            <img src="Images\avatar.png" alt="User Avatar" width="30%">
            <a class ="registration-link" href="/registration">Зарегистрироваться</a>
            <a class ="registration-link" href="/login">Войти</a>
        </section>
    @endif
</div>
</html>
@endsection
