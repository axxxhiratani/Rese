<head>
    <link rel="stylesheet" href="{{asset('/css/reservation.css')}}">
    <link rel="stylesheet" href="{{asset('/fontawesome-free-5.15.4-web/css/all.css')}}">
</head>

<x-layout>
    <div class="containers">
        <div class="container--reservation" id="app">
            <div class="container__detail">
                <a href="/" class="container__detail--back"><</a>
                <p class="container__detail--name">{{$shop->name}}</p>
                <img class="container__detail--img" src="{{$shop->genre->image}}" alt="">
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
                    <input type="date" min="2021-03-01" name="date" class="container__form--date" v-model="date">
                    @error('date')
                        <p class="container__form--error">{{$message}}</p>
                    @enderror
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
                    @error('time')
                        <p class="container__form--error">{{$message}}</p>
                    @enderror
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
                            <p class="container__form__info__tr--td">@{{date | changeDate}}</p>
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
                    <button type="submit" class="container__form--button">予約する</button>
                </form>
            </div>
        </div>
        <div class="container__evaluation">
                @foreach ($shop->evaluations as $evaluation)
                    <div class="container__evaluation__list">
                        <p class="container__evaluation__list--name">
                            <i class="fas fa-user"></i>
                            {{$evaluation->user->name}}
                        </p>
                        <p class="container__evaluation__list--comment">
                            {{$evaluation->comment}}
                        </p>
                        <p class="container__evaluation__list--star">
                            @for ($i = 1; $i <= $evaluation->evaluation; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                            ({{$evaluation->evaluation}})
                        </p>
                        <p class="container__evaluation__list--created">
                            投稿日:{{$evaluation->created_at}}
                        </p>
                    </div>
                @endforeach
        </div>
    </div>
</x-layout>

<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
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
        watch:{
            date:function(){
                var dtToday= new Date();
                var month= dtToday.getMonth();
                var day= dtToday.getDate();
                var year= dtToday.getFullYear();
                var today = new Date(year,month,day);
                var selectday = Date.parse(this.date);
                if( today.valueOf() > selectday.valueOf()){
                    alert("前日は選択できません");
                    this.date = JSON.parse(localStorage.getItem("date")) || "";
                }else{
                    localStorage.setItem("date",JSON.stringify(this.date));
                }
                },
            time:function(){
                localStorage.setItem("time",JSON.stringify(this.time));
            },
            number:function(){
                localStorage.setItem("number",JSON.stringify(this.number));
            },
        },
        mounted:function(){
            this.date = JSON.parse(localStorage.getItem("date")) || "";
            this.time = JSON.parse(localStorage.getItem("time")) || "";
            this.number = JSON.parse(localStorage.getItem("number")) || "1";
        },
        filters:{
            changeDate:function(date){
                return date;
            },
            changeTime:function(date){

                return date.slice(0,5);
            },
        },
    })
</script>
