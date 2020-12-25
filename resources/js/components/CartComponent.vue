<template>
  <div>
     <div class="success" :class="!success?'d-none':null">
          <SweetalertIcon icon="success" />
     </div>
     <div v-if="setEmpty? setEmpty : empty" class="text-center empty-cart">
          <img src="/dist/img/empty-cart.png" alt="photo"/>
      </div>
      <div v-else class="cart-content">
          <div class="table-responsive">
               <table class="table">
                    <thead>
                    <tr class="cart_menu">
                         <th class="image text-success"><h5>Shopping Cart</h5></th>
                         <th class="text-black-50">{{ setSize? setSize : size}} Item(s) in your cart!</th>
                         <th class="price">Price</th>
                         <th class="quantity text-center">Quantity</th>
                         <th class="total">Total</th>
                         <th></th>
                    </tr>
                    </thead>
                    <tbody>
                         <tr v-for="item in setItems? setItems : items" v-bind:key="item.rowId">
                              <td class="cart_product w-25 h-25">
                                   <p class="w-50 h-50"><img v-bind:src="`images/${item.options.img}`" alt="photo" class="card-img-top w-100" ></p>
                              </td>
                              <td class="cart_description">
                                   <h4>{{item.name}}</h4>
                                   <strong class="text-danger">{{(item.options.stock - item.qty)}} Only left!</strong>
                              </td>
                              <td class="cart_price">
                                   <strong>{{item.price}}</strong>
                              </td>
                              <td class=" border-0">
                                   <i class="fa fa-minus updateQty" @click="decreaseQty(item.rowId, item.qty)"></i>
                                   <strong>{{item.qty}}</strong> 
                                   <i class="fa fa-plus updateQty" @click="increaseQty(item.rowId, item.qty, item.options.stock)"></i>
                              </td>
                              <td class="cart_price">
                                   <strong>{{item.subtotal}}</strong>
                              </td>
                              <td >
                                   <strong>
                                        <a href="#" @click="removeItem(item.rowId)" v-if="!spinner"  class="remove">Remove</a>
                                        <Spinner  v-else size="small" line-fg-color="green"/>
                                        </strong>
                              </td>
                         </tr>
                         <hr>
                    </tbody>
               </table>
          </div>
          <hr>
          <div class="sum float-right">
               <strong>Tax: {{setTax? setTax : tax}} EUR</strong>
               <br>
               <strong>Sum: {{setSum? setSum : sum}} EUR</strong>
          </div>
          <div class="resume">
               <div class="container">
                    <div class="row">
                         <div class="side">
                              <div class="next-area">
                                   <div class="heading">
                                        <h2>What do you want to do next?</h2>
                                        <hr>
                                        <p>Choose if you have a discount code or reward points that you want to use or want to estimate your shipping cost.</p>
                                   </div>
                                   <div>
                                        <a v-bind:href="shop" class="text-dark">
                                             <button>
                                                  <strong><i class="fa fa-backward"></i>Add More</strong>
                                             </button>
                                        </a>
                                        <a v-bind:href="checkout" class="text-dark">
                                             <button class="float-right">
                                                  <strong>Next<i class="fa fa-eye"></i></strong>
                                             </button>
                                        </a>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
      </div>
  </div>
</template>

<script>
 import axios from 'axios'
 import Spinner from 'vue-simple-spinner'
 import SweetalertIcon from 'vue-sweetalert-icons';


export default {
     props: ['items', 'sum', 'tax', 'empty', 'size', 'shop', 'checkout'],
     components: {
          Spinner,
          SweetalertIcon
     },
     data: () => {
          return {
               setItems: null,
               setSize: null,
               setTax: null,
               setSum: null,
               setEmpty: false,
               spinner: false,
               success: false
          }
     },
     methods: {
         async removeItem(id)
          {
               //console.log(id);
               this.spinner = true
               await axios.get('/cart/removeItem', {params: {id: id}})
               .then(res => {
                    //edit reviews here ...
                     if (res.data.size===0) 
                    {
                          this.setEmpty = true
                    } else 
                    {
                         this.setItems = res.data.cartItems;
                         this.setSize = res.data.size;
                         this.setTax = res.data.tax;
                         this.setSum = res.data.sum;
                         this.success = true
                    }     
                    this.spinner = false
                    this.success  = true
                    setTimeout(() => {  this.success  = false; }, 2000);                             
               })
          },
          async increaseQty(id, qty, stock)
          {
              let newQty = +qty+1
              this.spinnerInc = true
               if (newQty>=stock) {
                    alert('No more in stock :(')
                    return 
               }
               else
               {
                    await axios.get('/cart/updateItem', {params: {id: id, qty: newQty}})
                    .then(res => {                    
                              this.setItems = res.data.cartItems;
                              this.setSize = res.data.size;
                              this.setTax = res.data.tax;
                              this.setSum = res.data.sum;                               
                    })
               }
               this.spinnerInc = false
          },
          async decreaseQty(id, qty)
          {
              
               await axios.get('/cart/updateItem', {params: {id: id, qty: +qty-1}})
               .then(res => {                    
                    if (res.data.size===0) 
                    {
                         return this.setEmpty = true
                    } else 
                    {
                         this.setItems = res.data.cartItems;
                         this.setSize = res.data.size;
                         this.setTax = res.data.tax;
                         this.setSum = res.data.sum;
                    }                              
               })
          },
          }
     }

</script>

<style>
.remove
{
     color: #ED277F !important
}
.table td:not(:first-child) {
     text-align: center;
     padding-top: 3rem;
}
.updateQty:hover
{
     cursor: pointer;
}
.success
{
     position: fixed;
     z-index: 100;
     top: 30%;
     left: 50%;
}
</style>