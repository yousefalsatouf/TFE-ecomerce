<template>
  <div>
      <div class="success" :class="!success?'d-none':null">
          <SweetalertIcon icon="success" />
     </div>
     <div class="loading" :class="!loading?'d-none':null">
          <SweetalertIcon icon="loading"/>
     </div>
     <div class="faild" :class="!faild?'d-none':null">
          <SweetalertIcon icon="error"/>
     </div>
     <div>
          <h1>Hello {{auth? name : "Stranger"}},</h1>
          <strong> Help others know about this product</strong>
          <hr>
     </div>
      <div>
          <strong v-if="required" class="text-danger text-center">Fields must fill out ! *</strong>
           <md-field class="rating">
               <star-rating 
               v-model="rating"
               @rating-selected ="() => rating= rating"
               v-bind:max-rating="5" 
               v-bind:border-width="2"
               border-color="black" 
               inactive-color="lightgreen" 
               active-color="#38c172" 
               v-bind:star-size="15"
               />
          </md-field>
          <md-field v-if="!auth">
               <label>Name !</label>
               <md-input v-model="strangerName" @keyup="strangerName = $event.target.value" id="strangerName" required></md-input>
          </md-field>
           <md-field v-if="!auth">
               <label>Email !</label>
               <md-input v-model="strangerEmail" @keyup="strangerEmail = $event.target.value" id="strangerEmail"></md-input>
          </md-field>
          <md-field>
               <label>Write something!:</label>
               <md-textarea v-model="commentContent" @keyup="commentContent = $event.target.value" id="commentContent" md-autogrow required></md-textarea>
          </md-field>
          <md-button class="md-raised text-info" submit @click="submitReview">
               <img src="/dist/images/shop/sendB.png" alt="sendLogo">
          </md-button>
      </div>
  </div>
</template>

<script>
import axios from 'axios'
import StarRating from 'vue-star-rating'
import SweetalertIcon from 'vue-sweetalert-icons';

export default {
     props: ["auth", "name", 'productid'],
     components: {
          StarRating,
          SweetalertIcon
     },
     methods: {
          async submitReview()
          {
              if((!this.auth && this.strangerName!= '' && this.commentContent!= '') || (this.auth && this.commentContent!= '') )
             {
               await axios.get('/addReview', {params: {
                    rating: this.rating,
                    name: this.strangerName, 
                    email: this.strangerEmail, 
                    content: this.commentContent, 
                    prodID: this.productid}})
               .then(res => {
                    this.loading = true
                    setTimeout(() => {this.loading= false}, 500);
                    this.success = true
                    setTimeout(() => {this.success= false}, 5000);
                    window.location.reload(true)
               })
             } 
             else
             {
                   this.loading = true
                    setTimeout(() => {this.loading= false}, 500);
                    this.faild = true
                    setTimeout(() => {this.faild= false}, 2000);
                    this.required = true
             }
          }
     },
      data: () => {
          return {
               success: false,
               faild: false,
               loading: false,
               rating: 0,
               strangerName: '',
               strangerEmail: '',
               commentContent: '',
               required: false
          }
     },
}
</script>

<style>
.success, .loading, .faild
{
     position: fixed;
     z-index: 100;
     top: 30%;
     left: 50%;
}
</style>