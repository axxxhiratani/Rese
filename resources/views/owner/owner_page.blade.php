<head>
    <link rel="stylesheet" href="{{asset('/css/owner/index.css')}}">
    <link rel="stylesheet" href="{{asset('/fontawesome-free-5.15.4-web/css/all.css')}}">
</head>


<x-layout_owner>

    <div class="container" id="app">
        <div class="container__user">
            <p class="container__user--name">
                <i class="fas fa-user">
                    @{{owner.name}}
                </i>
            </p>
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
                    <a @click="detail(shop.id)" class="container__list__shop--buttom--detail">店舗情報の変更</a>
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
                owner:null,
                shops:[],
                links:[],
                user_id:{{Auth::guard('owner')->id()}},
            },
            watch:{
            },

            methods:{
                getOwner:async function() {
                    let url = `/api/v1/owner/${this.user_id}`;
                    await axios.get(url)
                    .then(function (response) {
                    // handle success(axiosの処理が成功した場合に処理させたいことを記述)
                        console.log(response.data.owner[0]);
                        vm.owner = response.data.owner[0];
                    })
                    .catch(function (error) {
                    // handle error(axiosの処理にエラーが発生した場合に処理させたいことを記述)
                        console.log(error);
                    })
                    .finally(function () {
                    // always executed(axiosの処理結果によらずいつも実行させたい処理を記述)
                    });
                },
                getShopAll:async function(){
                    let url = `/api/v1/owner/shop/${this.user_id}`;
                    await axios.get(url)
                    .then(function (response) {
                    // handle success(axiosの処理が成功した場合に処理させたいことを記述)
                        console.log(response.data.shops.links);
                        vm.shops = response.data.shops.data;
                        // vm.links = response.data.shops.links;
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





                movePage:async function(url){

                    if(!url){
                        return;
                    }
                    await axios.get(url)
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
                    window.location.href = `/owner/detail/${id}`;
                }
            },
            created:function(){
                this.getOwner();
                this.getShopAll();
            },
        })
    </script>
