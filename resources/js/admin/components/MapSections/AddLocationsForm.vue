<template>
  <form class="add-locations-form" @submit.prevent="submitLocations" enctype="multipart/form-data">
    <md-card>
      <md-card-header data-background-color="black">
        <h4 class="title">Add Location</h4>
      </md-card-header>
      <md-card-content>
        <div class="md-layout">
          <div class="md-layout-item md-small-size-100 md-size-50">
            <md-field>
              <label>Title</label>
              <md-input v-model="locationTitle" type="text" @keyup="locationTitle = $event.target.value" required ></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-50">
            <md-field>
              <label>Address</label>
              <md-input v-model="locationAddress" type="text" @keyup="locationAddress = $event.target.value" required></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-50">
            <md-field>
              <label>State</label>
              <md-input v-model="locationState" type="text"  @keyup="locationState = $event.target.value" required></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-50">
            <md-field>
              <label>City</label>
              <md-input v-model="locationCity" type="text"  @keyup="locationCity = $event.target.value" required></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field>
              <label>Hours</label>
              <md-input v-model="locationHours" type="text"  @keyup="locationHours = $event.target.value" required></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field>
              <label>Lat</label>
              <md-input v-model="locationLat" type="text"  @keyup="locationLat = $event.target.value" required></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field>
              <label>Lng</label>
              <md-input v-model="locationLng" type="text"  @keyup="locationLng = $event.target.value" required></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-size-100">
            <md-field maxlength="5">
              <label>Descriptions</label>
              <md-textarea v-model="locationDes"  @keyup="locationDes = $event.target.value" required></md-textarea>
            </md-field>
          </div>
        </div>
      </md-card-content>
      <md-progress-bar md-mode="indeterminate" v-if="sending" />

      <md-card-actions>
        <md-button type="submit" class="md-success" :disabled="sending">Add Location</md-button>
      </md-card-actions>
    </md-card>
  </form>
</template>

<script>
import axios from 'axios'

export default {
     name: "add-locations-form",
     props: ['bus'],
     data(){
      return {
          id: null,
            locationTitle: null,
            locationAddress: null,
            locationState: null,
            locationCity: null,
            locationHours: null,
            locationLat: null,
            locationLng: null,
            locationDes: null,
            sending: false,
      }
     },
    mounted() {
      this.bus.$on('edit-location', this.editLocation)
    }, 
     methods: {
       editLocation(location)
        {
          this.id= location[0].id
          this.locationTitle= location[0].title
          this.locationAddress= location[0].address
          this.locationState= location[0].state
          this.locationCity= location[0].city
          this.locationHours= location[0].hours
          this.locationLat= location[0].lat,
          this.locationLng= location[0].lng
          this.locationDes= location[0].description
          window.scrollTo({top: 0, behavior: 'smooth'});
        },
        async submitLocations(e)
        {
          e.preventDefault();
          this.sending= true
          let self = this;
          const config = {
            headers: {
                'content-type': 'multipart/form-data'
            }
          }
          // form data
          let data = new FormData();
          data.append('id', this.id)
          data.append('title', this.locationTitle)
          data.append('address', this.locationAddress)
          data.append('state', this.locationState)
          data.append('city', this.locationCity)
          data.append('hours', this.locationHours)
          data.append('lat', this.locationLat)
          data.append('lng', this.locationLng)
          data.append('des', this.locationDes)
          // send upload request
          await axios.post('/admin/addLocation', data, config)
          .then(res => {
              self.$emit('add-location', res.data)
              setTimeout(() => {
                self.sending= false
              }, 1000);
          })
        } 
          },
}
</script>

<style lang="scss">
     .add-locations-form
     {
           height: 400px;
           width: 95%;
           margin: auto;
           overflow: scroll;
     }
</style>