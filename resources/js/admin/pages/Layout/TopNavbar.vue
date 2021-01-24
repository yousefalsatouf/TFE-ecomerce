<template>
  <md-toolbar md-elevation="0" class="md-transparent">
    <div class="md-toolbar-row">
      <div class="md-toolbar-section-start">
        <h1 class="md-title">{{ $route.name }}</h1>
      </div>
      <div class="md-toolbar-section-end">
        <md-button
          class="md-just-icon md-simple md-toolbar-toggle"
          :class="{ toggled: $sidebar.showSidebar }"
          @click="toggleSidebar"
        >
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </md-button>

        <div class="md-collapse">
          <md-list>
            <md-list-item>
              <a href="#/inbox">
                <div class="md-list-item-content">
                    <md-button
                      slot="title"
                      class="md-button md-just-icon md-simple"
                    >
                      <md-icon>inbox</md-icon>
                      <span class="notification">5</span>
                      <p class="hidden-lg hidden-md">Inbox</p>
                    </md-button>
                </div>
              </a>
            </md-list-item>
            <md-list-item href="#/">
              <i class="material-icons" style="font-size: 40px">person</i>
              <p class="hidden-lg hidden-md">Profile</p>
            </md-list-item>
          </md-list>
        </div>
      </div>
    </div>
  </md-toolbar>
</template>

<script>

export default {
  data() {
    return {
      selectedEmployee: null,
    };
  },
  methods: {
    toggleSidebar() {
      this.$sidebar.displaySidebar(!this.$sidebar.showSidebar);
    }
  }
};
</script>

<style lang="css"></style>
