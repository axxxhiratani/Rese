<head>
    <link rel="stylesheet" href="{{asset('/css/admin/create.css')}}">
    <link rel="stylesheet" href="{{asset('/fontawesome-free-5.15.4-web/css/all.css')}}">
</head>

<x-layout_admin>
    <div class="container--email" id="app">
        <div class="container__form">
            <p class="container__form--name">ジャンルの追加</p>
            <form action="/admin/genre" method="post" enctype="multipart/form-data">
                @csrf
                <label for="name" class="container__form--label">
                    <i class="fas fa-utensils">
                        ジャンル名
                    </i>
                </label>
                <input type="text" class="container__form--text" name="name" value="{{old('name')}}" id="name">
                @error('name')
                    <p class="container__form--error">
                        {{$message}}
                    </p>
                @enderror
                <label for="image" class="container__form--label">
                    <i class="fas fa-image">
                        画像ファイル
                    </i>
                </label>
                <input type="file" name="image" id="image" class="container__form--textarea">
                @error('image')
                    <p class="container__form--error">
                        {{$message}}
                    </p>
                @enderror
                <button type="submit" class="container__form--button">追加</button>
            </form>
        </div>
    </div>
</x-layout_admin>
