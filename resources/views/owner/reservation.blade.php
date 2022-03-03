<head>
    <link rel="stylesheet" href="{{asset('/css/owner/reservation.css')}}">
</head>

<x-layout_owner>
    <div class="container--reservation" id="app">
        <p class="container--title">
                予約リスト
        </p>
        <div class="container__list">
            <div class="container__list__tr">
                <p class="container__list__tr--th">
                    #
                </p>
                <p class="container__list__tr--th">
                    店舗名
                </p>
                <p class="container__list__tr--th">
                    お客様名
                </p>
                <p class="container__list__tr--th">
                    予約人数
                </p>
                <p class="container__list__tr--th">
                    時刻
                </p>
            </div>
            <div class="container__list__tr" v-for="(reservation,index) in reservations">
                <p class="container__list__tr--td">
                    @{{index + 1}}
                </p>
                <p class="container__list__tr--td">
                    @{{reservation.shop.name}}
                </p>
                <p class="container__list__tr--td">
                    @{{reservation.user.name}}
                </p>
                <p class="container__list__tr--td">
                    @{{reservation.number_of_people}}人
                </p>
                <p class="container__list__tr--td">
                    @{{reservation.visited_on}}
                </p>
            </div>
            <div v-if="message_resevation" class="container__list__message">
                <p>
                    予約がありません。
                </p>
            </div>
        </div>
    </div>
</x-layout_owner>

<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fetch-jsonp@1.1.3/build/fetch-jsonp.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    const vm = new Vue({
        el: '#app',
        data:{
            owner:null,
            reservations:[],
            links:[],
            user_id:{{Auth::guard('owner')->id()}},
            message_resevation:false,
        },
        watch:{
        },
        methods:{
            getReservation:async function() {
                let url = `/api/v1/owner/reservation/${this.user_id}`;
                await axios.get(url)
                .then(function (response) {
                // handle success(axiosの処理が成功した場合に処理させたいことを記述)
                    if(response.data.reservations.length == 0){
                        vm.message_resevation = true;
                    }
                    vm.reservations = response.data.reservations;
                })
                .catch(function (error) {
                // handle error(axiosの処理にエラーが発生した場合に処理させたいことを記述)
                    console.log(error);
                })
                .finally(function () {
                // always executed(axiosの処理結果によらずいつも実行させたい処理を記述)
                });
            },
        },
        created:function(){
            this.getReservation();
        },
    })
</script>
