<template>
     <div class="productsSearch">
          <!--search advanced search goes here -->
          <div class="advanced-search">
               <div class="container">
                    <div class="search">
                         <div class="search-specific">
                              <h5>Search By .... </h5>
                              <hr>
                              <div class="search-area">
                                        <form id="resetID">
                                             <div class="form-group">
                                             <label for="category"><h6>Categorie</h6><br>
                                                  <select name="category" @change="changeCat($event)" class="browser-default custom-select" id="category">
                                                       <option value="all" selected>all</option>
                                                       <option v-for="cat in catsNames" :key="cat.id" v-bind:value="cat.name">{{cat.name}}</option>
                                                  </select>
                                             </label>
                                        </div>
                                        <div class="form-group">
                                             <label for="maxPrice"><h6>Prix</h6>
                                                  <input type="number" @change="changePrice($event)"  class="form-control" id="greater-than" name="price" placeholder="Max Price">
                                             </label>
                                        </div>
                                        <div class="form-group">
                                             <label for="max" class="d-flex">
                                                  <h6>Promo</h6>
                                                  <input type="checkbox" @change="checkPromo($event)"  class="form-control" id="max" name="promo">
                                             </label>
                                             <label for="new" class="d-flex">
                                                  <h6>Nouvelles</h6>
                                                  <input type="checkbox" @change="checkNew($event)"  class="form-control" id="new" name="new">
                                             </label>
                                        </div>
                                   </form>
                                   <button @click="getResults" v-if="!loading">RSET</button>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <!--search advanced search ends here -->
               <div class="container">
                    <!--Search input starts-->
                         <div class="search-input flex-grow-1">
                              <div class="d-flex justify-content-between align-items-center">
                                   <md-field>
                                        <label>Search by name or mark </label>
                                        <md-input v-model="searchValue" @keyup="searchValue = $event.target.value" id="search" required></md-input>
                                   </md-field>
                                   <button @click.prevent="inputSearchValue" v-if="!loading"><i class="fa fa-search" ></i></button>
                              </div>
                         </div>
                    <!--Search input ends-->
                     <Pagination :data="products?products:[]" @pagination-change-page="getResults" />
                     <Spinner size="large" line-fg-color="green" v-if="loading"/>
                     <hr>
                    <div class="row d-flex justify-content-around articles">
                            <div v-for="product in products.data?products.data:products" :key="product.id" class="card">
                              <a v-bind:href="url+'/product_details/'+product.id">
                                   <img v-bind:src="url+'/images/'+product.image" class="card-img w-100 h-100" />
                              </a>
                              <div class="card-body">
                                   <div class="d-flex justify-content-between">
                                        <h5 class="card-text iphone">{{product.product_name}}</h5>
                                        <span v-if="product.new_arrival"><img v-bind:src="url+'/dist/images/shop/new.png'" style="width: 50px"></span>
                                   </div>
                              </div>
                              <div>
                                   <strong class="card-text text-success" v-if="product.shopping_cost==0">FREE Delivery</strong>
                                   <hr>
                                   <div>
                                        <p v-if="product.sold_price" class="d-flex justify-content-between">
                                             <strong  style="text-decoration:line-through;"  class="text-danger">{{product.product_price}} EUR</strong>
                                             <img v-bind:src="url+'/dist/images/shop/sale.png'" alt="..."  style="width:60px">
                                             {{product.sold_price}} EUR
                                        </p>
                                        <p v-else>{{product.product_price}} EUR</p> 
                                   </div>
                              </div>
                              <br>
                              <div>
                                   <a v-bind:href="url+'/product_details/'+product.id" class="text-dark">
                                        <button>
                                             <b> <i class="fa fa-eye"></i></b>
                                        </button>
                                   </a>
                                   <a v-bind:href="url+'/cart/addItem/'+product.id" class="text-dark">
                                        <button class="float-right">
                                             <b> <i class="fa fa-shopping-cart"></i></b>
                                        </button>
                                   </a>
                              </div>
                         </div>
                    </div>
               </div>
           </div>
</template>
 
<script>
     import axios from 'axios'
     import Spinner from 'vue-simple-spinner'
     import Pagination from 'laravel-vue-pagination'
     import StarRating from 'vue-star-rating'

    export default {
         props: ['url'],
        components: {
             Spinner,
             Pagination,
             StarRating
        },
        data() {
            return {
                products: {},
                catsNames: {},
                loading: false,
                searchValue: null
            }
        },
        created() {
            this.getResults();
        },
        methods: {
             // axios pagenation and fetching categories
            async getResults(page) {
               this.loading = true
                if (typeof page === 'undefined') {
                    page = 1;
                }
               
               await axios.get( 'shop/products?page=' + page)
               .then(res => {
                    const products = res.data.products
                    const catsNames = res.data.catsNames
                    //console.log(products)
                    this.products = products
                    this.catsNames = catsNames
               })
               this.loading = false
               document.getElementById('resetID').reset()
            },
            // fetch product on input search
            async inputSearchValue()
            {
                const value = this.searchValue
                this.loading = true

                await axios.get('/search', { params: {  value: value }  })
               .then(res => {
                    const products = res.data.products
                    this.products = products 
               })
               this.loading = false
               // empty input after sending value ...
               this.searchValue = ''
            },
            //fetch prouducts on chage 
          async changeCat(event)
          {
               const catName = event.target.value
               this.loading = true

               await axios.get('/advancedSearch', { params: {  category: catName }  })
               .then(res => {
                   const data = res.data.products
                    this.products = data
               })
               this.loading = false
          },
          async changePrice(event)
          {
                const price = event.target.value
                this.loading = true
                await axios.get('advancedSearch', { params: {   price: price } })
               .then(res => {
                   const data = res.data.products
                    this.products = data
               })
               this.loading = false
          },
          async checkPromo(event)
          {
               const onSold = event.target.checked
               this.loading = true
                await axios.get('advancedSearch', { params: {   onSold: onSold }  })
               .then(res => {
                   const data = res.data.products
                    this.products = data
               })
               this.loading = false
          },
          async checkNew(event)
          {
               const newProd = event.target.checked
               this.loading = true
                await axios.get('advancedSearch', { params: {  new: newProd }  })
               .then(res => {
                   const data = res.data.products
                    this.products = data
               })
               this.loading = false
          }
        }
     }
</script>
<style lang="scss">
.pagination
{
     justify-content: center;
}
</style>