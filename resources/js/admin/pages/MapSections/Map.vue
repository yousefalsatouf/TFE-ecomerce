<template>
    <div class="map-leaflet">

        <l-map
        :zoom="zoom"
        :center="center"
        :options="mapOptions"
        @update:center="centerUpdate"
        @update:zoom="zoomUpdate"
        >
        <l-tile-layer
            :url="url"
        />
        <l-marker v-for="location in data" :key="location.id" :lat-lng="[location.lat, location.lng]">
                <l-popup>
                    <div>
                        {{location.title}}
                        <p>
                            {{location.description}}
                            <ul>
                                <li><strong>Address:</strong> {{location.address}} </li>
                                <li><strong>City: </strong> {{location.city}} </li>
                                <li><strong>State:</strong> {{location.state}} </li>
                                <li><strong>Hours: </strong> {{location.hours}} </li>
                                <li><strong>Lat: </strong> {{location.lat}}</li>
                                <li><strong>Lng: </strong> {{location.lng}} </li>
                            </ul>
                            </p>
                    </div>
                </l-popup>
            </l-marker>
      </l-map>
    </div>
</template>

<script>
import { latLng } from "leaflet";
import { LMap, LTileLayer, LMarker, LPopup, LTooltip } from "vue2-leaflet";

export default {
    name: 'map-leaflet',
    props: ['locations'],
    components: {
        LMap,
        LTileLayer,
        LMarker,
        LPopup,
        LTooltip
    },
    data() {
       const locations = this.locations

        return {
            zoom: 8.5,
            url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            center: latLng(50.941201 , 5.356898),
            currentZoom: 10,
            currentCenter: latLng(50.6448444 , 5.5804934),
            showParagraph: false,
            mapOptions: {
                zoomSnap: 0.5
            },
            showMap: true,
            data: locations
    };
  },
  methods: {
    zoomUpdate(zoom) {
      this.currentZoom = zoom;
    },
    centerUpdate(center) {
      this.currentCenter = center;
    },
  },
  mounted() {
      //console.log(this.locations)
  },
  watch: {
    updateLocations: () => {
      this.$emit("update-locations", this.data);
    }
  }
}
</script>
<style lang="scss">
     .map-leaflet
     {
          height: 400px;
           width: 90%;
           margin: auto;
           box-shadow: 8px 7px 8px -6px #888c8b ;
     }
    .leaflet-shadow-pane
    {
        display: none;
    }
</style>
