<template>
    <div>
        <b-link id="view-sale-btn" v-b-modal.sale-modal @click="toggleModal">
            <svg xmlns="http://www.w3.org/2000/svg" style="color:green !important;" width="25" height="25" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
            </svg>
        </b-link>

        <b-modal v-model="show" centered ref="sale-modal" :title="'Details de la vente - ID = ' + item.id">
            <div class="d-block ">
                <ul id="example-2">
                    <li><b>Acheteur :</b>  {{ item.buyer }}</li>
                    <li><b>Quantite :</b>  {{ item.quantity }}</li>
                    <li><b>Bande:</b>  {{ item.band.label }}</li>
                    <li><b>Prix unitaire:</b> 
                        {{ Number(item.price).toLocaleString() }} F CFA
                    </li>
                    <li><b>Prix total :</b> 
                        {{ Number(item.total_price).toLocaleString() }} F CFA
                    </li>
                </ul> 
            </div>
        </b-modal>
    </div>
</template>

<script>
    export default {
        props: ["data"],
        data() {
            return {
                show: false,
                item: this.data
            }
        },
        methods: {
            toggleModal() {
                this.$refs['sale-modal'].toggle('#view-sale-btn')
            }
        }
    }
</script>