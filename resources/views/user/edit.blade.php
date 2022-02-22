<head>
    <link rel="stylesheet" href="{{asset('/css/edit.css')}}">
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
            <form action="/change" method="post">
                @csrf

                <input type="date" name="date" class="container__form--date" value="{{$date}}">
                @error('date')
                    <p class="container__form--error">{{$message}}</p>
                @enderror
                <select name="time" class="container__form--select">
                    <option value="{{$time}}" selected >{{substr($time,0,5)}}</option>
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
                <select name="number_of_people" class="container__form--select">
                    <option value="{{$reservation->number_of_people}}" selected >{{$reservation->number_of_people}}人</option>

                    @for ($i = 1; $i < 10; $i++)
                    <option value="{{$i}}">{{$i}}人</option>
                    @endfor
                </select>
                <input type="hidden" name="id" value="{{$reservation->id}}">

                <button type="submit" class="container__form--button">予約変更する</button>
            </form>
        </div>
    </div>
</x-layout>
