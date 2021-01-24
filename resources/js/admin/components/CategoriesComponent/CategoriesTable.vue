<template>
    <div>
     <md-card>
      <md-card-header data-background-color="black">
            <h4 class="title">Categories Table</h4>
            <p class="category">All Categories listed in this table</p>
      </md-card-header>
      <md-card-content>
            <md-table v-model="categories" class="categories-table" md-sort="name" md-sort-order="desc" md-fixed-header>
                <md-table-toolbar>
                      <div class="md-toolbar-section-start">
                          <h1 class="md-title">Categories</h1>
                      </div>
                </md-table-toolbar>
                <md-table-row slot="md-table-row" slot-scope="{ item }">
                      <md-table-cell md-label="Image">
                        <img v-if="item.image" class="img" v-bind:src="`/images/${item.image}`" />
                      </md-table-cell>
                      <md-table-cell md-label="Cateogry Name">{{ item.name }}</md-table-cell>
                      <md-table-cell md-label="Description">{{ item.description}}</md-table-cell>
                       <md-table-cell>
                         <md-button class="md-just-icon md-simple md-dark" @click="editCategory(item.id)">
                         <md-icon>create</md-icon>
                         <md-tooltip md-direction="top">Edit</md-tooltip>
                         </md-button>
                      </md-table-cell>
                      <md-table-cell>
                         <md-button class="md-just-icon md-simple md-danger" @click="deleteCategory(item.id)">
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
import axios from 'axios'

export default {
     name: "categories-table",
     props: ['categories'],
     methods: {
       editCategory(id)
       {
          let category= this.categories.filter(category => category.id === id);
          this.$emit('edit-category', category)
       },
      async deleteCategory(id)
      {
        await  axios.get('/admin/removeCategory', { params: { id: id }}).then(res => this.$emit("remove-category", res.data))
      }
    },
}
</script>

<style lang="scss">
    .categories-table
    {
      height: 500px;
      overflow: scroll;
      .img
      {
        width: 100px;
        height: 80px;
        border-radius: 50%;
      }
    }
</style>