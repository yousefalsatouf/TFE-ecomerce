<template>
  <form @submit.prevent="updateProfile" id="profileForm">
    <md-card>
      <p></p>
      <md-card-header data-background-color="black">
        <h4 class="title">Edit Profile</h4>
        <p class="category">Complete your profile</p>
      </md-card-header>
      <md-card-content>
        <div class="md-layout">
          <div class="md-layout-item md-small-size-100 md-size-33">
              <md-field>
              <span v-if="uploaded" class="material-icons text-success" style="font-size: 25px">done</span>
              <input type="file" name="image" class="form-control-file" id="image" @change="setImage">
              </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field>
              <label>User Name</label>
              <md-input v-model="username" type="text" required></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field>
              <label>Email Address</label>
              <md-input v-model="emailadress" type="email" required></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field>
              <label>First Name</label>
              <md-input v-model="firstname" type="text" required></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field>
              <label>Last Name</label>
              <md-input v-model="lastname" type="text" required></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field>
              <label>Adress</label>
              <md-input v-model="address" type="text" required></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field>
              <label>State</label>
              <md-input v-model="state" type="text" required></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field>
              <label>City</label>
              <md-input v-model="city" type="text" required></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field>
              <label>Postal Code</label>
              <md-input v-model="code" type="number" required></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-size-100">
            <md-field maxlength="5">
              <label>About Me</label>
              <md-textarea v-model="aboutme"></md-textarea>
            </md-field>
          </div>
          <div class="md-layout-item md-size-100 text-right">
            <md-button v-if="!success" type="submit" class="md-raised md-success">Update Profile</md-button>
            <span  v-else class="material-icons text-success" style="font-size: 40px">done</span>
          </div>
        </div>
      </md-card-content>
    </md-card>
  </form>
</template>
<script>
import axios from "axios"
import ImageUploader from 'vue-image-upload-resize'

export default {
  name: "edit-profile-form",
  components: {
    ImageUploader
  },
  data() {
    return {
      success: false,
      uploaded: false,
      id: null,
      username: null,
      image: null,
      emailadress: null,
      lastname: null,
      firstname: null,
      address: null,
      city: null,
      state: null,
      code: null,
      aboutme:null,
    };
  },
   created(){ 
      axios.get('/getAuth').then(res => {
          const auth = res.data

          this.$emit("get-auth", auth)
          this.id= auth.id
          this.username= auth.name
          this.emailadress= auth.email
          this.firstname= auth.first_name
          this.lastname= auth.last_name
          this.address= auth.address
          this.city= auth.city
          this.state= auth.state
          this.code= auth.postal_code
          this.aboutme= auth.about
  })
  },
  methods: {
    setImage: function (event) {
      this.uploaded= true
      this.image = event.target.files[0]
    },
   async updateProfile(){

    let data = new FormData(profileForm);
    //data.append("image", this.image, "ProfileImage");
    const self= this
    await axios.get('updateProfile', {params: {
            id: this.id,
            //image: data,
            username: this.username, 
            state: this.locationState, 
            city: this.locationCity, 
            email: this.emailadress,
            fname: this.firstname, 
            lname: this.lastname, 
            code: this.code,
            about: this.aboutme,
      }})
      .then(res => {
          this.$emit("get-auth", res.data)
          this.success = true
          this.uploaded= false
          setTimeout(() => {self.success= false}, 3000);
      })
    }
  },
 
}
</script>
<style></style>
