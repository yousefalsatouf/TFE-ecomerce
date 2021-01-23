<template>
  <form class="add-products-form" @submit.prevent="submitProduct">
    <md-card>
      <md-card-header data-background-color="black">
        <h4 class="title">Add product</h4>
      </md-card-header>
      <md-card-content>
          <div class="md-layout">
          <div class="md-layout-item md-small-size-100 md-size-33 lg-size-33">
            <md-field>
              <label>Prodcut Name: </label>
              <md-input v-model="productName" type="text" @keyup="productName = $event.target.value" required ></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33 lg-size-33">
            <md-field>
              <label>Product Code: </label>
              <md-input v-model="productCode" type="number" @keyup="productCode = $event.target.value" required></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33 lg-size-33">
            <md-field>
              <label>Product Price: </label>
              <md-input v-model="productPrice" type="number"  @keyup="productPrice = $event.target.value" required></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33 lg-size-33">
            <md-field>
              <label>Shopping Cost: </label>
              <md-input v-model="shoppingCost" type="number"  @keyup="shoppingCost = $event.target.value"></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33 lg-size-33">
            <md-field>
              <label>Stock: </label>
              <md-input v-model="stock" type="number"  @keyup="stock = $event.target.value" required></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33 lg-size-33">
            <md-field>
              <label>Sold Price: </label>
              <md-input v-model="soldPrice" type="number"  @keyup="soldPrice = $event.target.value"></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field>
              <label for="category">Select Category: </label>
              <md-select v-model="category" name="category" id="category">
                <md-option v-for="cat in categories" :key="cat.id" :value="cat.id" class="text-dark">{{ cat.name }}</md-option>
              </md-select>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33 lg-size-33">
            <md-checkbox v-model="newArrival">New Arrival?</md-checkbox>
          </div>
          <div class="md-layout-item md-size-100">
            <md-field maxlength="5">
              <label>Product Description: </label>
              <md-textarea v-model="productInfo"  @keyup="productInfo = $event.target.value" required></md-textarea>
            </md-field>
          </div>
          </div>
      </md-card-content>
      <md-progress-bar md-mode="indeterminate" v-if="sending" />

      <md-card-actions>
        <md-button type="submit" class="md-success" :disabled="sending">Add Product</md-button>
      </md-card-actions>
    </md-card>
  </form>
</template>

<script>
export default {
      name: "add-products-form",
      props: ['categories'],
      data: () => {
        return{
          sending: false,
          productName: null,
          productCode: null,
          productPrice: null,
          shoppingCost: null,
          stock: null,
          soldPrice: null,
          category: null,
          newArrival: false,
          productInfo: null,
        }
      },
      methods: {
        async submitProduct(event)
          {
            this.sending= true
              await axios.get('/admin/addProduct', {params: {
                  name: this.productName,
                  code: this.productCode, 
                  price: this.productPrice, 
                  description: this.productInfo, 
                  shoppingCost: this.shoppingCost,
                  stock: this.stock, 
                  sold: this.soldPrice, 
                  new: this.newArrival,
                  category: this.category,
              }})
              .then(res => {
                  this.$emit('add-product', res.data)
                 setTimeout(() => {
                    this.sending = false
                 }, 1000);
              })
          },
      },

}
</script>

<style lang="scss">
.add-products-form
{
  height: 400px;
  width: 95%;
  margin: auto;
  overflow: scroll;
}
 button, a.link
{
  color: black !important;
}

</style>