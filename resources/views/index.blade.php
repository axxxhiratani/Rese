<head>
    <link rel="stylesheet" href="{{asset('/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('/fontawesome-free-5.15.4-web/css/all.css')}}">
</head>


<x-layout>
    <div class="container" id="app">
        <div class="container__search">
            <select v-model="area_id" class="container__search--input--genre">
                <option v-bind:value="area.id" v-for="area in areas">
                    @{{area.name}}
                </option>
            </select>
            <select v-model="genre_id" class="container__search--input--genre">
                <option v-bind:value="genre.id" v-for="genre in genres">
                    @{{genre.name}}
                </option>
            </select>
            <i class="fas fa-search">
            </i>
            <input type="text" v-model="name" class="container__search--input--name">
        </div>
        <div class="container__list">
            <div class="container__list__shop" v-for="(shop,index) in shops">
                <img class="container__list__shop--img" v-bind:src="shop.image" alt="">
                <p class="container__list__shop--name">@{{shop.name}}</p>

                <div class="container__list__shop--info">
                    <p>
                        #@{{shop.area_id.name}}
                    </p>
                    <p>
                        #@{{shop.genre_id.name}}
                    </p>
                </div>
                <div class="container__list__shop--buttom">
                    <a @click="detail(shop.id)" class="container__list__shop--buttom--detail">詳しくみる</a>
                    <a @click="clickFavorite(shop.id,user_id,index)" class="container__list__shop--buttom--favorite">
                        <i v-bind:class="decorationFavorite(shop.id,user_id,index)">
                        </i>
                    </a>
                </div>
            </div>
        </div>
        <div class="container__page">
            <div @click="movePage(link.url)" v-for="(link) in links" v-bind:class="activePage(link.active)">
                <a v-if="link.label.includes('Previous')" v-bind:class="activePageLink(link.active)">
                    <
                </a>
                <a v-else-if="link.label.includes('Next')" v-bind:class="activePageLink(link.active)">
                    >
                </a>
                <a v-else v-bind:class="activePageLink(link.active)">
                    @{{link.label}}
                </a>
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
                areas:[],
                links:[],
                favorites:[],
                user_id:{{Auth::id()}},
                area_id:"",
                genre_id:"",
                name:"",
            },
            watch:{
                area_id:function(){
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
                        vm.shops = response.data.shops.data;
                        vm.links = response.data.shops.links;
                        console.log(vm.links);
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
                            area_id:this.area_id,
                            genre_id:this.genre_id,
                            name:this.name
                        }
                    })
                    .then(function (response) {
                    // handle success(axiosの処理が成功した場合に処理させたいことを記述)
                        vm.shops = response.data.shops.data;
                        vm.links = response.data.shops.links;
                    })
                    .catch(function (error) {
                    // handle error(axiosの処理にエラーが発生した場合に処理させたいことを記述)
                        console.log(error);
                    })
                    .finally(function () {
                    // always executed(axiosの処理結果によらずいつも実行させたい処理を記述)
                    });
                    this.getFavorite();
                },

                getGenreAll:async function(){
                    let url = "api/v1/genre";
                    await axios.get(url)
                    .then(function (response) {
                    // handle success(axiosの処理が成功した場合に処理させたいことを記述)
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

                getAreaAll:async function(){
                    let url = "api/v1/area";
                    await axios.get(url)
                    .then(function (response) {
                    // handle success(axiosの処理が成功した場合に処理させたいことを記述)
                        vm.areas = response.data.areas;
                        vm.areas.unshift({
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

                getFavorite:async function () {
                    let url = `api/v1/favorite/${this.user_id}`;
                    await axios.get(url)
                    .then(function (response) {
                    // handle success(axiosの処理が成功した場合に処理させたいことを記述)
                        vm.favorites = response.data.favorites;
                    })
                    .catch(function (error) {
                    // handle error(axiosの処理にエラーが発生した場合に処理させたいことを記述)
                        console.log(error);
                    })
                    .finally(function () {
                    // always executed(axiosの処理結果によらずいつも実行させたい処理を記述)
                    });
                },

                decorationFavorite:function(shop_id,user_id,index){
                    let style = "fas fa-heart";
                    if(this.checkFavorite(shop_id,user_id,index)){
                        style = "fas fa-heart favorited"
                    }
                    return style;
                },

                checkFavorite:function(shop_id,user_id,index){
                    let flg = false;
                    this.favorites.forEach(value =>{
                        if(value.user_id == user_id && value.shop_id == shop_id){
                            flg = true;
                        }
                    });
                    return flg;
                },

                clickFavorite:function(shop_id,user_id,index){
                    if(!this.checkFavorite(shop_id,user_id,index)){
                        if(!window.confirm("お気に入り登録しますか？")){
                            return;
                        }
                        this.addFavorite(shop_id,user_id,index);
                    }else{
                        if(!window.confirm("お気に入りを解除しますか？")){
                            return;
                        }
                        this.deleteFavorite(shop_id,user_id,index);
                    }

                },

                addFavorite:async function(shop_id,user_id,index){
                    let url = "api/v1/favorite";
                    await axios.post(url,{
                        user_id:user_id,
                        shop_id:shop_id
                    })
                    .then(function (response) {
                    // handle success(axiosの処理が成功した場合に処理させたいことを記述)
                    })
                    .catch(function (error) {
                    // handle error(axiosの処理にエラーが発生した場合に処理させたいことを記述)
                        console.log(error);
                    })
                    .finally(function () {
                    // always executed(axiosの処理結果によらずいつも実行させたい処理を記述)
                    });
                    alert("お気に入り登録しました。");
                    this.toggleHert(index);
                },
                deleteFavorite:async function(shop_id,user_id,index){
                    let url = "api/v1/favorite";
                    await axios.delete(url,{
                        params:{
                            user_id:user_id,
                            shop_id:shop_id
                        }
                    })
                    .then(function (response) {
                    // handle success(axiosの処理が成功した場合に処理させたいことを記述)
                    })
                    .catch(function (error) {
                    // handle error(axiosの処理にエラーが発生した場合に処理させたいことを記述)
                        console.log(error);
                    })
                    .finally(function () {
                    // always executed(axiosの処理結果によらずいつも実行させたい処理を記述)
                    });
                    alert("お気に入りを解除しました。");
                    this.toggleHert(index);
                },

                movePage:async function(url){

                    if(!url){
                        return;
                    }
                    this.getFavorite();
                    await axios.get(url,{
                        params:{
                            area_id:this.area_id,
                            genre_id:this.genre_id,
                            name:this.name
                        }
                    })
                    .then(function (response) {
                    // handle success(axiosの処理が成功した場合に処理させたいことを記述)
                        vm.shops = response.data.shops.data;
                        vm.links = response.data.shops.links;
                    })
                    .catch(function (error) {
                    // handle error(axiosの処理にエラーが発生した場合に処理させたいことを記述)
                        console.log(error);
                    })
                    .finally(function () {
                    // always executed(axiosの処理結果によらずいつも実行させたい処理を記述)
                    });
                },

                toggleHert:function(index){
                    $(".container__list__shop--buttom--favorite").eq(index).find("i").toggleClass("favorited");
                },

                activePage:function(data){
                    let style = "";
                    if(data){
                        style = "container__page__link active";
                    }else{
                        style = "container__page__link";
                    }
                    return style;
                },
                activePageLink:function(data){
                    let style = "";
                    if(data){
                        style = "active";
                    }
                    return style;
                },
                detail:function(id){
                    window.location.href = `/detail/${id}`;
                }
            },
            created:function(){
                this.getShopAll();
                this.getAreaAll();
                this.getGenreAll();
                this.getFavorite();
            },
        })
    </script>
