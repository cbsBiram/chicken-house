<template>
    <div>
        <b-link id="view-band-btn" v-b-modal.band-modal @click="toggleModal">
            <svg xmlns="http://www.w3.org/2000/svg" style="color:green !important;" width="25" height="25" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
            </svg>
        </b-link>

        <b-modal v-model="show" centered ref="band-modal" :title="'Détails de la bande ' + item.label + ' - ID = ' + item.id">
            <div class="d-block ">
                <ul id="example-1">
                    <li><b>Fournisseur :</b>  {{ item.provider }}</li>
                    <li><b>Quantité initiale :</b>  {{ item.quantity }}</li>
                    <li><b>Perte(s) :</b>  {{ item.loss }}</li>
                    <li><b>Prix d'achat :</b> 
                        {{ Number(item.purchase_price).toLocaleString() }} F CFA
                    </li>
                    <li><b>Bénéfices :</b> 
                        {{ Number(item.purchase_price).toLocaleString() }} F CFA
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
                this.$refs['band-modal'].toggle('#view-band-btn')
            }
        }
    }
</script>