<template>
    <div style="height: 500px; width: 100%">
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
            <div v-for="piece in data" :key="piece.id"  >
                <l-marker :lat-lng="loc" v-if="piece.id == 1">
                    <l-popup>
                        <div>
                            {{piece.title}}
                            <p>
                                {{piece.description}}
                                <ul>
                                    <li><strong>Address:</strong> {{piece.address}} </li>
                                    <li><strong>City: </strong> {{piece.city}} </li>
                                    <li><strong>State:</strong> {{piece.state}} </li>
                                    <li><strong>Hours: </strong> {{piece.hours}} </li>
                                    <li><strong>Lat: </strong> {{piece.lat}}</li>
                                    <li><strong>Lng: </strong> {{piece.lng}} </li>
                                </ul>
                                </p>
                        </div>
                    </l-popup>
                </l-marker>
                   <l-marker :lat-lng="loc2" v-else>
                    <l-popup>
                        <div>
                            {{piece.title}}
                            <p>
                                {{piece.description}}
                                <ul>
                                    <li><strong>Address:</strong> {{piece.address}} </li>
                                    <li><strong>City: </strong> {{piece.city}} </li>
                                    <li><strong>State:</strong> {{piece.state}} </li>
                                    <li><strong>Hours: </strong> {{piece.hours}} </li>
                                    <li><strong>Lat: </strong> {{piece.lat}}</li>
                                    <li><strong>Lng: </strong> {{piece.lng}} </li>
                                </ul>
                                </p>
                        </div>
                    </l-popup>
                </l-marker>
            </div>
    </l-map>
    </div>
</template>

<script>
import { latLng } from "leaflet";
import { LMap, LTileLayer, LMarker, LPopup, LTooltip } from "vue2-leaflet";

export default {
    name: "leaflet-map",
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
        console.log(locations)
        return {
            zoom: 9,
            url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            center: latLng(50.6448444 , 5.5804934),
            loc: latLng(50.6448444 , 5.5804934),
            loc2: latLng(50.9765614, 4.4371033),
            data: locations,
            currentZoom: 14,
            currentCenter: latLng(50.6448444 , 5.5804934),
            showParagraph: false,
            mapOptions: {
                zoomSnap: 0.5
            },
            showMap: true
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
  }
}
</script>
