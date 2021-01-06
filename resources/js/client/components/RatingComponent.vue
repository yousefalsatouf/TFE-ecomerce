<template>
  <div class="container d-flex justify-content-between flex-wrap">
     <div class="success" :class="!success?'d-none':null">
          <SweetalertIcon icon="success" />
     </div>
     <div class="loading" :class="!loading?'d-none':null">
          <SweetalertIcon icon="loading"/>
     </div>
     <div class="faild" :class="!faild?'d-none':null">
          <SweetalertIcon icon="error"/>
     </div>

     <div class="new col-sm-12 col-md-5 col-lg-3">
          <div>
               <h3>Hello {{auth? name : "Stranger"}},</h3>
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
                    <md-input v-model="strangerEmail" type="email" @keyup="strangerEmail = $event.target.value" id="strangerEmail"></md-input>
               </md-field>
               <md-field>
                    <label>Write something!:</label>
                    <md-textarea v-model="commentContent" @keyup="commentContent = $event.target.value" id="commentContent" md-autogrow required></md-textarea>
               </md-field>
               <span class="material-icons " @click="submitReview">send</span>
          </div>
     </div>

      <div class="reviews col-sm-12 col-md-6 col-lg-8">
           <Reviews  :auth="auth" :reviews="addReview? addReview : reviews"/>
      </div>
  </div>
</template>

<script>
import Reviews from './ReviewsComponent'
import axios from 'axios'
import StarRating from 'vue-star-rating'
import SweetalertIcon from 'vue-sweetalert-icons';

export default {
     props: ["auth", "reviews", "empty", "name", 'productid'],
     components: {
          StarRating,
          SweetalertIcon,
          Reviews
     },
     methods: {
          async submitReview(event)
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
                    this.addReview = res.data
                    this.success = true
                    this.strangerName = ''
                    this.strangerEmail = ''
                    this.commentContent = ''
                    setTimeout(() => {this.success= false}, 5000);
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
               required: false,
               addReview: ''
          }
     },
}
</script>

<style lang="scss">
.success, .loading, .faild
{
     position: fixed;
     z-index: 100;
     top: 30%;
     left: 50%;
}
span
{
     &:hover
     {
          cursor: pointer;
     }
}
</style>