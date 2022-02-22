<head>
    <link rel="stylesheet" href="{{asset('/css/admin/login.css')}}">
    <link rel="stylesheet" href="{{asset('/fontawesome-free-5.15.4-web/css/all.css')}}">
</head>


<x-layout_admin>
    <div class="container--login">
        <div class="container--login__title">
            <p>Admin Login</p>
        </div>
        <div class="container--login__form">
            <form action="/admin/login" method="post">
                @csrf
                <div class="container--login__form__input">
                    <label for="email" class="container--login__form__input--icon"><i class="fas fa-envelope"></i></label>
                    <input type="email" name="email" id="email" class="container--login__form__input--text" placeholder="Email" value="{{old('email')}}">
                    @error('email')
                        <p class="container--login__form__input--error">{{$message}}</p>
                    @enderror
                </div>
                <div class="container--login__form__input">
                    <label for="password" class="container--login__form__input--icon"><i class="fas fa-lock"></i></label>
                    <input type="password" name="password" id="password" class="container--login__form__input--text" placeholder="Password" value="{{old('password')}}">
                    @error('password')
                        <p class="container--login__form__input--error">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="container--login__form--button">ログイン</button>
            </form>
        </div>
    </div>
</x-layout_admin>


