<head>
    <link rel="stylesheet" href="{{asset('/css/owner/create.css')}}">
    <link rel="stylesheet" href="{{asset('/fontawesome-free-5.15.4-web/css/all.css')}}">
</head>

<x-layout_owner>
    <div class="container--create" id="app">
        <div class="container__form">
            <p class="container__form--name">店舗追加</p>
            <form action="/owner/shop" method="post">
                @csrf

                <label for="genre" class="container__form--label">
                    <i class="fas fa-utensils">
                        ジャンル
                    </i>
                </label>
                <select name="genre_id" class="container__form--select" id="genre">
                    @foreach ($genres as $genre)
                        <option value="{{$genre->id}}">{{$genre->name}}</option>
                    @endforeach
                </select>

                <label for="area" class="container__form--label">
                    <i class="fas fa-map-marker-alt">
                        エリア
                    </i>
                </label>

                <select name="area_id" class="container__form--select" id="area">
                    @foreach ($areas as $area)
                        <option value="{{$area->id}}">{{$area->name}}</option>
                    @endforeach
                </select>

                <label for="name" class="container__form--label">
                    <i class="fas fa-store">
                        店舗名
                    </i>
                </label>

                <input type="text" class="container__form--text" name="name" value="{{old('name')}}" id="name">
                @error('name')
                    <p class="container__form--error">
                        {{$message}}
                    </p>
                @enderror
                <label for="overview" class="container__form--label">
                    <i class="far fa-eye">
                        説明
                    </i>
                </label>

                <textarea name="overview" id="overview" cols="50" rows="20" class="container__form--textarea">
                </textarea>
                @error('overview')
                    <p class="container__form--error">
                        {{$message}}
                    </p>
                @enderror
                <input type="hidden" name="owner_id" value="{{Auth::guard('owner')->id()}}">
                <button type="submit" class="container__form--button">追加する</button>
            </form>
        </div>
    </div>
</x-layout_owner>
