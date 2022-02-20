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
                    <label for="name" class="container--login__form__input--icon"><i class="fas fa-user"></i></label>
                    <input type="text" name="name" id="name" class="container--register__form__input--text" placeholder="Username" value="{{old('name')}}">
                    @error('name')
                        <p class="container--register__form__input--error">{{$message}}</p>
                    @enderror
                </div>

                <div class="container--register__form__input">
                    <label for="email" class="container--login__form__input--icon"><i class="fas fa-envelope"></i></label>
                    <input type="email" name="email" id="email" class="container--register__form__input--text" placeholder="Email" value="{{old('email')}}">
                    @error('email')
                        <p class="container--register__form__input--error">{{$message}}</p>
                    @enderror
                </div>

                <div class="container--register__form__input">
                    <label for="password" class="container--login__form__input--icon"><i class="fas fa-lock"></i></label>
                    <input type="password" name="password" id="password" class="container--register__form__input--text" placeholder="Password" value="{{old('password')}}">
                    @error('password')
                        <p class="container--register__form__input--error">{{$message}}</p>
                    @enderror
                </div>

                <button type="submit" class="container--register__form--button">登録</button>

            </form>
        </div>
    </div>
</x-layout>
