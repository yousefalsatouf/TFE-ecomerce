<template>
  <div class="locations-table">
     <md-card>
     <md-card-header data-background-color="black">
          <h4 class="title">Map Table Locations</h4>
          <p class="category">All locations listed in this table.</p>
     </md-card-header>
     <md-card-content>
          <md-table v-model="locations" md-sort="name" md-sort-order="desc" md-card md-fixed-header>
               <md-table-toolbar>
                    <div class="md-toolbar-section-start">
                         <h1 class="md-title">Locations</h1>
                    </div>
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
                         <md-button class="md-just-icon md-simple md-dark" @click="editLocation(item.id)">
                         <md-icon>create</md-icon>
                         <md-tooltip md-direction="top">Edit</md-tooltip>
                         </md-button>
                      </md-table-cell>
                    <md-table-cell>
                         <md-button class="md-just-icon md-simple md-danger" @click="deleteLocation(item.id)">
                         <md-icon>delete</md-icon>
                         <md-tooltip md-direction="top">Delete</md-tooltip>
                         </md-button>
                    </md-table-cell>
               </md-table-row>
          </md-table>
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
     props: ['locations'],
     methods: {
      searchOnTable () 
      {
        this.searched = searchByName(this.data, this.search)
      },
     editLocation(id)
     {
     let location= this.locations.filter(location => location.id === id);
     this.$emit('edit-location', location)
     },
      deleteLocation(id)
      {
           axios.get('/admin/removeLocation', { params: { id: id }}).then(res => this.$emit("remove-location", res.data))
      },
    },
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