<template>
    <div class="products-container">
      <md-progress-bar md-mode="indeterminate" v-if="sending" />
      <add-products-form @add-product="addProduct" :categories="categories" :bus="bus"/>
      <hr>
      <products-table :products="products" @edit-product="editProduct" @remove-product="removeProduct"/>
    </div>
</template>

<script>
import { AddProductsForm, ProductsTable } from '../components/ProductsComponent'
import axios from 'axios'
import Vue from "vue";


export default {
    data(){
        return {
            sending: false,
            products: [],
            product: [],
            categories: [],
            bus: new Vue(),
        }
    },
    components: {
      AddProductsForm,
      ProductsTable
    },
    created(){
        this.sending= true
        axios.get('/admin/products').then(res => {
          this.products= res.data.products
          this.categories= res.data.categories
        }).catch(err => console.log(err))
        setTimeout(() => {
          this.sending= false
        }, 1000);
    },
    methods: {
      addProduct(data){
          this.products= data
      },
      editProduct(data)
      {
          this.product= data
          this.bus.$emit('edit-product', data)
      },
      removeProduct(data){
        this.products= data
      },    
  }
}
</script>
<style lang="scss" scoped>
  .products-container
  {
    width: 90%;
    margin: auto;
  }
</style>
