<template>
  <form class="add-products-form" @submit.prevent="submitProduct">
    <md-card>
      <md-card-header data-background-color="black">
        <h4 class="title">Add product</h4>
      </md-card-header>
      <md-card-content>
          <div class="md-layout">
            <div class="md-layout-item md-small-size-100 md-size-33">
              <md-field>
              <span v-if="imported" class="material-icons text-success" style="font-size: 25px">done</span>
              <input type="file" class="form-control-file" id="image" @change="setImage($event)" required>
              </md-field>
          </div>
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
            <md-checkbox v-model="newArrival" :value="false">New Arrival?</md-checkbox>
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
      props: ['categories', 'product', 'bus'],
      data: () => {
        return{
          sending: false,
          id: null,
          image: null,
          imported: false,
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
      mounted() {
        this.bus.$on('edit-product', this.editProduct)
      }, 
      methods: {
        setImage(e)
        {
           this.image = e.target.files[0];
          this.imported= true
        },
        editProduct(product)
        {
          this.id= product[0].id
          this.productName= product[0].product_name
          this.productCode= product[0].product_code,
          this.productPrice= product[0].product_price,
          this.shoppingCost= product[0].shopping_cost,
          this.stock= product[0].stock,
          this.soldPrice= product[0].sold_price,
          this.category= product[0].category_id,
          this.productInfo= product[0].product_info
         window.scrollTo({top: 0, behavior: 'smooth'});
        },
        async submitProduct(e)
        {
          e.preventDefault();
          this.sending= true
          let self = this;
          const config = {
              headers: {
                  'content-type': 'multipart/form-data'
              }
          }
          // form data
          let data = new FormData();
          data.append('file', this.image);
          data.append('id', this.id)
          data.append('name', this.productName)
          data.append('code', this.productCode)
          data.append('price', this.productPrice);
          data.append('description', this.productInfo)
          data.append('shoppingCost', this.shoppingCost)
          data.append('stock', this.stock)
          data.append('sold', this.soldPrice);
          data.append('new', this.newArrival)
          data.append('category', this.category)
          // send upload request
          await axios.post('/admin/addProduct', data, config)
          .then(res => {
              self.$emit('add-product', res.data)
              setTimeout(() => {
                self.sending = false
                self.imported= false
              }, 1000);
          })
      },
      },

}
</script>

<style lang="scss">

 button, a.link
{
  color: black !important;
}

</style>