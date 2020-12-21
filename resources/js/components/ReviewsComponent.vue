<template>
   <div>
      <div class="review" v-for="one in newReviews ? newReviews : reviews" v-bind:key="one.id">
          <div class="head d-flex align-items-center">
              <b-icon v-if="!one.image" class="profile-img"  icon="person-circle" font-scale="2.5"/>
              <img v-else v-bind:src="`/images/${one.image}`" class="profile-img" alt="profile image">
              <div>
                  <strong v-if="one.user_id!=auth">{{one.client_name}}</strong>
                  <strong v-else>You</strong>
                  <br>
                  <small>{{one.updated_at}}</small>
              </div>
              <small class="rated">
                  <img src="/dist/images/shop/starB.png" v-for="star in one.rating" v-bind:key="star" v-bind:alt="star"/>
              </small>
          </div>
          <br>
          <div class="content">
            {{one.review_content}}
          </div>
          <div class="tasks">
              <VueStar color="#F05654">
                <i slot="icon" class="fa fa-heart heart" @click="increaseLike(one.id, one.product_id, one.likes) "> {{one.likes}}</i>
              </VueStar>
          </div>
          <hr>
      </div>
      <hr>
   </div>
</template>

<script>
import VueStar from 'vue-star'
import axios from 'axios'

export default {
  props: ['reviews', 'auth'],
  components: {
    VueStar,
  },
  data: () => {
    return {
      like: false,
      newReviews: null
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
     color: green;
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
.tasks
{
  position: absolute;
  bottom: 50px;
  .heart
  {
    font-size: 15px;
    &:hover
    {
      cursor: pointer;
    }
  }
}
</style>