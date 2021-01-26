<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">Add new book</h5>
          <div class="card-body">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input v-model="params.name" type="text" class="form-control" id="name">
            </div>
            <div class="mb-3">
              <label for="author" class="form-label">Author</label>
              <input v-model="params.author" type="text" class="form-control" id="author">
            </div>
            <div class="mb-3">
              <label for="publishing-house" class="form-label">Publishing House</label>
              <input v-model="params.publishing_house" type="text" class="form-control" id="publishing-house">
            </div>
            <div class="mb-4">
              <label for="year" class="form-label">Year</label>
              <input v-model="params.year" @keyup.enter="save" type="number" class="form-control" id="year">
            </div>
            
            <button @click="save" class="btn btn-outline-primary btn-lg btn-block">Save</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      params: {
        name: null,
        author: null,
        publishing_house: null,
        year: null
      }
    }
  },
  methods: {
    save() {
      this.$axios.post('book', this.params)
        .then(resp => {
          this.$router.push('/book/list');
        })
    }
  }
}
</script>

<style>

</style>