<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">Register</h5>
          <div class="card-body">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input v-model="params.name" type="text" class="form-control" id="name">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input v-model="params.email" type="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input v-model="params.password" type="password" class="form-control" id="password">
            </div>
            <div class="mb-4">
              <label for="password-confirmation" class="form-label">Password confirmation</label>
              <input v-model="params.password_confirmation" @keyup.enter="register" type="password" class="form-control" id="password-confirmation">
            </div>
            <button @click="register" class="btn btn-outline-primary btn-lg btn-block">Register</button>
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
      params: {
        name: null,
        email: null,
        password: null,
        password_confirmation: null
      }
    }
  },
  methods: {
    register() {
      this.$axios.post('register', this.params)
        .then(resp => {
          this.$router.push('/auth/login');
        });
    }
  }
}
</script>

<style>

</style>