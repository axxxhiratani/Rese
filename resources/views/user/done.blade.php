<head>
    <link rel="stylesheet" href="{{asset('/css/done.css')}}">
</head>

<x-layout>
<div class="container--done">
    <p class="container--done--message">ご予約ありがとうございます</p>
    <a href="/" class="container--done--link">戻る</a>
</div>
</x-layout>


<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fetch-jsonp@1.1.3/build/fetch-jsonp.min.js"></script>
<script>
    const vm = new Vue({
        el: '#app',
        data: {
        },
        watch:{
        },
        mounted: function(){
        },
        methods:{
            reset:function(){
                data = ""
                localStorage.setItem("date",JSON.stringify(data));
                localStorage.setItem("time",JSON.stringify(data));
                localStorage.setItem("number",JSON.stringify(1));
            }
        },
        computed:{
        },
        created:function(){
            this.reset();
        }
    })
</script>
