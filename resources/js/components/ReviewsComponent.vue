<template>
   <div>
      <div class="review" v-for="one in newReviews ? newReviews : reviews" v-bind:key="one.id">
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
              <md-button class="text-success" @click="fetchComments(one.id)">Replay </md-button>
              <md-button class=" text-danger" @click="deleteComment(one.id, one.product_id)" v-if="one.user_id==auth">Delete </md-button>
          </md-field>
          <div class="comments" v-if="showComments">
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
                    <div class="text-center">{{comment.replay}}</div>
                </div>
             </div>
             <smal v-else class="text-danger" >No comments !!</smal>
              <div class="d-flex justify-content-around">
                  <md-field :class="auth?'d-none' : null">
                    <label>Name!</label>
                    <md-input v-model="name" @keyup="name = $event.target.value" id="name" required></md-input>
                  </md-field>
                  <md-field class="comment-input">
                      <label>Comment!</label>
                      <md-input v-model="comment" @keyup="comment = $event.target.value" id="comment" required></md-input>
                  </md-field>
                  <md-button class="md-raised" style="max-width: 5rem;" @click="submitReplay(one.id, auth)">
                    <small class="rated">
                      <img src="/dist/images/shop/sendB.png" alt="sendLogo">
                    </small>
                  </md-button>
                </div>
          </div>
      </div>
      <hr>
   </div>
</template>

<script>
import VueStar from 'vue-star'
import axios from 'axios'
import SweetalertIcon from 'vue-sweetalert-icons';
//<sweetalert-icon icon="success" />

export default {
  props: ['reviews', 'auth'],
  components: {
    VueStar,
    SweetalertIcon
  },
  data: () => {
    return {
      like: false,
      newReviews: null,
      showComments: false,
      name: null,
      comment: null,
      comments: null
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
                 this.newReviews = res.data
               })
      }
       else
      {
        let newValue = value - 1
        this.like = false
        await axios.get('/singleProd/like', { params: {  value: newValue, id: id, prodId: prodID }  })
        .then(res => {
          //edit reviews here ...
            this.newReviews = res.data
        })
      }
    },
    async fetchComments(id)
   {
     this.showComments =  !this.showComments
     await axios.get('/singleProd/fetchComments', { params: {  id: id }  })
      .then(res => {
        //edit reviews here ...
        if (res.data.length===0) {
          this.comments  = null
        } else {
          this.comments  = res.data
        }
      })
   }, 
    async submitReplay(reviewID, userID)
    {
     // console.log(reviewID, userID, this.comment, this.name)
        await axios.get('/singleProd/submitReplay', { params: {  reviewID: reviewID, userID: userID, comment: this.comment, name: this.name}  })
        .then(res => {
          //edit reviews here ...
          if (res.data.length===0) {
            this.comments  = null
          } else {
            this.comments  = res.data
          }
      })
    },
    async deleteComment(id, prodID)
    {
      await axios.get('/removeReview', { params: {  id: id, prodID: prodID }  })
      .then(res => {
        //edit reviews here ...
        if (res.data.length===0) {
          this.newReviews  = null
        } else {
          this.newReviews  = res.data
        }
      })
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