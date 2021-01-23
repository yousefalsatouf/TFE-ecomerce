<template>
  <form class="add-locations-form">
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
           <div v-if="required" class='md-layout-item md-size-50'>
                <strong  class="text-danger text-center">Fields must fill out ! *</strong>
          </div>
          <div class="md-layout-item md-size-50 text-right">
               <span  v-if="!success" @click="submitLocations" class="material-icons text-success" style="font-size: 30px">add_location_alt</span>
                <span  v-else class="material-icons text-success" style="font-size: 30px">done</span>
          </div>
        </div>
      </md-card-content>
    </md-card>
  </form>
</template>

<script>
import axios from 'axios'

export default {
     name: "add-locations-form",
     components: {
     },
     data(){
          return {
               locationTitle: null,
               locationAddress: null,
               locationState: null,
               locationCity: null,
               locationHours: null,
               locationLat: null,
               locationLng: null,
               locationDes: null,
               success: false,
               required: false,
          }
     },
     methods: {
        async submitLocations(event)
          {
              if(this.locationTitle && this.locationAddress && this.locationState && this.locationCity && this.locationHours && this.locationLat && this.locationLng && this.locationDes )
             {
               await axios.get('/admin/addLocation', {params: {
                    title: this.locationTitle,
                    address: this.locationAddress, 
                    state: this.locationState, 
                    city: this.locationCity, 
                    hours: this.locationHours,
                    lat: this.locationLat, 
                    lng: this.locationLng, 
                    des: this.locationDes
               }})
               .then(res => {
                   this.$emit('add-location', res.data)
                    this.success = true
               })
             } 
             else
             {                 
                  this.required = true
             }
          },
     }
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