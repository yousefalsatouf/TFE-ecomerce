<template>
     <div class="productsSearch">
          <!--search advanced search goes here -->
          <div class="advanced-search">
                <Spinner size="large" line-fg-color="green" v-if="loadingAdvanced"/>
               <br>
               <div class="container">
                    <div class="search">
                         <div class="search-specific">
                              <h5>Search By .... </h5>
                              <hr>
                              <div class="search-area">
                                        <form id="resetID">
                                             <div class="form-group">
                                             <label for="category"><b>Categorie</b><br>
                                                  <select name="category" @change="changeCat($event)" class="browser-default custom-select" id="category">
                                                       <option value="all" selected>all</option>
                                                       <option v-for="cat in catsNames" :key="cat.id" v-bind:value="cat.name">{{cat.name}}</option>
                                                  </select>
                                             </label>
                                        </div>
                                        <div class="form-group">
                                             <label for="maxPrice"><b>Prix</b>
                                                  <input type="number" @change="changePrice($event)"  class="form-control" id="greater-than" name="price" placeholder="Max Price">
                                             </label>
                                        </div>
                                        <div class="form-group">
                                             <label for="max" class="d-flex">
                                                  <b>Promo</b>
                                                  <input type="checkbox" @change="checkPromo($event)"  class="form-control" id="max" name="promo">
                                             </label>
                                             <label for="new" class="d-flex">
                                                  <b>Nouvelles</b>
                                                  <input type="checkbox" @change="checkNew($event)"  class="form-control" id="new" name="new">
                                             </label>
                                        </div>
                                   </form>
                                   <button @click="getResults" v-if="!loadingAdvanced">RSET</button>
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
                                   <label for="search">
                                        <input type="text"  id="search" class="form-control mr-2" ref="searchInput" placeholder="Search by product name, mark ....">
                                   </label>
                                   <button @click.prevent="inputSearchValue" v-if="!loadingInput"><i class="fa fa-search" ></i></button>
                                   <Spinner size="large" line-fg-color="green" v-if="loadingInput"/>
                              </div>
                         </div>
                         <hr>
                    <!--Search input ends-->
                    <div class="row d-flex justify-content-around articles">
                            <div v-for="product in products.data?products.data:products" :key="product.id" class="card">
                              <a v-bind:href="url+'/product_details/'+product.id">
                                   <img v-bind:src="url+'/images/'+product.image" class="card-img w-100 h-100" />
                              </a>
                              <a v-bind:href="url+'/cart/addItem/'+product.id" class="text-dark">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#38c172" class="bi bi-plus-circle-fill add-cart" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                   </svg>
                              </a>
                              <div class="card-body">
                                   <div class="d-flex justify-content-between">
                                        <h6 class="card-text iphone">{{product.product_name}}</h6>
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
                    <Spinner size="large" line-fg-color="green" v-if="loadingPaginate"/>
                     <pagination :data="products?products:[]" @pagination-change-page="getResults"></pagination>
               </div>
           </div>
</template>
 
<script>
     import axios from 'axios'
     import Spinner from 'vue-simple-spinner'

    export default {
         props: ['url'],
        components: {
             Spinner
        },
        data() {
            return {
                products: {},
                catsNames: {},
                loadingPaginate: false,
                loadingInput: false,
                loadingAdvanced: false
            }
        },
        created() {
            this.getResults();
        },
        methods: {
             // axios pagenation and fetching categories
            async getResults(page) {
               this.loadingPaginate = true
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
               this.loadingPaginate = false
               document.getElementById('resetID').reset()
            },
            // fetch product on input search
            async inputSearchValue()
            {
                const value = this.$refs.searchInput.value
                this.loadingInput = true

                await axios.get('/search', { params: {  value: value }  })
               .then(res => {
                    const products = res.data.products
                    this.products = products 
               })
               this.loadingInput = false
               // empty input after sending value ...
               this.$refs.searchInput.value = ''
            },
            //fetch prouducts on chage 
          async changeCat(event)
          {
               const catName = event.target.value
               this.loadingAdvanced = true

               await axios.get('/advancedSearch', { params: {  category: catName }  })
               .then(res => {
                   const data = res.data.products
                    console.log(data)
                    this.products = data
               })
               this.loadingAdvanced = false
          },
          async changePrice(event)
          {
                const price = event.target.value
                this.loadingAdvanced = true
                await axios.get('advancedSearch', { params: {   price: price } })
               .then(res => {
                   const data = res.data.products
                   console.log(data)
                    this.products = data
               })
               this.loadingAdvanced = false
          },
          async checkPromo(event)
          {
               const onSold = event.target.checked
               this.loadingAdvanced = true
                await axios.get('advancedSearch', { params: {   onSold: onSold }  })
               .then(res => {
                   const data = res.data.products
                   console.log(data)
                    this.products = data
               })
               this.loadingAdvanced = false
          },
          async checkNew(event)
          {
               const newProd = event.target.checked
               this.loadingAdvanced = true
                await axios.get('advancedSearch', { params: {  new: newProd }  })
               .then(res => {
                   const data = res.data.products
                   console.log(data)
                    this.products = data
               })
               this.loadingAdvanced = false
          }
        }
     }
       
</script>