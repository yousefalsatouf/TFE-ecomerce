<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <side-bar
      class="sidebar"
      :sidebar-item-color="sidebarBackground"
    >
      <mobile-menu slot="content"></mobile-menu>

      <sidebar-link to="/">
        <md-icon>dashboard</md-icon>
        <p>Dashboard</p>
      </sidebar-link>
      <sidebar-link to="/user">
        <md-icon>person</md-icon>
        <p>My Profile</p>
      </sidebar-link>
        <sidebar-link to="users">
          <md-icon>people</md-icon>
          <p>Users</p>
        </sidebar-link>
        <sidebar-link to="locations">
          <md-icon>location_on</md-icon>
          <p>Locations</p>
        </sidebar-link>
        <sidebar-link to="products">
          <md-icon>shopping_cart</md-icon>
          <p>Products</p>
        </sidebar-link>
        <sidebar-link to="categories">
          <md-icon>category</md-icon>
          <p>Categories</p>
        </sidebar-link>
        <sidebar-link to="orders">
          <md-icon>published_with_changes</md-icon>
          <p>Orders</p>
        </sidebar-link>
      
    </side-bar>

    <div class="main-panel">
      <top-navbar></top-navbar>

      <fixed-plugin
        :color.sync="sidebarBackground"
      >
      </fixed-plugin>

      <dashboard-content> </dashboard-content>
      <content-footer v-if="!$route.meta.hideFooter"></content-footer>
    </div>
  </div>
</template>

<script>
import TopNavbar from "./TopNavbar.vue";
import ContentFooter from "./ContentFooter.vue";
import DashboardContent from "./Content.vue";
import MobileMenu from "./MobileMenu.vue";
import FixedPlugin from "./Extra/FixedPlugin.vue";

export default {
  components: {
    TopNavbar,
    DashboardContent,
    ContentFooter,
    MobileMenu,
    FixedPlugin
  },
  data() {
    return {
      sidebarBackground: "green",
    };
  }
};
</script>
<style lang="css">
  .sidebar
  {
    background-color: black;
  }
  .head
  {
    padding: 1rem;
    margin: 1rem;
    color: white;
    font-weight: bolder;
  }
</style>
