<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('/css/menu.css')}}">
    <link rel="stylesheet" href="{{asset('/css/reset.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rese</title>
</head>
<body>

    <div class="container">

        <nav class="nav" id="nav">
            <ul>
                @if (Auth::id())
                    <li><a href="/">Home</a></li>
                    <li><a href="/logout">Logout</a></li>
                    <li><a href="/mypage">Mypage</a></li>
                @else
                    <li><a href="/">Home</a></li>
                    <li><a href="/register">Registration</a></li>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/owner/login">OwnerPage</a></li>
                    <li><a href="/admin/login">AdminPage</a></li>
                @endif
            </ul>
        </nav>
        <div class="menu--container">
            <div class="menu" id="menu">
                <span class="menu__line--top"></span>
                <span class="menu__line--middle"></span>
                <span class="menu__line--bottom"></span>
            </div>
            <h1 class="title">
                Rese
            </h1>
        </div>

        <div>
            {{$slot}}
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('/js/menu.js')}}"></script>
</body>
</html>
