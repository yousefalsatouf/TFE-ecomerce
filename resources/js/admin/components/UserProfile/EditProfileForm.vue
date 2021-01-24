<template>
  <form @submit.prevent="updateProfile" id="profileForm"  enctype="multipart/form-data">
     <md-progress-bar md-mode="indeterminate" v-if="sending" />
    <md-card>
      <md-card-header data-background-color="black">
        <h4 class="title">Edit Profile</h4>
        <p class="category">Complete your profile</p>
      </md-card-header>
      <md-card-content>
        <div class="md-layout">
          <div class="md-layout-item md-small-size-100 md-size-33">
              <md-field>
              <span v-if="uploaded" class="material-icons text-success" style="font-size: 25px">done</span>
              <input type="file" class="form-control-file" id="image" @change="setImage($event)">
              </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field>
              <label>User Name</label>
              <md-input v-model="username" type="text"></md-input>
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
              <label>Address</label>
              <md-input v-model="address" type="text" v></md-input>
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
              <md-textarea v-model="aboutme" required></md-textarea>
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
      sending: false,
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
      this.sending= true
      axios.get('/admin/getAuth').then(res => {
          const auth = res.data
          this.$emit("get-auth", auth)
          this.id= auth.id
          this.username= auth.name
          this.emailadress= auth.email
          this.firstname= auth.first_name
          this.lastname= auth.last_name
          this.address= auth.street
          this.city= auth.city
          this.state= auth.state
          this.code= auth.postal_code
          this.aboutme= auth.about
  }).catch(err=>console.log(err))

  setTimeout(() => {
    this.sending= false
  }, 1000);
  
  },
  methods: {
    setImage: function (event) {
      this.uploaded= true
      this.image = event.target.files[0]
    },
   async updateProfile(e){

    e.preventDefault();
    this.sending= true
    let self = this
    const config = {
        headers: {
            'content-type': 'multipart/form-data'
        }
    }
    // form data
    let data = new FormData();
    data.append('file', this.image);
    data.append('id', this.id)
    data.append('username', this.username)
    data.append('email', this.emailadress)
    data.append('fname', this.firstname)
    data.append('lname', this.lastname)
    data.append('address', this.address)
    data.append('city', this.city)
    data.append('state', this.state)
    data.append('code', this.code)
    data.append('about', this.aboutme)
    // send upload request
    await axios.post('/admin/updateProfile', data, config)
    .then(res => {
        self.$emit("fetch-auth", res.data)
        self.success = true
        self.uploaded= false
        setTimeout(() => {
          self.success= false
          self.sending= false
          }, 1000);
    })
    }
  },
 
}
</script>
<style></style>
