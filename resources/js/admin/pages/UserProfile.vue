<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-size-66">
        <edit-profile-form data-background-color="green"> </edit-profile-form>
      </div>
      <div class="md-layout-item md-medium-size-100 md-size-33">
        <user-card> </user-card>
      </div>
    </div>
  </div>
</template>

<script>
import EditProfileForm from "../pages/UserProfile/EditProfileForm.vue";
import UserCard from '../pages/UserProfile/UserCard.vue'

export default {
  components: {
    EditProfileForm,
    UserCard
  }
};
</script>
