<template>
   <div>
      <div class="review" v-for="one in reviews" v-bind:key="one.id">
          <div class="head d-flex align-items-center">
              <b-icon v-if="!one.user_id" icon="person-circle" font-scale="2.5"/>
              <div>
                  <strong>{{one.client_name}}</strong>
                  <br>
                  <small>{{one.updated_at}}</small>
              </div>
              <small class="rated">
                  {{one.rating}}
              </small>
          </div>
          <br>
          <div class="content">{{one.review_content}}</div>
          <div class="tasks">
             <md-icon class="fa fa-thumbs-up"></md-icon>  
          </div>
          <hr>
      </div>
   </div>
</template>

<script>

export default {
  props: ['reviews'],
  data: () => {
    return {
    }
  },

}
</script>

<style lang="scss" scoped>
  .reviews {
    width: 200px;
    height: 100px;
    display: inline-flex;
    align-items: flex-end;
    overflow: hidden;
    border: 1px solid rgba(#000, .26);
  }
</style>