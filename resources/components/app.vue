<template>
  <div class="container">
      <div class="row justify-content-center">

            <div class="col-8 m-5 px-0">
                <button type="button" class="btn btn-info" @click="selledTracks">Most Selled Tracks</button>
                <button type="button" class="btn btn-dark" @click="bestCostumer">Best Costumer</button>
            </div>

            <div class="col-8 px-0">
                <div class="alert alert-primary" role="alert">
                    Average price of sales: <strong>{{ average }}€</strong>
                </div>
            </div>

            <!-- Table Component -->
            <b-table :titles="titles" class="col-8">
                <!-- each row -->
                <tr v-for="(item, index) in list" :key="index">
                    <!-- First Line -->
                    <template v-if="!index">
                        <th v-for="(object, fields) in item" :key="fields" >
                            {{ object }} {{ fields == 'euros' ? '€' : '' }}</th>
                    </template>
                    <!-- Subsequent Lines -->
                    <template v-else>
                        <td v-for="(object, fields) in item" :key="fields">
                            {{ object }} {{ fields == 'euros' ? '€' : '' }}</td>
                    </template>
                </tr>
            </b-table>
      </div>
  </div>
</template>

<script>
import table from './table';
import numeral from 'numeral';

export default {

    components: {
        "b-table": table
    },

    data() {
        return {
            message: "hello",
            list: [],
            titles: "#|Track|Total Selled|Artist",
            average: 0,
        }
    },

    methods: {

        bestCostumer() {
            // reset the array list
            this.list = [];
            this.titles = "#|Total Orders|First Name|Last Name|Emails";

            // Get most selled track from DB
            axios.get('/bestcostumer')
                .then(response => {                    
                    response.data.forEach(element => {
                        this.list.push(element);
                    });
                });                  

        },

        selledTracks() {
            // reset the array list
            this.list = [];
            this.titles = "#|Track|Total Selled|Artist";

            // Get most selled track from DB
            axios.get('/selledtracks')
                .then(response => {               
                    response.data.forEach(element => {
                        this.list.push(element);
                    });
                });      
        }
    },

    mounted() {

        this.bestCostumer();

        axios.get('/averageprice')
                .then(response => {               
                   this.average = numeral(response.data[0].euros).format('0,0[.]00');
                });   

    }

}
</script>
