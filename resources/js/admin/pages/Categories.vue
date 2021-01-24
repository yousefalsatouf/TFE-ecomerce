<template>
    <div class="categories-container">
       <md-progress-bar md-mode="indeterminate" v-if="sending" />
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
          sending: false,
            categories: [],
        }
    },
    components: {
      AddCategoriesForm,
      CategoriesTable
    },
    created(){
      this.sending= true
      axios.get('/admin/categories').then(res => this.categories= res.data).catch(err => console.log(err))
      setTimeout(() => {
        this.sending= false
      }, 1000);
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
