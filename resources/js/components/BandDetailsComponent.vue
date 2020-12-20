<template>
    <div class="container">
        <div class="col-md-12">
            <b-card>
                <h2 class="mt-2 mb-4">Details de la bande : <b>{{ band.label }}</b></h2>
                <b-tabs v-model="tabIndex" content-class="mt-3" justified>
                    <b-tab class="tab" title="Charges alimentaires" active>
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
                                                label-sizealimentaires="sm"
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
                                                <b-form-checkbox value="type">Type</b-form-checkbox>
                                            </b-form-checkbox-group>
                                        </b-form-group>
                                    </b-col>

                                </b-row>
                                <b-table responsive outlined  head-variant="light"   
                                    class="mt-3" 
                                    id="food-table" 
                                    :items="foods" 
                                    :fields="foodFields"
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
                                    <template v-slot(band)="data">
                                        {{ data }}
                                    </template>
                                </b-table>
                                <b-pagination
                                    v-model="currentPage"
                                    :total-rows="foods.length"
                                    :per-page="perPage"
                                    align="left"
                                    prev-text="<"
                                    next-text=">"
                                    first-number
                                    last-number
                                    aria-controls="food-table"
                                ></b-pagination>
                            </div>
                        </div>
                    </b-tab>
                    <b-tab title="Charges supplementaires">
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
                                                <b-form-checkbox value="label">Label</b-form-checkbox>
                                            </b-form-checkbox-group>
                                        </b-form-group>
                                    </b-col>

                                </b-row>
                                <b-table responsive outlined  head-variant="light"   
                                    class="mt-3" 
                                    id="extra-table" 
                                    :items="extras" 
                                    :fields="extraFields"
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
                                    <template v-slot(band)="data">
                                        {{ data }}
                                    </template>
                                </b-table>
                                <b-pagination
                                    v-model="currentPage"
                                    :total-rows="extras.length"
                                    :per-page="perPage"
                                    align="left"
                                    prev-text="<"
                                    next-text=">"
                                    first-number
                                    last-number
                                    aria-controls="extra-table"
                                ></b-pagination>
                            </div>
                        </div>
                    </b-tab>
                </b-tabs>
            </b-card>
        </div>
    </div>
</template>

<script>
import moment from "moment";

  export default {
    name: "BandDetailsComponent",
    props: ["band", "extras", "foods"],
    data() {
      return {
        currentPage: 1,
        extraFields: [
            "#",
            {
                key: "label",
                label: "Label",
                thClass: "font-weight-bold",
                sortable: true
            },
            {
                key: "price",
                label: "Prix unitaire (F CFA)",
                formatter: "formatNumber",
                thClass: "font-weight-bold",
                sortable: true,
            },
            {
                key: "quantity",
                label: "Quantite",
                thClass: "font-weight-bold",
                sortable: true
            },
            {
                key: "total_price",
                label: "Prix total (F CFA)",
                formatter: "formatNumber",
                thClass: "font-weight-bold",
                sortable: true,
            },
            {
                key: "created_at",
                label: "Date de creation",
                thClass: "font-weight-bold",
                formatter: "dateFormatter",
                sortable: true,
            },
        ],
        foodFields: [
            "#",
            {
                key: "type",
                label: "Type",
                thClass: "font-weight-bold",
                sortable: true
            },
            {
                key: "quantity",
                label: "Quantite",
                thClass: "font-weight-bold",
                sortable: true,
            },
            {
                key: "quantity_consumed",
                label: "Qte consommee",
                thClass: "font-weight-bold",
                sortable: true
            },
            {
                key: "weight",
                label: "Poids",
                thClass: "font-weight-bold",
                sortable: true
            },
            {
                key: "price",
                label: "Prix unitaire (F CFA)",
                thClass: "font-weight-bold",
                sortable: true,
                formatter: "formatNumber",
            },
            {
                key: "total_price",
                label: "Prix total (F CFA)",
                thClass: "font-weight-bold",
                sortable: true,
                formatter: "formatNumber",
            },
            {
                key: "created_at",
                label: "Date de creation",
                thClass: "font-weight-bold",
                formatter: "dateFormatter",
                sortable: true,
            }
        ],
        perPage: 5,
        pageOptions: [5, 10, 15],
        sortBy: '',
        sortDesc: false,
        sortDirection: 'asc',
        filter: null,
        filterOn: [],
        tabIndex: 0
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
            return moment(String(value)).format("DD/MM/YYYY");
        return "";
      }
    },
  }
</script>
