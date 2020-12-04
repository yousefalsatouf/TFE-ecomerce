<template>
  <div class="paypal">
     <PayPal  
     :amount="amount"
     :items="items"
     currency="EUR" 
     :client="clientId"
     env="sandbox" 
     />
  </div>
</template>

<script>
import PayPal from 'vue-paypal-checkout'

export default 
{
     props: ["cartitems", "amount", "tax"],
     components: {
          PayPal
     },
     data () {
          const object = this.cartitems
          const items = []

          for (const key in object) {
               const element = object[key];

               if (element.qty >= 2) 
               {
                    const qty = +element.qty

                    for (let index = 0; index < qty; index++) {
                         items.push({
                              "name": element.name,
                              "quantity": 1,
                              "price": (element.price + element.tax),
                              "currency": "EUR"
                         })
                    }
               }
               else
               {
                    items.push({
                         "name": element.name,
                         "quantity": element.qty,
                         "price": (element.price + element.tax),
                         "currency": "EUR"
                    })
               }
          }
          return {
               clientId: {
                    sandbox: 'AUP5fKBdz5W1Sy7_PZtaDhj8xqyuSe73vTLYtJtR7AmoOF03_llG4ROCJdm6RXqETs774gptBzCteTsw',
               },
               items: items,
          }
     },
     methods: {
         
     }
}
</script>