<head>
    <link rel="stylesheet" href="{{asset('/css/index.css')}}">
</head>


<x-layout>
    <div class="container">
        <form action="/done" method="post">
            @csrf
            <input type="date" name="date">
            <select name="time">
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
            <select name="number_of_people">
                @for ($i = 1; $i < 10; $i++)
                    <option value="{{$i}}">{{$i}}人</option>
                @endfor
            </select>
            <input type="hidden" name="shop_id" value="{{$shop->id}}">
            <input type="hidden" name="user_id" value="1">
            <button type="submit">予約</button>
        </form>
    </div>
</x-layout>
