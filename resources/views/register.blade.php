<head>
    <link rel="stylesheet" href="{{asset('/css/register.css')}}">
    <link rel="stylesheet" href="{{asset('/fontawesome-free-5.15.4-web/css/all.css')}}">
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
                <label for=""><i class="fas fa-user"></i></label>
                <input type="text" name="name" class="container--register__form__input--text" placeholder="Username">
                @error('name')
                    <p class="container--register__form__input--error">{{$message}}</p>
                @enderror
            </div>

            <div class="container--register__form__input">
                <label for=""><i class="fas fa-envelope"></i></label>
                <input type="email" name="email" class="container--register__form__input--text" placeholder="Email">
                @error('email')
                    <p class="container--register__form__input--error">{{$message}}</p>
                @enderror
            </div>

            <div class="container--register__form__input">
                <label for=""><i class="fas fa-lock"></i></label>
                <input type="password" name="password" class="container--register__form__input--text" placeholder="Password">
                @error('password')
                    <p class="container--register__form__input--error">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="container--register__form--button">登録</button>

        </form>
    </div>
</div>
</x-layout>


