<head>
    <link rel="stylesheet" href="{{asset('/css/register.css')}}">
</head>

<x-layout>
<div class="container--register">
    <div class="container--register__title">
        <p>Regitration</p>
    </div>
    <div>
        <form action="/login" method="post">
            @csrf
            <input type="email" name="email">
            <input type="password" name="password">
            <button type="submit">ログイン</button>
        </form>
    </div>
</div>
</x-layout>


