<template>
    <!-- Modal section -->
    <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" v-show="show_modal">
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
                                    <option>Select 1 offer</option>
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
                    offer: '',
                    amount: 1
                },
                show_modal: true
            }
        },
        props: {
            mtitle: {type: String, default: 'Add Order'}
        },
        methods: {
            accept(){
                this.$emit('accept', this.model);
                alert('aki');
            }
        },
        computed: {
            valid_data(){
                return this.model.amount > 0 && this.model.client.length > 3 && this.model.offer !== 'Select 1 Offer';
            }
        }
    }
</script>

<style scoped>

</style>