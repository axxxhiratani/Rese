<head>
    <link rel="stylesheet" href="{{asset('/css/owner/edit.css')}}">
    <link rel="stylesheet" href="{{asset('/fontawesome-free-5.15.4-web/css/all.css')}}">
</head>

<x-layout_owner>
    <div class="container--edit" id="app">
        <div class="container__form">
            <div class="container__form__header">
                <a href="/owner/index" class="container__form__header--back"><</a>
                <p class="container__form__header--name">店舗情報変更</p>
                <form action="/owner/delete" method="post">
                    @csrf
                    <input type="hidden" value="{{$shop->id}}" name="id">
                    <button type="submit" class="container__form__header--delete">店舗の削除</button>
                </form>
            </div>
            <form action="/owner/detail" method="post">
                @csrf
                <label for="" class="container__form--label">
                    <i class="fas fa-utensils">
                        ジャンル
                    </i>
                </label>
                <select name="genre_id" class="container__form--select">
                    <option value="{{$shop->genre_id}}" selected >{{$shop->genre->name}}</option>
                    @foreach ($genres as $genre)
                        <option value="{{$genre->id}}">{{$genre->name}}</option>
                    @endforeach
                </select>
                <label for="" class="container__form--label">
                    <i class="fas fa-map-marker-alt">
                        エリア
                    </i>
                </label>
                <select name="area_id" class="container__form--select">
                    <option value="{{$shop->area_id}}" selected >{{$shop->area->name}}</option>
                    @foreach ($areas as $area)
                        <option value="{{$area->id}}">{{$area->name}}</option>
                    @endforeach
                </select>
                <label for="" class="container__form--label">
                    <i class="fas fa-store">
                        店舗名
                    </i>
                </label>
                <input type="text" class="container__form--text" name="name" value="{{$shop->name}}">
                <label for="" class="container__form--label">
                    <i class="far fa-eye">
                        説明
                    </i>
                </label>
                <textarea name="overview" id="" cols="50" rows="20" class="container__form--textarea">{{$shop->overview}}</textarea>
                <input type="hidden" name="id" value="{{$shop->id}}">
                <button type="submit" class="container__form--button">変更する</button>
            </form>
        </div>
    </div>
</x-layout_owner>
