<head>
    <link rel="stylesheet" href="{{asset('/css/mypage.css')}}">
    <link rel="stylesheet" href="{{asset('/fontawesome-free-5.15.4-web/css/all.css')}}">
</head>


<x-layout>
    <div class="container--mypage" id="app">
        <div class="container--mypage__img-qr">
            <p class="container--mypage__img-qr--image"></p>

            <a @click="closeQr()" class="container--mypage__img-qr--close">
                <i class="far fa-times-circle"></i>
            </a>
        </div>
        <div class="container__profile">
            <div class="container__profile__name">
                <p>@{{name}}さん</p>
            </div>
        </div>

        <div class="container__reservation">
            <div class="container__reservation--title">
                <p>予約状況</p>
            </div>
            <p v-if="reservation_message">予約がありません。</p>
            <div class="container__reservation__list" v-for="(reservation,index) in reservations">
                <div class="container__reservation__list__info">
                    <i class="fas fa-clock"></i>
                    <p class="container__reservation__list__info--title">予約@{{index+1}}</p>
                    <i class="far fa-times-circle container__reservation__list__info--cancel" @click="cancelReservation(reservation.id)"></i>
                </div>
                <div class="container__reservation__list__table">

                    <div class="container__reservation__list__table__tr">
                        <p class="container__reservation__list__table__tr--th">Shop</p>
                        <p class="container__reservation__list__table__tr--td">@{{reservation.shop_id.name}}</p>
                    </div>

                    <div class="container__reservation__list__table__tr">
                        <p class="container__reservation__list__table__tr--th">Date</p>
                        <p class="container__reservation__list__table__tr--td">
                            @{{reservation.visited_on | changeDate}}
                        </p>
                    </div>

                    <div class="container__reservation__list__table__tr">
                        <p class="container__reservation__list__table__tr--th">Time</p>
                        <p class="container__reservation__list__table__tr--td">
                            @{{reservation.visited_on | changeTime}}
                        </p>
                    </div>

                    <div class="container__reservation__list__table__tr">
                        <p class="container__reservation__list__table__tr--th">Number</p>
                        <p class="container__reservation__list__table__tr--td">@{{reservation.number_of_people}}人</p>
                    </div>
                </div>
                <div class="container__reservation__list__edit">
                    <a @click="update(reservation.id)" class="container__reservation__list__edit--link">
                        予約変更
                    </a>
                    <a @click="evaluation(reservation.id)" class="container__reservation__list__edit--link">
                        評価する
                    </a>
                    <a @click="showQr(reservation)" class="container__reservation__list__edit--link">
                        QR表示
                    </a>
                </div>
            </div>
        </div>

        <div class="container__favorite">

            <div class="container__favorite--title">
                <p>お気に入り店舗</p>
            </div>
            <p v-if="favorite_message">お気に入りがありません。</p>

            <div class="container__favorite__flex">
                <div class="container__favorite__flex__shop" v-for="favorite in favorites">
                    <img class="container__favorite__flex__shop--img" v-bind:src="favorite.shop_id.image" alt="">
                    <p class="container__favorite__flex__shop--name">@{{favorite.shop_id.name}}</p>
                    <div class="container__favorite__flex__shop--info">
                        <p>
                            #@{{favorite.shop_id.area_id.name}}
                        </p>
                        <p>
                            #@{{favorite.shop_id.genre_id.name}}
                        </p>
                    </div>
                    <div class="container__favorite__flex__shop--buttom">
                        <a @click="detail(favorite.shop_id.id)" class="container__favorite__flex__shop--buttom--detail">詳しくみる</a>
                        <a @click="clickFavorite(favorite)" class="container__favorite__flex__shop--buttom--favorite">
                            <i class="fas fa-heart favorited">
                            </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>



    </div>
</x-layout>

<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fetch-jsonp@1.1.3/build/fetch-jsonp.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js"></script> <script>
    const vm = new Vue({
        el: '#app',
        data:{
            name:"",
            user_id:{{Auth::id()}},
            reservations:[],
            favorites:[],
            reservation_message:false,
            favorite_message:false,
        },
        methods:{
            getUser:async function(){
                let url = `/api/v1/user/${this.user_id}`;
                await axios.get(url)
                .then(function (response) {
                // handle success(axiosの処理が成功した場合に処理させたいことを記述)
                    vm.name = response.data.favorites[0].name;
                    vm.reservations = response.data.reservations[0].reservations;
                    vm.favorites = response.data.favorites[0].favorites;
                    if(vm.reservations.length == 0){
                        vm.reservation_message = true;
                    }else{
                        vm.reservation_message = false;
                    }
                    if(vm.favorites.length == 0){
                        vm.favorite_message = true;
                    }else{
                        vm.favorite_message = false;
                    }

                })
                .catch(function (error) {
                // handle error(axiosの処理にエラーが発生した場合に処理させたいことを記述)
                    console.log(error);
                })
                .finally(function () {
                // always executed(axiosの処理結果によらずいつも実行させたい処理を記述)
                });
            },
            cancelReservation:async function(id){
                if(!window.confirm("予約をキャンセルしますか？")){
                    return;
                }
                let url = `/api/v1/reservation/${id}`;
                await axios.delete(url)
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
                this.getUser();
                alert("予約をキャンセルしました。")
            },
            detail:function(id){
                window.location.href = `/detail/${id}`;
            },
            clickFavorite:async function(data){
                if(!window.confirm("お気に入りを解除しますか？")){
                    return;
                }
                console.log(data);
                let url = "/api/v1/favorite";
                await axios.delete(url,{
                    params:{
                        user_id:data.user_id,
                        shop_id:data.shop_id.id
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
                console.log(data.user_id);
                console.log(data.shop_id.id);
                this.getUser();
                alert("お気に入り解除しました。")
            },
            showQr:function(data){
                console.log(data);
                var qrtext = `予約情報\n${data.user_id.name}様\n店名:${data.shop_id.name}\nお時間:${data.visited_on}\n人数:${data.number_of_people}}`;
                console.log(qrtext);
                var utf8qrtext = unescape(encodeURIComponent(qrtext));
                $(".container--mypage__img-qr").find("p").qrcode({text:utf8qrtext});
                $(".container--mypage__img-qr").css("display","block");
            },
            closeQr:function(){
                console.log("log");
                $(".container--mypage__img-qr").find("p").html("");
                $(".container--mypage__img-qr").css("display","none");
            },
            update:function(id){
                window.location.href = `/update/${id}`;
            },
            evaluation:function(id){
                window.location.href = `/evaluation/${id}`;
            }
        },
        filters:{
            changeDate:function(date){
                const dt = Date.parse(date);
                var date = new Date(dt);
                return `${date.getFullYear()}/${date.getMonth()+1}/${date.getDate()}`;
            },
            changeTime:function(date){
                console.log(date);
                const dt = Date.parse(date);
                var date = new Date(dt);
                var hour = date.getHours();
                var min = date.getMinutes();
                console.log(( '00' + hour).slice(-2));
                console.log(( '00' + min).slice(-2));
                return ( '00' + hour).slice(-2) + ":"+( '00' + min).slice(-2);
            },
        },
        created:function(){
            this.getUser();
        }
    });
</script>
