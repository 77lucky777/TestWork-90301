<template>
  <div>
    <b-navbar toggleable="lg" type="dark" variant="secondary" class="mb-4">
      <b-navbar-brand tag="h1" class="m-0">
        <nuxt-link class="navbar-brand" to="/">Test Work</nuxt-link>
      </b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav class="ml-auto">
          <template v-if="$auth.loggedIn">
            <nuxt-link class="nav-link" to="/book/list">Books</nuxt-link>
            <b-nav-text @click="logout" class="nav-link" role="button">Logout</b-nav-text>
            <b-nav-text class="font-weight-bold text-light ml-4">{{ $auth.user.name }}</b-nav-text>
          </template>
          <template v-else>
            <nuxt-link class="nav-link" to="/auth/login">Login</nuxt-link>
            <nuxt-link class="nav-link" to="/auth/register">Register</nuxt-link>
          </template>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
    <Nuxt />
  </div>
</template>

<script>
export default {
  methods: {
    logout() {
      this.$auth.logout();
    }
  }
}
</script>

<style>
</style>
