<template>
    <div class="products-container">
      <add-products-form @add-product="addProduct" :categories="categories"/>
      <hr>
      <products-table :products="products" @remove-product="removeProduct"/>
    </div>
</template>

<script>
import { AddProductsForm, ProductsTable } from '../components/ProductsComponent'
import axios from 'axios'

export default {
    data(){
        return {
            products: [],
            categories: []
        }
    },
    components: {
      AddProductsForm,
      ProductsTable
    },
    created(){
        axios.get('/admin/products').then(res => {
          this.products= res.data.products
          this.categories= res.data.categories
        }).catch(err => console.log(err))
    },
    methods: {
      addProduct(data){
          this.products= data
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
