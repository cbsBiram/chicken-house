<template>
    <div class="container">
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-header">
                    Informations générales
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                <div class="col-xl-4 col-sm-6 py-2">
                    <div class="card bg-success text-white h-100 general">
                        <div class="card-body bg-success">
                            <div class="rotate" >
                                <i class="fa fa-money fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Chiffre d'Affaire global en F CFA</h6>
                            <h1 class="display-4">{{ Number(salesFigure).toLocaleString() }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 py-2">
                    <div class="card text-white bg-danger h-100 general">
                        <div class="card-body bg-danger">
                            <div class="rotate">
                                <i class="fa fa-list fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Nombre de bandes</h6>
                            <h1 class="display-4">{{ bands.length }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 py-2">
                    <div class="card text-white bg-info h-100 general">
                        <div class="card-body bg-info">
                            <div class="rotate">
                                <i class="fa fa-spinner fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Nombre de bandes en cours</h6>
                            <h1 class="display-4">{{ bandInProgress }}</h1>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>

            <div class="card mt-4"> 
                <div class="card-header">
                    Indicateur(s) de performance
                </div>
                <div class="card-body">
                    <div class="mb-3 col-sm-12">
                        <line-chart :chartdata="chartData" :styles="myStyles" :options="options"></line-chart>
                    </div>
                    <div class="mb-2 col-sm-12" style="text-align: center;">
                        <b-badge href="#" variant="info">
                            <span style="font-size: 14px;">Rendement = Gains / Charges en %</span>
                        </b-badge>
                    </div>
                </div>
            </div>

            <div class="card mt-4"> 
                <div class="card-header">
                    Bandes
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <b-table responsive outlined  head-variant="light"   
                                class="mt-3" 
                                id="band-table" 
                                :items="bands" 
                                :fields="bandFields"
                                :per-page="perPage"
                                :current-page="currentPage"
                            >   
                                <!-- Virtual column # -->
                                <template #cell(#)="data">
                                    {{ data.index + 1 }}
                                </template>
                                <template v-slot(band)="data">
                                    {{ data }}
                                </template>
                                <!-- Actions -->
                                <template v-slot:cell(action)="data">
                                    <band-modal :data="data.item">
                                    </band-modal>
                                </template>
                            </b-table>
                            <b-pagination
                                v-model="currentPage"
                                :total-rows="bands.length"
                                :per-page="perPage"
                                align="left"
                                prev-text="<"
                                next-text=">"
                                first-number
                                last-number
                                aria-controls="band-table"
                            ></b-pagination>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4"> 
                <div class="card-header">
                    Ventes
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <b-table responsive outlined  head-variant="light"
                                class="mt-3" 
                                id="sale-table" 
                                :items="sales" 
                                :fields="saleFields"
                                :per-page="perPage"
                                :current-page="currentPage"
                            >   
                                <!-- A virtual column -->
                                <template #cell(#)="data">
                                    {{ data.index + 1 }}
                                </template>
                                <!-- Actions -->
                                <template v-slot:cell(action)="data">
                                    <sale-modal :data="data.item">
                                    </sale-modal>
                                </template>
                            </b-table>
                            <b-pagination
                                v-model="currentPage"
                                :total-rows="sales.length"
                                :per-page="perPage"
                                prev-text="<"
                                next-text=">"
                                first-number
                                last-number
                                align="left"
                                aria-controls="sale-table"
                            ></b-pagination>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BandModal from "./BandModal.vue";
import LineChart from "./LineChart.vue";
import SaleModal from "./SaleModal.vue";

  export default {
    name: "DashboardComponent",
    components: {
        LineChart, BandModal, SaleModal
    },
    props: ["bands", "sales", "salesFigure", "bandInProgress", "monthlyPerformance"],
    data() {
      return {
        currentPage: 1,
        bandFields: [
            '#',
            {
                key: 'label',
                label: 'Label',
                thClass: 'font-weight-bold'
            },
            {
                key: 'remaining',
                label: 'Restant(s)',
                thClass: 'font-weight-bold',
            },
            {
                key: 'sold',
                label: 'Vendu(s)',
                thClass: 'font-weight-bold',
            },
            {
                key: 'sales_figure',
                label: 'Chiffre d\'affaire (F CFA)',
                thClass: 'font-weight-bold',
                formatter: "formatNumber"
            },
            'action'
        ],
        perPage: 5,
        saleFields: [
            '#',
            {
                key: 'band.label',
                label: 'Bande',
                thClass: 'font-weight-bold'
            },
            {
                key: 'status',
                label: 'Statut',
                thClass: 'font-weight-bold',
                formatter: 'saleStatusFr'
            },
            {
                key: 'total_price',
                label: 'Prix de vente (F CFA)',
                thClass: 'font-weight-bold',
                formatter: "formatNumber"
            },
            'action'
        ],
        chartData: {
            labels: ["Jan", "Fev", "Mar", "Avr", "Mai", "Jui", "Juill", "Aou", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                data: this.monthlyPerformance,
                label: "Rendement",
                borderColor: "#e8c3b9",
                pointBackgroundColor: 'white',
                borderWidth: 1,
                pointBorderColor: '#249EBF',
                fill: true
            }],
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              },
              gridLines: {
                display: true
              }
            }],
            xAxes: [ {
              gridLines: {
                display: false
              }
            }]
          },
          legend: {
            display: true
          },
          responsive: true,
          maintainAspectRatio: false
        }
      }
    },
    computed: {
         myStyles () {
            return {
                height: "400px",
                
                position: 'relative'
            }
        }
    },
    methods: {
        formatNumber(value) {
            return Number(value).toLocaleString();
        },
        saleStatusFr(status) {
            if(status === 'pending') return 'En attente';

            return 'Paye';
        },
    },
  }
</script>

<style>
    .general {
        border-radius: 15px !important;
        border-color: transparent;
        overflow: hidden;
    }

    .rotate i {
        color: rgba(20, 20, 20, 0.15);
        position: absolute;
        left: 0;
        left: auto;
        right: 9px;
        bottom: 5px;
        display: block;
    }
</style>
