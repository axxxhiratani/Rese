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
                オーナーid
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
                    {{$admin->id}}
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

            methods:{
            },
        })
    </script>
