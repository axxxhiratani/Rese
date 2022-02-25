<head>
    <link rel="stylesheet" href="{{asset('/css/admin/create.css')}}">
    <link rel="stylesheet" href="{{asset('/fontawesome-free-5.15.4-web/css/all.css')}}">
</head>

<x-layout_admin>
    <div class="container--email" id="app">
        <div class="container__form">
            <p class="container__form--name">エリアの追加</p>
            <form action="/admin/area" method="post">
                @csrf
                <label for="name" class="container__form--label">
                    <i class="fas fa-chart-area">
                        エリア名
                    </i>
                </label>
                <input type="text" class="container__form--text" name="name" value="{{old('name')}}" id="name">
                @error('name')
                    <p class="container__form--error">
                        {{$message}}
                    </p>
                @enderror
                <button type="submit" class="container__form--button">追加</button>
            </form>
        </div>
    </div>
</x-layout_admin>
