<template>
    <div v-for="items in this.$root.addOnCities">
       <span>@{{items.city_name}}</span>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                // addOnCities: []
            }
        }
    }
</script>

<style scoped>

</style>