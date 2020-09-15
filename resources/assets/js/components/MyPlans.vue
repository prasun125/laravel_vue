<template>
    <div class="container my-plan-container">
        <div v-if="this.plans !== ''">
           <div v-if="this.plans.plans != 0">
                <div class="list-group" v-for="(items, index) in this.plans.plans">
                    <a v-bind:href="'/modify-route/'+items[0].id"  style="color: #636b6f !important; font-weight: 100;">
                        <div class="list-group-item my-plan-item">
                            <p><span class="my-plan-icon start-icon"><i class="material-icons">terrain</i></span><span class="my-plan-text">{{ items[0].route_title }}</span> <span class="my-plan-icon start-icon"><i class="material-icons">account_balance_wallet</i></span><span class="my-plan-text">{{ items[0].total_price}}$</span><span class="my-plan-icon start-icon"><i class="material-icons">person</i></span><span class="my-plan-text">{{ items[0].total_travellers }} Travellers</span></p>
                            <p><span class="my-plan-icon"><i class="material-icons">event_note</i></span><span class="my-plan-text">{{ items[0].start_date }} - {{ items[0].end_date }}</span></p>
                            <p><span class="my-plan-icon"><i class="material-icons">event_available</i></span ><span class="my-plan-text">Last updated at: {{ items[0].updated_at }}</span></p>
                        </div>
                    </a>
                </div>
                <div class="my-plans-link display-flex center-justify-content" >
                    <a href="/my-plans" style="color: #636b6f !important;">See all</a>
                </div>
           </div>
            <div v-else>
                <div class="list-group">
                    <div class="list-group-item my-plan-item">
                        <a href="javascript:void(0)" style="color: black !important;">You don't have any routes</a>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <div class="list-group">
                <div class="list-group-item my-plan-item">
                    <a href="javascript:void(0)" style="color: black !important;">You don't have any routes</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
          return{
              plans: [],
              url: "modify-route"
          }
        },
        mounted(){
            this.fetchMyPlans();
        },
        methods: {
            redirect: function(){
            },
            fetchMyPlans: function(){
                let that = this;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                axios.post('/fetch-plans','a').then(function(response){
                    that.plans = response.data;
                    that.$root.plans = response.data;
                });
            },
        }
    }
</script>

<style scoped>
    .my-plan-container{
        width: 100%;
        max-height: 400px;
        overflow: auto;
    }
    .list-group{
        color: black;
        border: none;
    }
    .list-group a:hover{
        text-decoration: none;
        /*background*/


    }
    .my-plan-item{
        padding: 10px 20px;
        border: none;
        border-bottom: 1px solid #D3D3D3;
    }
    .my-plan-item:hover{
        background-color: #f5f8fa !important;
    }
    .my-plan-icon{
        position: absolute;
    }
    .start-icon{
        top: 8px;
    }

    .my-plan-text{
        margin-left: 28px;
    }
    .my-plans-link{
        color: #000;
    }

</style>