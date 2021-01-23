<template>
    <div>
     <md-card>
      <md-card-header data-background-color="black">
            <h4 class="title">Products Table</h4>
            <p class="category">All Products listed in this table</p>
      </md-card-header>
      <md-card-content>
            <md-table v-model="products" class="products-table" md-sort="name" md-sort-order="desc" md-fixed-header>
                <md-table-toolbar>
                      <div class="md-toolbar-section-start">
                          <h1 class="md-title">Products</h1>
                      </div>
                </md-table-toolbar>
                <md-table-row slot="md-table-row" slot-scope="{ item }">
                      <md-table-cell md-label="Image">
                        <img v-if="item.image" class="img" v-bind:src="`/images/${item.image}`" />
                      </md-table-cell>
                      <md-table-cell md-label="Product Name" md-sort-by="name" class="name">{{ item.product_name }}</md-table-cell>
                      <md-table-cell md-label="Cateogry Name">{{ item.name }}</md-table-cell>
                      <md-table-cell md-label="Product Code">{{ item.product_code }}</md-table-cell>
                      <md-table-cell md-label="Price">{{ item.product_price}}</md-table-cell>
                      <md-table-cell md-label="In Stock">{{ item.stock}}</md-table-cell>
                      <md-table-cell md-label="New Arrival">
                        <md-icon v-if="item.new_arrival" class="text-success">check</md-icon>
                        <span v-else class="material-icons text-danger">minimize</span>
                      </md-table-cell>
                      <md-table-cell md-label="On Sold">
                        <span v-if="item.sold_price">{{item.sold_price}}</span>
                        <span v-else class="material-icons text-danger">minimize</span>
                      </md-table-cell>
                      <md-table-cell>
                         <md-button class="md-just-icon md-simple md-danger" @click="deleteProduct(item.id)">
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
     name: "products-table",
     props: ['products'],
      data() {
        return {
     };
    },
    methods: {
     async deleteProduct(id)
      {
        //console.log(id);
        await axios.get('/admin/removeProduct', { params: { id: id }}).then(res => this.$emit("remove-product", res.data))
      }
    },
}
</script>

<style lang="scss">
    .products-table
    {
      height: 500px;
      overflow: scroll;
      .img
      {
        width: 100px;
        height: 90px;
        border-radius: 50%;
      }
    }
</style>