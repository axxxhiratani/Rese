<head>
    <link rel="stylesheet" href="{{asset('/css/evaluation.css')}}">
</head>

<x-layout>
    <div class="container--reservation" id="app">
        <div class="container__detail">
            <a href="/mypage" class="container__detail--back"><</a>
            <p class="container__detail--name">{{$reservation->shop->name}}</p>
            <img class="container__detail--img" src="{{$reservation->shop->image}}" alt="">
            <div class="container__detail--info">
                <p>#{{$reservation->shop->area->name}}</p>
                <p>#{{$reservation->shop->genre->name}}</p>
            </div>
            <p class="container__detail--overview">
                {{$reservation->shop->overview}}
            </p>
        </div>
        <div class="container__form">
            <p class="container__form--name">評価</p>
            <form action="/evaluation" method="post">
                @csrf
                <select name="evaluation" class="container__form--select" value="{{$reservation->number_of_people}}" test="test">
                    @for ($i = 1; $i <= 5; $i++)
                    <option value="{{$i}}">
                        @for ($j = 1; $j <= $i; $j++)
                            ☆
                        @endfor
                    </option>
                    @endfor
                </select>
                @error('evaluation')
                    <p class="container__form--error">
                        {{$message}}
                    </p>
                @enderror
                <textarea name="comment"  cols="30" rows="15" class="container__form--textarea" placeholder="コメント">
                </textarea>
                @error('comment')
                    <p class="container__form--error">
                        {{$message}}
                    </p>
                @enderror
                <input type="hidden" name="shop_id" value="{{$reservation->shop->id}}">
                <input type="hidden" name="user_id" value="{{$reservation->user_id}}">
                <button type="submit" class="container__form--button">送信する</button>
            </form>
        </div>



    </div>
</x-layout>

<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fetch-jsonp@1.1.3/build/fetch-jsonp.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    const vm = new Vue({
        el: '#app',
        data:{
            date:"",
            time:"",
            number:"",
        },
        filters:{
            changeTime:async function(date){
                console.log(date);
                const dt = Date.parse(date);
                var date = new Date(dt);
                console.log(`${date.getHours()}:${date.getMinutes()}`);
                return `${date.getHours()}:${date.getMinutes()}`;
            },
        },
    })
</script>
