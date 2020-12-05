<template>
  <div>
    <div class="order-summary" v-if="!paidFor">
          <div class="block-body">
               <table class="table">
                    <thead>
                         <tr class="cart_menu">
                              <th class="image">Shipping Cost</th>
                              <th class="title">Tax</th>
                              <th class="description">Subtotal</th>
                              <th class="description">Total</th>
                         </tr>
                    </thead>
                    <tbody>
                         <tr>
                              <td><b class="text-success">Free</b></td>
                              <td>{{tax}} EUR</td>
                              <td>{{price}} EUR</td>
                              <td>{{amount}} EUR</td>
                         </tr>
                    </tbody>
                    </table>
          </div>
     </div>
     <div class="d-flex justify-content-center" v-if="bSpinner"> 
          <BSpinner type="grow" variant="success"/>
          <BSpinner type="grow" variant="success"/> 
          <BSpinner type="grow" variant="success"/> 
     </div>
    <div v-if="paidFor">
          <div v-if="!orderFaild" class="container">
                <div class="bill card"  v-for="item in orderSuccessed" v-bind:key="item.id">
                    <div class="card-body">
                         <h4 class="text-center text-success">Status: {{item.status}}</h4>
                          <strong>Date of purchase : {{item.create_time}}</strong>
                          <hr>
                         <p>Name: {{item.payer.name.given_name}} {{item.payer.name.surname}}</p>
                          <p>Email Address: {{item.payer.email_address}}</p>
                        <strong class="text-info">Total Paied : {{amount}}</strong>
                    </div>
                    <div class="card-footer text-center">
                        <strong class="text-success">
                            <i class="fa fa-check-circle"></i>
                            You'v received an email with the bill
                        </strong>
                    </div>
                </div>
                <br>
          </div>
          <div class="alert alert-danger" v-if="orderFaild">
               <strong class="d-flex justify-content-around">
                    Sorry, payment Faild
                    Something went wrong while effectuing the payment !
                    <span   onclick="this.parentElement.style.display='none'" class="w3-button w3-red w3-large w3-display-topright">&times;</span>
               </strong>
          </div>
    </div>
    <div v-if="!paidFor" ref="paypal" class="d-flex justify-content-center"></div>
  </div>
</template>

<script>
import { BSpinner } from 'bootstrap-vue'
import axios from 'axios'

export default {
     props: ["amount", "price", "tax", "cartitems"],
     components: {
          BSpinner
     },
     data: function() {
     return {
          loaded: false,
          bSpinner: false,
          paidFor: false,
          orderSuccessed: [],
          orderFaild: false,
          items: {
          amount: this.amount,
          description: "leg lamp from that one movie",
          img: "./assets/lamp.jpg"
          }
     };
     },
  mounted: function() {
    const script = document.createElement("script");
    const clientId = 'AUP5fKBdz5W1Sy7_PZtaDhj8xqyuSe73vTLYtJtR7AmoOF03_llG4ROCJdm6RXqETs774gptBzCteTsw'
    script.src =  `https://www.paypal.com/sdk/js?client-id=${clientId}`;
    script.addEventListener("load", this.setLoaded);
    document.body.appendChild(script);
  },
  methods: {
    setLoaded: function() {
      this.loaded = true;
      window.paypal
          .Buttons({
          createOrder: (data, actions) => {
            return actions.order.create({
              purchase_units: [
                {
                  description: this.items.description,
                  amount: {
                    currency_code: "USD",
                    value: this.items.amount
                  }
                }
              ]
            });
          },
          onApprove: async (data, actions) => {
               this.bSpinner = true
               const completOrder = await actions.order.capture();
               this.bSpinner = false
               this.paidFor = true
               this.orderSuccessed.push(completOrder)
               //console.log(this.orderSuccessed);
               //create the order and destroy the cart
               axios.get('/finishOrder')
               .then(res => {
                    console.log(res.data)
               })
          },
          onError: err => {
               this.orderFaild = true
               console.log(err);
          }
        })
        .render(this.$refs.paypal);
    }
  }
};
</script>