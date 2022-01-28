<head>
    <link rel="stylesheet" href="{{asset('/css/reservation.css')}}">
</head>

<x-layout>
    <div class="container--reservation" id="app">
        <div class="container__detail">
            <a href="/mypage" class="container__detail--back"><</a>
            <p class="container__detail--name"></p>
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
            <p class="container__form--name">予約変更</p>
            <form action="/update" method="post">
                @csrf
                <input type="date" name="date" class="container__form--date" value="{{$date}}">
                @error('date')
                    <p class="container__form--error">{{$message}}</p>
                @enderror


                {{-- このセレクトボックスに$timeを代入したい --}}
                <select name="time" class="container__form--select" value="{{$time}}">
                    @for ($i = 0; $i < 24; $i++)
                        @if ($i <= 9)
                            <option value="0{{$i}}:00:00">
                                0{{$i}}:00
                            </option>
                            <option value="0{{$i}}:30:00">0{{$i}}:30</option>
                        @else
                            <option value="{{$i}}:00:00">{{$i}}:00</option>
                            <option value="{{$i}}:30:00">{{$i}}:30</option>
                        @endif
                    @endfor
                </select>

                @error('time')
                    <p class="container__form--error">{{$message}}</p>
                @enderror
                <select name="number_of_people" class="container__form--select" value="{{$reservation->number_of_people}}" test="test">
                    @for ($i = 1; $i < 10; $i++)
                    <option value="{{$i}}">{{$i}}人</option>
                    @endfor
                </select>
                <input type="hidden" name="id" value="{{$reservation->id}}">

                <div class="container__form__info">
                    <div class="container__form__info__tr">
                        <p class="container__form__info__tr--th">Shop</p>
                        <p class="container__form__info__tr--td"></p>
                    </div>
                    <div class="container__form__info__tr">
                        <p class="container__form__info__tr--th">Date</p>
                        <p class="container__form__info__tr--td">@{{date}}</p>
                    </div>
                    <div class="container__form__info__tr">
                        <p class="container__form__info__tr--th">Time</p>
                        <p class="container__form__info__tr--td">@{{time | changeTime}}</p>
                    </div>
                    <div class="container__form__info__tr">
                        <p class="container__form__info__tr--th">Number</p>
                        <p class="container__form__info__tr--td">@{{number}}人</p>
                    </div>
                </div>
                <button type="submit" class="container__form--button">予約変更する</button>
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
        // watch:{
        //     date:function(){
        //         localStorage.setItem("date",JSON.stringify(this.date));
        //         },
        //     time:function(){
        //         localStorage.setItem("time",JSON.stringify(this.time));
        //     },
        //     number:function(){
        //         localStorage.setItem("number",JSON.stringify(this.number));
        //     },
        // },
        // mounted:function(){
        //     this.date = JSON.parse(localStorage.getItem("date")) || "";
        //     this.time = JSON.parse(localStorage.getItem("time")) || "";
        //     this.number = JSON.parse(localStorage.getItem("number")) || "1";
        // },
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