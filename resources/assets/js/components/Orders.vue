<template>
    <table class="table table-condensed table-striped">
        <thead>
            <th v-for="item in headers">{{ item }}</th>
        </thead>
            <tbody>
            </tbody>
    </table>
</template>

<script>
    export default {
        name: "Orders",
        data(){
            return {
                headers: [
                    "No.",
                    "Client",
                    "Offer",
                    "Amount",
                    "Price"
                ]
            }
        },
        mounted(){
            console.log('probando');
        }
    }
</script>

<style scoped>

</style>