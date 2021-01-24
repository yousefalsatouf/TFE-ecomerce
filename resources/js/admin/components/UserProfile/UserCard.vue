<template>
<div>
      <md-card class="md-card-profile">
      <div class="md-card-avatar" v-if="auth.image">
        <img class="img" v-bind:src="`/images/${auth.image}`" />
      </div>
      <div v-else>
            <i class="material-icons" style="font-size: 100px">person</i>
            <p class="hidden-lg hidden-md">Profile</p>
        </div>
      <md-card-content>
        <strong class="card-title">{{auth.first_name && auth.last_name? auth.first_name+" "+auth.last_name : null}} </strong>
        <h5 class="text-success">Connected as: {{ auth.name }}</h5>
        <h6 class="role text-danger">Role: {{auth.admin? "Admin" : "Editor"}}</h6>
        <p class="card-description">{{auth.about? auth.about : null}}</p>
      </md-card-content>
    </md-card>
</div>
  
</template>
<script>

export default {
  name: "user-card",
  props: ["auth"],
  data(){
    return {
      user: []
    }
  }
};
</script>
<style></style>
