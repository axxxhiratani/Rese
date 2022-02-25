<head>
    <link rel="stylesheet" href="{{asset('/css/admin/create.css')}}">
    <link rel="stylesheet" href="{{asset('/fontawesome-free-5.15.4-web/css/all.css')}}">
</head>

<x-layout_admin>
    <div class="container--email" id="app">
        <div class="container__form">
            <p class="container__form--name">利用者全員へメール送信</p>
            <form action="/admin/email" method="post">
                @csrf
                <label for="subject" class="container__form--label">
                    <i class="fas fa-envelope">
                        件名
                    </i>
                </label>
                <input type="text" class="container__form--text" name="subject" value="{{old('subject')}}" id="subject">
                @error('subject')
                    <p class="container__form--error">
                        {{$message}}
                    </p>
                @enderror
                <label for="text" class="container__form--label">
                    <i class="far fa-eye">
                        内容
                    </i>
                </label>
                <textarea name="text" id="text" cols="50" rows="20" class="container__form--textarea"></textarea>
                @error('text')
                    <p class="container__form--error">
                        {{$message}}
                    </p>
                @enderror
                <button type="submit" class="container__form--button">一斉送信</button>
            </form>
        </div>
    </div>
</x-layout_admin>
