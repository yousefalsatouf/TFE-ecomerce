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
                  <div class="head d-flex align-items-center">
                  <b-icon v-if="!one.image" class="profile-img"  icon="person-circle" font-scale="2.5"/>
                  <img v-else v-bind:src="`/images/${one.image}`" class="profile-img" alt="profile image">
                  <div>
                      <strong v-if="one.user_id!=auth">{{one.client_name}}</strong>
                      <strong v-else>You </strong>
                      <br>
                      <small>{{one.updated_at}}</small>
                  </div>
                  <small class="rated">
                      <img src="/dist/images/shop/starB.png" v-for="star in one.rating" v-bind:key="star" v-bind:alt="star"/>
                  </small>
                </div>
                <br>
                <div class="content text-center">
                  {{one.review_content}}
                </div>
                <md-field class="comment">
                      <div class="tasks">
                        <VueStar color="#F05654">
                          <i slot="icon" class="fa fa-heart heart" @click="increaseLike(one.id, one.product_id, one.likes) "> {{one.likes}}</i>
                        </VueStar>
                      </div>
                    <md-button class="text-success" @click="fetchComments(one.id)">Reply </md-button>
                    <md-button class="text-danger" @click="deleteComment(one.id, one.product_id)" v-if="one.user_id==auth">Remove </md-button>
                </md-field>
                </div>
                <hr>
                <div class="comments" v-if="showComments==one.id">
                  <md-button class="text-danger float-right"  @click="close">Close </md-button>
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
                    <div class="d-flex justify-content-around">
                        <md-field :class="auth?'d-none' : null">
                          <label>Name!</label>
                          <md-input v-model="name" @keyup="name = $event.target.value" id="name" required></md-input>
                        </md-field>
                        <md-field class="comment-input">
                            <label>Comment!</label>
                            <md-input v-model="comment" @keyup="comment = $event.target.value" id="comment" required></md-input>
                        </md-field>
                        <md-button class="md-raised" style="max-width: 5rem;" @click="submitReply(one.id, auth)">
                          <small class="rated">
                            <img src="/dist/images/shop/sendB.png" alt="sendLogo">
                          </small>
                        </md-button>
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
import SweetalertIcon from 'vue-sweetalert-icons';

export default {
  props: ['reviews', 'auth', 'empty'],
  components: {
    VueStar,
    SweetalertIcon,
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
  box-shadow: 8px 7px 8px -6px #888c8b ;
  padding: 1rem;
  *
  {
    flex: 100%;
  }
  .head
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
  .rated
  {
    img
    {
     max-width: 20px;
     margin-right: 0rem !important;
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
  display: flex;
}
.tasks
{
  margin-top: 1rem;
  .heart
  {
    font-size: 15px;
    &:hover
    {
      cursor: pointer;
    }
  }
}
.comments
{
  background-color: lightgrey;
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
</style>