<template>
    <div class="users-table">
      <md-progress-bar md-mode="indeterminate" v-if="sending" />
     <md-card>
      <md-card-header data-background-color="black">
            <h4 class="title">Users Table</h4>
            <p class="category">All Users listed in this table (you are the only one who has asscess and makes changes to this table.</p>
      </md-card-header>
      <md-card-content>
            <md-table v-model="users" md-sort="name" md-sort-order="desc">
                <md-table-toolbar>
                      <div class="md-toolbar-section-start">
                          <h1 class="md-title">Users</h1>
                      </div>
                </md-table-toolbar>
                <md-table-row slot="md-table-row" slot-scope="{ item }">
                      <md-table-cell md-label="Image">
                        <img v-if="item.image" class="img" v-bind:src="`/images/${item.image}`" />
                        <i v-else class="material-icons" style="font-size: 50px">person</i>
                      </md-table-cell>
                      <md-table-cell md-label="Name" md-sort-by="name" class="name">{{ item.first_name }} {{item.last_name }}</md-table-cell>
                      <md-table-cell md-label="Email">{{ item.email }}</md-table-cell>
                      <md-table-cell md-label="Phone">
                        <span v-if="item.phone_number">{{ item.phone_number }}</span>
                        <span v-else class="material-icons text-danger">minimize</span>
                        </md-table-cell>
                       <md-table-cell md-label="Email Verified? ">
                        <md-icon class="text-success" v-if="item.email_verified_at">check</md-icon>
                        <md-icon v-else class="text-danger">thumb_down_alt</md-icon> 
                      </md-table-cell>
                      <md-table-cell md-label="Subscribed Newsletter">
                           <md-icon class="text-success" v-if="item.subscribed_newsletter===1">check</md-icon>
                           <span v-else class="material-icons text-danger">minimize</span>
                      </md-table-cell>
                      <md-table-cell md-label="About him">
                        <p v-if="item.about">{{ item.about }}</p>
                        <span v-else class="material-icons text-danger">minimize</span>
                      </md-table-cell>
                      <md-table-cell md-label="Role">
                            <select  name="role" id="role" md-dense @change="handleRole($event, item.id)">
                              <option :selected="!item.admin?false:true" value="admin">Admin</option>
                              <option :selected="!item.actor?false:true" value="editor">Editor</option>
                              <option :selected="!item.actor&&!item.admin?true:false" value="user">User</option>
                            </select>
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
          users: [],
          sending: false
     };
    },
    methods: {
      async handleRole(event, id)
      {
        this.sending= true
        await axios.get('/admin/changeRole', {
          params: {
            value: event.target.value,
            id: id
          }
        })
        .then(res => {
          //this.users= res.data
          setTimeout(() => {
            this.sending= false
          }, 1000);
        })
        .catch(err => console.log(err))
        
      }
    },
    created(){
      axios.get('/admin/users').then(res => this.users= res.data).catch(err => console.log(err))
    }
  
}
</script>

<style lang="scss">
    #role
    {
      ul
      {
        color: black !important;
      }
    }
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