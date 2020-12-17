<template>
    <div class="container">
        <div class="col-md-12">
            <div class="card mt-4"> 
                <div class="card-header">
                    Liste des Ventes
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <b-row>
                                <b-col sm="5" md="6" class="mt-2 mb-2">
                                        <b-form-group
                                            label="Par page"
                                            label-cols-sm="6"
                                            label-cols-md="4"
                                            label-cols-lg="3"
                                            label-align-sm="right"
                                            label-size="sm"
                                            label-for="perPageSelect"
                                            class="mb-2"
                                        >
                                            <b-form-select
                                            v-model="perPage"
                                            id="per-page-select"
                                            size="sm"
                                            :options="pageOptions"
                                            ></b-form-select>
                                        </b-form-group>
                                </b-col>
                            </b-row>
                            <b-row>
                                <b-col lg="6" class="my-1">
                                    <b-form-group
                                    label="Filtrer"
                                    label-for="filter-input"
                                    label-cols-sm="3"
                                    label-align-sm="right"
                                    label-size="sm"
                                    class="mb-0"
                                    >
                                    <b-input-group size="sm">
                                        <b-form-input
                                        id="filter-input"
                                        v-model="filter"
                                        type="search"
                                        placeholder="Type to Search"
                                        ></b-form-input>

                                        <b-input-group-append>
                                        <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
                                        </b-input-group-append>
                                    </b-input-group>
                                    </b-form-group>
                                </b-col>

                                <b-col lg="6" class="my-1">
                                    <b-form-group
                                    v-model="sortDirection"
                                    label="Filter On"
                                    description="Leave all unchecked to filter on all data"
                                    label-cols-sm="3"
                                    label-align-sm="right"
                                    label-size="sm"
                                    class="mb-0"
                                    v-slot="{ ariaDescribedby }"
                                    >
                                        <b-form-checkbox-group
                                            v-model="filterOn"
                                            :aria-describedby="ariaDescribedby"
                                            class="mt-1"
                                        >
                                            <b-form-checkbox value="band.label">Label</b-form-checkbox>
                                            <b-form-checkbox value="status">Statut</b-form-checkbox>
                                            <b-form-checkbox value="buyer">Acheteur</b-form-checkbox>
                                        </b-form-checkbox-group>
                                    </b-form-group>
                                </b-col>

                            </b-row>
                            <b-table responsive outlined  head-variant="light"   
                                class="mt-3" 
                                id="sale-table" 
                                :items="sales" 
                                :fields="fields"
                                :per-page="perPage"
                                :current-page="currentPage"
                                :sort-by.sync="sortBy"
                                :sort-desc.sync="sortDesc"
                                @filtered="onFiltered"
                                :filter="filter"
                                :filter-included-fields="filterOn"
                            >   
                                <!-- Virtual column # -->
                                <template #cell(#)="data">
                                    {{ data.index + 1 }}
                                </template>
                                <template v-slot(sale)="data">
                                    {{ data }}
                                </template>
                                <!-- Actions -->
                                <template v-slot:cell(action)="data">
                                    <b-button id="view-button" variant="info" size="sm" block>
                                        <b-link 
                                        style="color:black"
                                        :to="{ 
                                            path: '/sale-details', 
                                            query: { id: data.id } 
                                        }"
                                        >Voir
                                        </b-link>
                                    </b-button>
                                </template>
                            </b-table>
                            <b-pagination
                                v-model="currentPage"
                                :total-rows="sales.length"
                                :per-page="perPage"
                                align="left"
                                prev-text="<<"
                                next-text=">>"
                                first-number
                                last-number
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
import moment from "moment";

  export default {
    name: "SaleComponent",
    props: ["sales"],
    data() {
      return {
        currentPage: 1,
        fields: [
            "#",
            {
                key: "band.label",
                label: "Bande",
                thClass: "font-weight-bold",
                sortable: true
            },
            {
                key: "status",
                label: "Statut",
                thClass: "font-weight-bold",
                sortable: true
            },
            {
                key: "quantity",
                label: "Quantite",
                thClass: "font-weight-bold",
                sortable: true
            },
            {
                key: "total_price",
                label: "Prix de vente (F CFA)",
                thClass: "font-weight-bold",
                sortable: true
            },
            {
                key: "buyer",
                label: "Acheteur",
                thClass: "font-weight-bold",
                sortable: true
            },
            {
                key: "created_at",
                label: "Date de creation",
                thClass: "font-weight-bold",
                formatter: "dateFormatter",
                sortable: true,
            },
            "action"
        ],
        perPage: 5,
        pageOptions: [5, 10, 15],
        sortBy: "",
        sortDesc: false,
        sortDirection: "asc",
        filter: null,
        filterOn: [],
      }
    },
    methods: {
        formatNumber(value) {
            return Number(value).toLocaleString();
        },
        onFiltered(filteredItems) {
        // Trigger pagination to update the number of buttons/pages due to filtering
        this.totalRows = filteredItems.length
        this.currentPage = 1
      },
      dateFormatter(value) {
        if (value) 
            return moment(String(value)).format("DD/MM/YYYY")
        return "";
      }
    },
  }
</script>

<style>
</style>
