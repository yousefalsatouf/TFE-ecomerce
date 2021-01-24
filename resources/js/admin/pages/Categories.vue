<template>
    <div class="categories-container">
       <md-progress-bar md-mode="indeterminate" v-if="sending" />
      <add-categories-form @add-category="addCategory" :bus="bus"/>
      <hr>
      <categories-table :categories="categories" @edit-category="editCategory" @remove-category="removeCategory"/>
    </div>
</template>

<script>
import { AddCategoriesForm, CategoriesTable } from '../components/CategoriesComponent'
import axios from 'axios'
import Vue from "vue";


export default {
    data(){
        return {
            sending: false,
            categories: [],
            category: [],
            bus: new Vue(),
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
      editCategory(data)
      {
          this.category= data
          this.bus.$emit('edit-category', data)
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
