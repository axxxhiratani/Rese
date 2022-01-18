<head>
    <link rel="stylesheet" href="{{asset('/css/register.css')}}">
</head>

<x-layout>
<div class="container--register">
    <div class="container--register__title">
        <p>Regitration</p>
    </div>
    <div class="container--register__form">
        <form action="/register" method="post">
            @csrf
            <div class="container--register__form__input">
                <label for=""></label>
                <input type="text" name="name" class="container--register__form__input--text" placeholder="Username">
            </div>

            <div class="container--register__form__input">
                <label for=""></label>
                <input type="email" name="email" class="container--register__form__input--text" placeholder="Email">
            </div>

            <div class="container--register__form__input">
                <label for=""></label>
                <input type="password" name="password" class="container--register__form__input--text" placeholder="Password">
            </div>

            <button type="submit" class="container--register__form--button">登録</button>
        </form>
    </div>
</div>
</x-layout>


