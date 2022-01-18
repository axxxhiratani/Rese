<head>
    <link rel="stylesheet" href="{{asset('/css/index.css')}}">
</head>


<x-layout>
    <div class="container" id="app">
        <div class="container__search">
            <select name="" id="" class="container__search--input--area"></select>
            <select name="" id="" class="container__search--input--genre"></select>
            <input type="text" name="" id="" class="container__search--input--name">
        </div>
        <div class="container__list">
            <div class="container__list__shop" v-for="shop in shops">
                <img class="container__list__shop--img" v-bind:src="shop.image" alt="">
                <p class="container__list__shop--name">@{{shop.name}}</p>

                <p class="container__list__shop--info">
                    <span>
                        #@{{shop.area}}
                    </span>
                    <span>
                        #@{{shop.area}}
                    </span>
                </p>
                <div class="container__list__shop--buttom">
                    <a @click="detail(shop.id)" class="container__list__shop--buttom--detail">詳しくみる</a>
                    <a href="" class="container__list__shop--buttom--favorite">♡</a>
                </div>
            </div>
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
                shops:[],
            },
            methods:{
                getShopAll:async function(){
                    let url = "api/v1/shop";
                    await axios.get(url)
                    .then(function (response) {
                    // handle success(axiosの処理が成功した場合に処理させたいことを記述)
                        console.log(response.data.shops);
                        vm.shops = response.data.shops;
                    })
                    .catch(function (error) {
                    // handle error(axiosの処理にエラーが発生した場合に処理させたいことを記述)
                        console.log(error);
                    })
                    .finally(function () {
                    // always executed(axiosの処理結果によらずいつも実行させたい処理を記述)
                    });
                },
                detail:function(id){
                    window.location.href = `/detail/${id}`;
                }
            },
            created:function(){
                this.getShopAll();
            }
        })
    </script>
