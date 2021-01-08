<template>
  <div class="locations-table">
     <md-card>
     <md-card-header data-background-color="green">
          <h4 class="title">Map Table Locations</h4>
          <p class="category">All locations listed in this table.</p>
     </md-card-header>
     <md-card-content>
          <md-table v-if="data.length>0" v-model="data" md-sort="name" md-sort-order="desc" md-card md-fixed-header>
               <md-table-toolbar>
                    <div class="md-toolbar-section-start">
                         <h1 class="md-title">Locations</h1>
                    </div>
                    <md-field md-clearable class="md-toolbar-section-end">
                         <md-input placeholder="Search by name..." v-model="search" @input="searchOnTable" />
                    </md-field>
               </md-table-toolbar>
               <md-table-row slot="md-table-row" slot-scope="{ item }">
                    <md-table-cell md-label="Name" md-sort-by="name">{{ item.title }}</md-table-cell>
                    <md-table-cell md-label="Address" md-sort-by="address">{{ item.address }}</md-table-cell>
                    <md-table-cell md-label="State" md-sort-by="state">{{ item.state }}</md-table-cell>
                    <md-table-cell md-label="City" md-sort-by="city">{{ item.city }}</md-table-cell>
                    <md-table-cell md-label="Hours" md-sort-by="hours">{{ item.hours }}</md-table-cell>
                    <md-table-cell md-label="Lat" md-sort-by="lat">{{ item.lat }}</md-table-cell>
                    <md-table-cell md-label="Lng" md-sort-by="lng">{{ item.lng }}</md-table-cell>
                    <md-table-cell>
                         <md-button class="md-just-icon md-simple md-danger" @click="deleteLocation(item.id)">
                         <md-icon>delete</md-icon>
                         <md-tooltip md-direction="top">Delete</md-tooltip>
                         </md-button>
                    </md-table-cell>
               </md-table-row>
          </md-table>
          <strong>No Locations registed yet .</strong>
     </md-card-content>
     </md-card>
  </div>
</template>

<script>

const toLower = text => {
    return text.toString().toLowerCase()
  }
const searchByName = (items, term) => {
    if (term) {
      return items.filter(item => toLower(item.name).includes(toLower(term)))
    }
    return items
  }

export default {
     name: "locations-table",
     props: ["locations"],
     data() {
          const locationsData= this.locations 
          return {
               search: null,
               searched: [],
               data: locationsData
          };
     },
     methods: {
      searchOnTable () 
      {
        this.searched = searchByName(this.data, this.search)
      },
      deleteLocation(id)
      {
           axios.get('/removeLocation', { params: { id: id }}).then(res => this.data= res.data)
      }
    },
    watch: {
    updateLocations: function() {
      this.$emit("locations", this.data);
    }
  }
}
</script>

<style lang="scss">
     .locations-table
     {
     //height: 300px;
     width: 90%;
     margin: auto;
     }
</style>