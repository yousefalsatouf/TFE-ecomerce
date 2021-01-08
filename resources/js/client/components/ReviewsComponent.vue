<template>
   <div>
          <div class="success" :class="!success?'d-none':null">
                <SweetalertIcon icon="success" />
          </div>
          <div class="loading" :class="!loading?'d-none':null">
                <SweetalertIcon icon="loading"/>
          </div>

          <h1>All reviews</h1>
          <hr>
          <div class="review" v-for="one in setReviews ? setReviews : reviews" v-bind:key="one.id">
            <div v-if="!empty">
                <div>
                  <div class=".md-ripple d-flex align-items-center">
                  <b-icon v-if="!one.image" class="profile-img"  icon="person-circle" font-scale="2.5"/>
                  <img v-else v-bind:src="`/images/${one.image}`" class="profile-img" alt="profile image">
                  <div>
                      <strong v-if="one.user_id!=auth">{{one.client_name}}</strong>
                      <strong v-else>You </strong>
                      <br>
                      <small>{{one.updated_at}}</small>
                  </div>
                  <star-rating 
                    :rating="one.rating"
                    :max-rating="5" 
                    read-only
                    active-color="#38c172" 
                    v-bind:star-size="15"
                    />
                </div>
                <br>
                <div class="content">
                  {{one.review_content}}
                </div>
                <md-field class="comment">
                      <VueStar color="#F05654">
                        <i slot="icon" class="fa fa-heart heart" @click="increaseLike(one.id, one.product_id, one.likes) "> {{one.likes}}</i>
                      </VueStar>
                      <span class="material-icons " @click="fetchComments(one.id)">reply</span>
                      <span class="material-icons text-danger" @click="deleteComment(one.id, one.product_id)" v-if="one.user_id==auth">delete</span>
                </md-field>
                </div>
                <div class="comments" v-if="showComments==one.id">
                   <span class="material-icons float-right text-danger" @click="close">close</span>
                  <div v-if="comments">
                      <div v-for="comment in comments" :key="comment.id">
                          <div class="content-comment">
                            <div class="person">
                              <b-icon v-if="!comment.image" class="profile-img"  icon="person-circle" font-scale="2.5"/>
                              <img v-else v-bind:src="`/images/${comment.image}`" class="profile-img" alt="profile image">
                            </div>
                              <div>
                                  <strong v-if="comment.user_id!=auth">{{comment.name}}</strong>
                                  <strong v-else>You</strong>
                                  <br>
                                  <small>{{comment.updated_at}}</small>
                              </div>
                            </div>
                          <div class="text-center">{{comment.reply}}</div>
                      </div>
                  </div>
                  <small v-else class="text-dange align-self-center">No comments ! Be the first one.</small>
                  <hr>
                    <div class="d-flex">
                        <md-field :class="auth?'d-none' : null">
                          <label>Name!</label>
                          <md-input v-model="name" @keyup="name = $event.target.value" id="name" required></md-input>
                        </md-field>
                        <md-field class="comment-input">
                            <label>Comment!</label>
                            <md-input v-model="comment" @keyup="comment = $event.target.value" id="comment" required></md-input>
                        </md-field>
                        <span class="material-icons send" @click="submitReply(one.id, auth)">send</span>
                      </div>
                </div>
            </div>
            <div v-else>
                No reviews on this Product! Be the first one .
            </div>
        </div>
   </div>
</template>

<script>
import VueStar from 'vue-star'
import axios from 'axios'
import SweetalertIcon from 'vue-sweetalert-icons'
import StarRating from 'vue-star-rating'

export default {
  props: ['reviews', 'auth', 'empty'],
  components: {
    VueStar,
    SweetalertIcon,
    StarRating
  },
  data: () => {
    return {
      like: false,
      setReviews: '',
      showComments: false,
      name: null,
      comment: null,
      comments: null,
      success: false,
      loading: false,
    }
  },
  methods: {
    async increaseLike(id, prodID, value)
    {
      if (!this.like || this.like!=id)
      {
        let newValue = value + 1
        this.like = id
        await axios.get('/singleProd/like', { params: {  value: newValue, id: id, prodId: prodID }  })
               .then(res => {
                  //edit reviews here ...
                 this.setReviews = res.data
               })
      }
       else
      {
        let newValue = value - 1
        this.like = false
        await axios.get('/singleProd/like', { params: {  value: newValue, id: id, prodId: prodID }  })
        .then(res => {
          //edit reviews here ...
            this.setReviews = res.data
        })
      }
    },
    async fetchComments(id)
   {
     this.showComments = id
     this.loading = true
     await axios.get('/singleProd/fetchComments', { params: {  id: id }  })
      .then(res => {
        //edit reviews here ...
        if (res.data.length===0) {
          this.comments  = null
        } else {
          this.comments  = res.data
        }
      })
      setTimeout(() => {  this.loading  = false; }, 200);  
   }, 
    async submitReply(reviewID, userID)
    {
     // console.log(reviewID, userID, this.comment, this.name)
        await axios.get('/singleProd/submitReply', { params: {  reviewID: reviewID, userID: userID, comment: this.comment, name: this.name}  })
        .then(res => {
          //edit reviews here ...
          if (res.data.length===0) {
            this.comments  = null
          } else {
            this.comments  = res.data
          }
          this.success  = true
          setTimeout(() => {  this.success  = false; }, 2000);   
      })
      this.name = null
      this.comment=null
    },
    async deleteComment(id, prodID)
    {
      await axios.get('/removeReview', { params: {  id: id, prodID: prodID }  })
      .then(res => {
        //edit reviews here ...        
        this.setReviews  = res.data
        this.success  = true
        setTimeout(() => {  this.success  = false; }, 2000);   
      })
    },
    close(id)
    {
      this.showComments= null
    }
  }
}
</script>

<style lang="scss" scoped>
.review
{
  position:relative;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  margin: 5rem 1rem;
  padding: 1rem;
  background-color: lightgray;
  *
  {
    flex: 100%;
  }
  .head-comment
  {
    div
    {
     margin: 0;
     padding: 0;
    }
    .profile-img
     {
      max-width: 40px;
      max-height: 40px;
      margin: 0 4rem !important;
     }
  }
}
.content
{
  margin: 1rem;
  flex: 1;
}
.comment
{
  
}

  .heart
  {
    font-size: 15px;
    &:hover
    {
      cursor: pointer;
    }
  }
.send
{
  margin-top: 2rem;
  margin-left: 2rem;
}
.comments
{
  padding: 1rem;
}
.content-comment
{
  display: flex;
  margin: 1rem auto;
  div
  {
    max-width: 20%;
    text-align: start;
  }
  .person
  {
    text-align: center;
    margin-left: 5rem;
  }
}
 span
 {
   text-align: center;
   border-bottom: 2px solid white;
   &:hover
   {
     cursor: pointer;
   }
 }
</style>