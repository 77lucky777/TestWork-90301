<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">Login</h5>
          <div class="card-body">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input v-model="loginData.email" type="email" class="form-control" id="email">
            </div>
            <div class="mb-4">
              <label for="password" class="form-label">Password</label>
              <input v-model="loginData.password" @keyup.enter="login" type="password" class="form-control" id="password">
            </div>
            <button @click="login" class="btn btn-outline-primary btn-lg btn-block">Login</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  auth: false,
  data() {
    return {
      loginData: {
        email: null,
        password: null
      }
    }
  },
  methods: {
    login() {
      this.$auth.loginWith('local', { data: this.loginData })
        .then(resp => { this.$router.push('/book/list')});
    }
  }
}
</script>

<style>

</style>