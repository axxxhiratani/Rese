<head>
    <link rel="stylesheet" href="{{asset('/css/admin/home.css')}}">
</head>


<x-layout_admin>
    <div class="container--reservation" id="app">
        <p class="container--title">
                オーナーリスト
        </p>
        <div class="container__list">
            <div class="container__list__tr">
                <p class="container__list__tr--th">
                    #
                </p>
                <p class="container__list__tr--th">
                    name
                </p>
                <p class="container__list__tr--th">
                    email
                </p>
            </div>
            @foreach ($admins as $admin)
                <div class="container__list__tr">
                    <p class="container__list__tr--td">
                        {{$loop->index + 1}}
                    </p>
                    <p class="container__list__tr--td">
                        {{$admin->name}}
                    </p>
                    <p class="container__list__tr--td">
                        {{$admin->email}}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</x-layout_admin>
