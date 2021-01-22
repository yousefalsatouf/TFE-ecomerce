<template>
    <div class="users-table">
     <md-card>
      <md-card-header data-background-color="black">
            <h4 class="title">Orders Table</h4>
            <p class="category">All Orders listed in this table (you are the only one who has asscess and makes changes to this table.</p>
      </md-card-header>
      <md-card-content>
            <md-table v-if="orders.length>0" v-model="orders" md-sort="name" md-sort-order="desc">
                <md-table-toolbar>
                      <div class="md-toolbar-section-start">
                          <h1 class="md-title">Orders</h1>
                      </div>
                </md-table-toolbar>
                <md-table-row slot="md-table-row" slot-scope="{ item }">
                      <md-table-cell md-label="Name" md-sort-by="name" class="name">{{ item.first_name }} {{item.last_name }}</md-table-cell>
                      <md-table-cell md-label="Email">{{ item.email }}</md-table-cell>
                      <md-table-cell md-label="Phone">{{ item.phone_number? item.phone_number: "No phone number" }}</md-table-cell>
                      <md-table-cell md-label="Total">{{ item.total }}</md-table-cell>
                      <md-table-cell md-label="Quantity">{{ item.qty }}</md-table-cell>
                      <md-table-cell md-label="Status">{{ item.status }}</md-table-cell>
                </md-table-row>
            </md-table>
            <strong v-else class="text-danger">No  pending orders ...</strong>
      </md-card-content>
     </md-card>
  </div>
</template>


<script>
import axios from 'axios'

export default {
     name: "users-table",
      data() {
        return {
          orders: null,
     };
    },
    methods: {
      handleStatus(id)
      {
        console.log(id);
      }
    },
    created(){
      axios.get('/admin/orders').then(res => this.orders= res.data).catch(err => console.log(err))
    }
  
}
</script>

<style lang="scss">

</style>