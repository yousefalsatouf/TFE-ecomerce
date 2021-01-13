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
                      <md-table-cell md-label="Image" md-sort-by="image">
                        <img v-if="item.image" class="img" v-bind:src="`/images/${item.image}`" />
                        <i v-else class="material-icons" style="font-size: 50px">person</i>
                      </md-table-cell>
                      <md-table-cell md-label="Name" md-sort-by="name" class="name">{{ item.first_name }} {{item.last_name }}</md-table-cell>
                      <md-table-cell md-label="Email" md-sort-by="email">{{ item.email }}</md-table-cell>
                      <md-table-cell md-label="Phone" md-sort-by="phone">{{ item.phone_number }}</md-table-cell>
                       <md-table-cell md-label="Email Verified? " md-sort-by="email-verified-at">
                        <md-icon class="text-success" v-if="item.email_verified_at">check</md-icon>
                        <md-icon v-else class="text-danger">thumb_down_alt</md-icon> 
                      </md-table-cell>
                      <md-table-cell md-label="Subscribed Newsletter" md-sort-by="newsletter">
                           <md-icon class="text-success" v-if="item.subscribed_newsletter===1">check</md-icon>
                           <md-icon v-else class="text-danger">thumb_down_alt</md-icon> 
                      </md-table-cell>
                      <md-table-cell md-label="About him" md-sort-by="abouthim">
                        <p v-if="item.about">{{ item.about }}</p>
                        <strong class="text-danger" v-else>Nothing yet</strong>
                      </md-table-cell>
                      <md-table-cell md-label="Role" md-sort-by="role">{{ item.admin? "Admin" : "Editor" }}</md-table-cell>
                      <md-table-cell>
                          <md-button class="md-just-icon md-simple" @click="handle(item.id)">
                          <md-icon>build</md-icon>
                          <md-tooltip md-direction="top">change role</md-tooltip>
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
      axios.get('/admin/users').then(res => this.users= res.data).catch(err => console.log(err))
    }
  
}
</script>

<style lang="scss">
     .users-table
     {
     //height: 300px;
     width: 90%;
     margin: auto;
     img
     {
      width: 50px !important;
      height: 50px !important;
      border-radius: 50%;
      border: 0;
     }
     .md-table-head-label:not(div:first-of-type)
     {
       margin-left: 3rem;
     }
     }
</style>