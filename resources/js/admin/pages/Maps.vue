<template>
    <div>
      <add-locations-form @update-locations="updateLocations"/>
      <hr>
      <map-leaflet :locations="locations" />
       <hr>
        <locations-table :locations="locations" />
    </div>
</template>

<script>
import { MapLeaflet, LocationsTable, AddLocationsForm } from './MapSections'
import axios from 'axios'

export default {
    data(){
        return {
            locations: []
        }
    },
    components: {
        MapLeaflet,
        AddLocationsForm,
        LocationsTable
    },
    created(){
        axios.get('/locations').then(res => {
             this.locations= res.data
        })
    },
    methods: {
        updateLocations: (data)  =>{
        this.locations = data;
        }
  }
}
</script>
