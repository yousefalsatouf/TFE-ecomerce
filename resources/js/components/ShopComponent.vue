<template>
     <div>
          <div class="row d-flex justify-content-around">
               <div v-for="product in products.data" :key="product.id" class="card">
                    <a v-bind:href="url+'/product_details/'+product.id">
                         <img v-bind:src="url+'/images/'+product.image" class="card-img w-100 h-100" />
                    </a>
                    <div class="card-body">
                         <div class="d-flex justify-content-between">
                              <h6 class="card-text iphone">{{product.product_name}}</h6>
                              <span v-if="product.new_arrival"><img v-bind:src="url+'/dist/images/shop/new.png'" style="width: 50px"></span>
                         </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                         <p class="card-text text-success" v-if="!product.product_price"><strong>FREE</strong></p>
                         <p v-if="product.sold_price && (product.sold_price < product.product_price)" style="text-decoration:line-through; color:#333">
                              {{product.product_price}} EUR
                         </p>
                         <p v-else>{{product.product_price}} EUR</p>
                         <img v-bind:src="url+'/dist/images/shop/sale.png'" alt="..."  style="width:60px">
                         <p>{{product.sold_price}} EUR</p>
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
     <pagination :data="products" @pagination-change-page="getResults"></pagination>
     </div>
</template>
 
<script>
import axios from 'axios'

    export default {
         props: ['url'],
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                products: {},
            }
        },
        created() {
            this.getResults();
        },
        methods: {
            getResults(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
      
                axios.get( 'shop/products?page=' + page)
                    .then(res => {
                        const data = res.data
                         //console.log(data)
                         this.products = data
                    })
            }
        }
    }
</script>