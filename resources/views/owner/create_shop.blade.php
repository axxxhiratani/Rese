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

                <label for="" class="container__form--label">
                    <i class="fas fa-utensils">
                        ジャンル
                    </i>
                </label>
                <select name="genre_id" class="container__form--select">
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
                    @foreach ($areas as $area)
                        <option value="{{$area->id}}">{{$area->name}}</option>
                    @endforeach
                </select>

                <label for="" class="container__form--label">
                    <i class="fas fa-store">
                        店舗名
                    </i>
                </label>

                <input type="text" class="container__form--text" name="name">
                @error('name')
                    <p>
                        {{$message}}
                    </p>
                @enderror
                <label for="" class="container__form--label">
                    <i class="far fa-eye">
                        説明
                    </i>
                </label>

                <textarea name="overview" id="" cols="50" rows="20" class="container__form--textarea"></textarea>
                @error('overview')
                    <p>
                        {{$message}}
                    </p>
                @enderror
                <input type="hidden" name="owner_id" value="{{Auth::guard('owner')->id()}}">
                <button type="submit" class="container__form--button">追加する</button>
            </form>
        </div>
    </div>
</x-layout_owner>

<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fetch-jsonp@1.1.3/build/fetch-jsonp.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    const vm = new Vue({
        el: '#app',
        data:{
        },
        watch:{
        },
        mounted:function(){
        },
        filters:{
        },
    })
</script>
