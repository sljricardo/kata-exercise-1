<template>
  <div class="container">
      <div class="row justify-content-center">

            <div class="col-8 m-5 px-0">
                <button type="button" class="btn btn-info" @click="selledTracks">Most Selled Tracks</button>
            </div>

            <b-table
                titles="#|Track|Total Selled|Artist" class="col-8">
                    <tr v-for="(item, index) in list" :key="index">
                        <th scope="row">{{ item.TrackId }}</th>
                        <td>{{ item.track }}</td>
                        <td>{{ item.total }}</td>
                        <td>{{ item.artist }}</td>
                    </tr>
            </b-table>
      </div>
  </div>
</template>

<script>
import table from './table';

export default {

    components: {
        "b-table": table
    },

    data() {
        return {
            message: "hello",
            list: []
        }
    },

    methods: {
        selledTracks() {
            // reset the array list
            this.list = [];
            // Get most selled track from DB
            axios.post('/selledtracks')
                .then(response => {                    
                    response.data.forEach(element => {
                        this.list.push(element);
                    });
                });      
        }
    },

}
</script>
