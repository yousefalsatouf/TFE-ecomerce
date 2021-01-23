<template>
    <div class="categories-container">
      <add-categories-form @add-category="addCategory" />
      <hr>
      <categories-table :categories="categories" @remove-category="removeCategory"/>
    </div>
</template>

<script>
import { AddCategoriesForm, CategoriesTable } from '../components/CategoriesComponent'
import axios from 'axios'

export default {
    data(){
        return {
            categories: [],
        }
    },
    components: {
      AddCategoriesForm,
      CategoriesTable
    },
    created(){
      axios.get('/admin/categories').then(res => this.categories= res.data).catch(err => console.log(err))
    },
    methods: {
      addCategory(data){
         this.categories= data
      },
      removeCategory(data){
        this.categories= data
      },    
  }
}
</script>
<style lang="scss" scoped>
  .categories-container
  {
    width: 90%;
    margin: auto;
  }
</style>
