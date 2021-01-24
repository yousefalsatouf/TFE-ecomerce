<template>
    <div>
        <md-progress-bar md-mode="indeterminate" v-if="sending" />
      <div class="map-addForm">
            <div class="form">
                <add-locations-form @add-location="addLocation" />
            </div>
            <div class="locations">
                <map-leaflet :locations="locations" />
            </div>
      </div>
       <hr>
        <locations-table :locations="locations" @remove-location="removeLocation"/>
    </div>
</template>

<script>
import { MapLeaflet, LocationsTable, AddLocationsForm } from '../components/MapSections'
import axios from 'axios'

export default {
    data(){
        return {
            locations: [],
            sending: false
        }
    },
    components: {
        MapLeaflet,
        AddLocationsForm,
        LocationsTable
    },
    created(){
        this.sending= true
        axios.get('/admin/locations').then(res => {
             this.locations= res.data
        })
        setTimeout(() => {
            this.sending= false
        }, 1000);
    },
    methods: {
        addLocation(data){
            this.locations= data
        },
         removeLocation(data){
            this.locations= data
        },
        
  }
}
</script>
<style lang="scss" scoped>
    .map-addForm
    {
        display: flex;
        justify-content: space-around;
        align-content: center;
        align-items: center;
        .form
        {
            flex: 4;
        }
        .locations
        {
            flex: 6;
        }
    }
    @media screen and (max-width: 990px){
            .map-addForm
            {
                display: block
            }
        };
</style>
