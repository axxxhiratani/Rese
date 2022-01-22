<head>
    <link rel="stylesheet" href="{{asset('/css/reservation.css')}}">
</head>

<x-layout>
    <div class="container" id="app">
        <div class="container__detail">
            <a href="/" class="container__detail--back"><</a>
            <p class="container__detail--name">{{$shop->name}}</p>
            <img class="container__detail--img" src="{{$shop->image}}" alt="">
            <div class="container__detail--info">
                <p>#{{$shop->genre->name}}</p>
                <p>#{{$shop->area->name}}</p>
            </div>
            <p class="container__detail--overview">{{$shop->overview}}</p>
        </div>

        <div class="container__form">
            <p class="container__form--name">予約</p>
            <form action="/done" method="post">
                @csrf
                <input type="date" name="date" class="container__form--date" v-model="date">
                <select name="time" class="container__form--select" v-model="time">
                    @for ($i = 0; $i < 24; $i++)
                    @if ($i <= 9)
                        <option value="0{{$i}}:00:00">0{{$i}}:00</option>
                        <option value="0{{$i}}:30:00">0{{$i}}:30</option>
                    @else
                        <option value="{{$i}}:00:00">{{$i}}:00</option>
                        <option value="{{$i}}:30:00">{{$i}}:30</option>
                    @endif
                    @endfor
                </select>
                <select name="number_of_people" class="container__form--select" v-model="number">
                    @for ($i = 1; $i < 10; $i++)
                    <option value="{{$i}}">{{$i}}人</option>
                    @endfor
                </select>
                <input type="hidden" name="shop_id" value="{{$shop->id}}">
                <input type="hidden" name="user_id" value="{{Auth::id()}}">

                <div class="container__form__info">
                    <div class="container__form__info__tr">
                        <p class="container__form__info__tr--th">Shop</p>
                        <p class="container__form__info__tr--td">{{$shop->name}}</p>
                    </div>
                    <div class="container__form__info__tr">
                        <p class="container__form__info__tr--th">Date</p>
                        <p class="container__form__info__tr--td">@{{date}}</p>
                    </div>
                    <div class="container__form__info__tr">
                        <p class="container__form__info__tr--th">Time</p>
                        <p class="container__form__info__tr--td">@{{time}}</p>
                    </div>
                    <div class="container__form__info__tr">
                        <p class="container__form__info__tr--th">Number</p>
                        <p class="container__form__info__tr--td">@{{number}}人</p>
                    </div>
                </div>


                <button type="submit" class="container__form--button">予約する</button>
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
            number:1,
        }
    })
</script>
