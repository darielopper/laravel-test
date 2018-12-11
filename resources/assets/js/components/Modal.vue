<template>
    <!-- Modal section -->
    <div :class="{modal: true, fade: true, in: show_modal}" id="orderModal" tabindex="-1" role="dialog" v-show="show_modal">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="orderModalLabel">{{ mtitle }}</h4>
                </div>
                <div class="modal-body">
                    <slot name="body">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="Client" v-model="model.client"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control" v-model="model.offer">
                                    <option value="0">Select 1 offer</option>
                                    <option v-for="(item, j) in offers" :key="`o${j}`" :value="item.id">{{ item.text }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" class="form-control" v-model="model.amount" />
                            </div>
                        </div>
                    </slot>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" @click="accept" :disabled="!valid_data">ACCEPT</button>
                    <button type="reset" class="btn btn-default btn-sm" data-dismiss="modal" @click="$emit('reject')">CANCEL</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Modal",
        data(){
            return {
                model: {
                    client: '',
                    offer: 0,
                    amount: 1
                },
                show_modal: true,
                offers: []
            }
        },
        props: {
            mtitle: {type: String, default: 'Add Order'}
        },
        methods: {
            accept(){
                this.$emit('accept', JSON.parse(JSON.stringify(this.model)));
                this.clearData();
                this.show_modal = false;
                let modal = document.querySelector('.modal-backdrop');
                modal.remove();
            },
            clearData(){
                this.model.client = '';
                this.offer = 0;
                this.amount = 1;
            }
        },
        created(){
          this.$axios.post('/offers/list').then((json) => {
              for(let element of json.data){
                  this.offers.push({id: element.id, text: `${element.type} - ${element.size}`});
              }
          }).catch(error => {
              console.log(error);
              alert('Some error loading offers');
          })
        },
        computed: {
            valid_data(){
                return this.model.amount > 0 && this.model.client.length > 3 && this.model.offer !== 0;
            }
        }
    }
</script>

<style scoped>

</style>