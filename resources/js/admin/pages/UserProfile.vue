<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-size-66">
        <edit-profile-form @fetch-auth="fetchAuth"/>
      </div>
      <div class="md-layout-item md-medium-size-100 md-size-33">
        <user-card :auth="auth" />
      </div>
    </div>
  </div>
</template>

<script>
import EditProfileForm from "../components/UserProfile/EditProfileForm.vue";
import UserCard from '../components/UserProfile/UserCard.vue'
import axios from 'axios'

export default {
  components: {
    EditProfileForm,
    UserCard
  },
  data(){
    return {
      auth: []
    }
  },
  created(){ 
      axios.get('/admin/getAuth').then(res => this.auth = res.data).catch(err=>console.log(err))
  },
  methods: {
    fetchAuth(auth){
      this.auth= auth
    }
  }
 
};
</script>
