<template>
    <div class="users-table">
     <md-card>
      <md-card-header data-background-color="black">
            <h4 class="title">Users Table</h4>
            <p class="category">All Users listed in this table (you are the only one who has asscess and makes changes to this table).</p>
      </md-card-header>
      <md-card-content>
            <md-table v-model="users" md-sort="name" md-sort-order="desc" md-card md-fixed-header>
                <md-table-toolbar>
                      <div class="md-toolbar-section-start">
                          <h1 class="md-title">Users</h1>
                      </div>
                </md-table-toolbar>
                <md-table-row slot="md-table-row" slot-scope="{ item }">
                      <md-table-cell md-label="Name" md-sort-by="name">{{ item.title }}</md-table-cell>
                      <md-table-cell md-label="Address" md-sort-by="address">{{ item.address }}</md-table-cell>
                      <md-table-cell md-label="State" md-sort-by="state">{{ item.state }}</md-table-cell>
                      <md-table-cell md-label="City" md-sort-by="city">{{ item.city }}</md-table-cell>
                      <md-table-cell md-label="Hours" md-sort-by="hours">{{ item.hours }}</md-table-cell>
                      <md-table-cell md-label="Lat" md-sort-by="lat">{{ item.lat }}</md-table-cell>
                      <md-table-cell md-label="Lng" md-sort-by="lng">{{ item.lng }}</md-table-cell>
                      <md-table-cell>
                          <md-button class="md-just-icon md-simple md-danger" @click="deleteLocation(item.id)">
                          <md-icon>delete</md-icon>
                          <md-tooltip md-direction="top">setting</md-tooltip>
                          </md-button>
                      </md-table-cell>
                </md-table-row>
            </md-table>
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
          users: null
     };
    },
    created(){
      async() =>{
        return await axios.get('/')
      }
    }
  
}
</script>

<style lang="scss">
     .users-table
     {
     //height: 300px;
     width: 90%;
     margin: auto;
     }
</style>