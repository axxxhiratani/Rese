<head>
    <link rel="stylesheet" href="{{asset('/css/index.css')}}">
</head>


<x-layout>
    <div class="container" id="app">
        <div class="container__search">
            <select v-model="area" class="container__search--input--area">
                <option value="">
                    All area
                </option>
                <option value="東京都">
                    東京都
                </option>
                <option value="大阪府">
                    大阪府
                </option>
                <option value="福岡県">
                    福岡県
                </option>
            </select>
            <select v-model="genre_id" class="container__search--input--genre">
                <option v-bind:value="genre.id" v-for="genre in genres">
                    @{{genre.name}}
                </option>
            </select>
            <input type="text" v-model="name" class="container__search--input--name">
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
                        #@{{shop.genre_id.name}}
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
                genres:[],
                area:"",
                genre_id:"",
                name:"",
            },
            watch:{
                area:function(){
                    this.getShopSearch();
                },
                genre_id:function(){
                    this.getShopSearch();
                },
                name:function(){
                    this.getShopSearch();
                }
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

                getShopSearch:async function(){
                    let url = "api/v1/shop/search";
                    await axios.get(url,{
                        params:{
                            area:this.area,
                            genre_id:this.genre_id,
                            name:this.name
                        }
                    })
                    .then(function (response) {
                    // handle success(axiosの処理が成功した場合に処理させたいことを記述)
                        console.log("data");
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



                getGenreAll:async function(){
                    let url = "api/v1/genre";
                    await axios.get(url)
                    .then(function (response) {
                    // handle success(axiosの処理が成功した場合に処理させたいことを記述)
                        console.log(response.data.genres);
                        vm.genres = response.data.genres;
                        vm.genres.unshift({
                                    id:"",
                                    name:"All Genre",
                                    created_at: "",
                                    updated_at: ""
                                });
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
                this.getGenreAll();
            }
        })
    </script>
