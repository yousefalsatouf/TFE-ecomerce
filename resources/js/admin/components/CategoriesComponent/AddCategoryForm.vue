<template>
  <form class="add-categories-form" @submit.prevent="submitCategory" enctype="multipart/form-data">
    <md-card>
      <md-card-header data-background-color="black">
        <h4 class="title">Add Category: </h4>
      </md-card-header>
      <md-card-content>
          <div class="md-layout">
          <div class="md-layout-item md-small-size-100 md-size-50">
              <md-field>
              <span v-if="imported" class="material-icons text-success" style="font-size: 25px">done</span>
              <input type="file" class="form-control-file" id="image" @change="setImage">
              </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-50 lg-size-50">
            <md-field>
              <label>Category Name: </label>
              <md-input v-model="categoryName" name="name" type="text" @keyup="categoryName = $event.target.value"  ></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-size-100">
            <md-field maxlength="5">
              <label>Category Description: </label>
              <md-textarea v-model="description" name="description" @keyup="description = $event.target.value" ></md-textarea>
            </md-field>
          </div>
          </div>
      </md-card-content>
      <md-progress-bar md-mode="indeterminate" v-if="sending" />

      <md-card-actions>
        <md-button type="submit" class="md-success" :disabled="sending">Add Category</md-button>
      </md-card-actions>
    </md-card>
  </form>
</template>

<script>
export default {
      name: "add-categories-form",
      data() {
        return{
          sending: false,
          imported: false,
          image: null,
          categoryName: null,
          description: null,
        }
      },
      methods: {
        setImage(e){
          this.image = e.target.files[0];
          this.imported= true
        },
        async submitCategory(e)
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
          data.append('name', this.categoryName)
          data.append('description', this.description)
          // send upload request
          await axios.post('/admin/addCategory', data, config)
          .then(res => {
            self.$emit('add-category', res.data)
            setTimeout(() => {
                  self.sending= false
                  self.imported= false
            }, 1000);
          })
          .catch(function (error) {
            self.output = error;
          });
        }
      },
}
</script>

<style>
.add-categories-form
     {
           height: 400px;
           width: 95%;
     }

</style>