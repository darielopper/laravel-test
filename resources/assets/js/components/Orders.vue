<template>
    <table class="table table-condensed table-striped">
        <thead>
            <th v-for="item in headers">{{ item.text }}</th>
        </thead>
        <tbody>
            <tr v-for="(item, i) in elements" :key="i">
                <td v-for="(data,j) in headers" :key="`m${j}`">
                    {{ get_data(item, data, i) }}
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "Orders",
        props: {
            elements: {type: Array}
        },
        data(){
            return {
                headers: [
                    { text: "No.", abbr: null },
                    { text: "Client", abbr: "client"},
                    { text: "Offer", abbr: "offer"},
                    { text: "Amount", abbr: "amount"},
                    { text: "Price", abbr: "price" }
                ]
            }
        },
        mounted(){

        },
        computed: {

        },
        methods: {
            get_data(item, data, i){
                return item[data.abbr] ? item[data.abbr] : i + 1;
            }
        }
    }
</script>

<style scoped>

</style>